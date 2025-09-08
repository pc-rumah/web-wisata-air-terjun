<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\TicketPurchased;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Ticket;

class OrderController extends Controller
{
    public function form()
    {
        return view('tiket.form');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required|string|max:15',
            'qty' => 'required|integer|min:1',
        ]);

        $hargaTiket = 10000;
        $totalHarga = $request->qty * $hargaTiket;

        $ticket = Order::create([
            'order_id' => Order::generateOrderId(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'qty' => $request->qty,
            'total_price' => $totalHarga,
            'status' => 'unpaid',
        ]);

        return view('tiket.checkout', compact('ticket'));
    }

    public function payment(Request $request)
    {
        $ticket = Order::findOrFail($request->ticket_id);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $ticket->order_id,
                'gross_amount' => $ticket->total_price,
            ),
            'customer_details' => array(
                'first_name' => $ticket->nama,
                'email' => $ticket->email,
                'phone' => $ticket->no_telp,
                'billing_address' => array(
                    'address' => $ticket->alamat,
                )
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    // Update method callback di TicketController
    public function callback(Request $request)
    {
        // Log untuk debugging
        \Log::info('Midtrans Callback:', $request->all());

        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $ticket = Order::where('order_id', $request->order_id)->first();

            if ($ticket) {
                // Update berdasarkan transaction_status
                switch ($request->transaction_status) {
                    case 'capture':
                    case 'settlement':
                        $ticket->update([
                            'status' => 'paid',
                            'transaction_id' => $request->transaction_id
                        ]);

                        // Kirim email hanya jika status berubah ke paid
                        if ($ticket->wasChanged('status')) {
                            try {
                                Mail::to($ticket->email)->send(new TicketPurchased($ticket));
                                \Log::info('Email sent successfully to: ' . $ticket->email);
                            } catch (\Exception $e) {
                                \Log::error('Failed to send email: ' . $e->getMessage());
                            }
                        }
                        break;

                    case 'pending':
                        $ticket->update([
                            'status' => 'pending',
                            'transaction_id' => $request->transaction_id
                        ]);
                        break;

                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $ticket->update([
                            'status' => 'cancelled',
                            'transaction_id' => $request->transaction_id
                        ]);
                        break;
                }

                \Log::info('Ticket status updated:', [
                    'order_id' => $ticket->order_id,
                    'status' => $ticket->status,
                    'transaction_status' => $request->transaction_status
                ]);
            } else {
                \Log::error('Ticket not found for order_id: ' . $request->order_id);
            }
        } else {
            \Log::error('Invalid signature key for order_id: ' . $request->order_id);
        }

        return response()->json(['status' => 'ok']);
    }

    // Update method success di TicketController
    public function success($orderId = null)
    {
        // Jika tidak ada orderId dari URL, coba ambil dari request
        if (!$orderId) {
            $orderId = request('order_id');
        }

        $ticket = Order::where('order_id', $orderId)->first();

        if (!$ticket) {
            return redirect()->route('form.ticket')->with('error', 'Tiket tidak ditemukan');
        }

        return view('tiket.success', compact('ticket'));
    }
}
