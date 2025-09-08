<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="navbar bg-white shadow-sm px-6 lg:px-12">
        <div class="navbar-start">
            <a class="text-xl font-bold text-gray-800">EventTicket</a>
        </div>
        <div class="navbar-end">
            <ul class="menu menu-horizontal px-1">
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Home</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Support</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 lg:px-12 py-8 max-w-7xl">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Checkout</h1>
            <p class="text-gray-600">Silakan periksa informasi pembelian Anda sebelum melanjutkan pembayaran</p>
        </div>

        <!-- Checkout Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Informasi Pelanggan -->
            <div class="card bg-green-50 border border-green-200">
                <div class="card-body p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fas fa-credit-card text-green-600"></i>
                        <h2 class="text-lg font-semibold text-gray-800">Informasi Pelanggan</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-3">
                            <div class="w-3 h-3 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Order Code</p>
                                <p class="font-medium text-gray-800">{{ $ticket->order_id }}</p>
                            </div>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="flex items-start gap-3">
                            <div class="w-3 h-3 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Nama Lengkap</p>
                                <p class="font-medium text-gray-800">{{ $ticket->nama }}</p>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Alamat</p>
                                <p class="font-medium text-gray-800">{{ $ticket->alamat }}</p>
                            </div>
                        </div>

                        <!-- No. Telepon -->
                        <div class="flex items-start gap-3">
                            <i class="fas fa-phone text-green-600 mt-1"></i>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">No. Telepon</p>
                                <p class="font-medium text-gray-800">{{ $ticket->no_telp }}</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-3">
                            <i class="fas fa-envelope text-green-600 mt-1"></i>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Email</p>
                                <p class="font-medium text-gray-800">{{ $ticket->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pembelian -->
            <div class="card bg-white border">
                <div class="card-body p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fas fa-receipt text-gray-600"></i>
                        <h2 class="text-lg font-semibold text-gray-800">Ringkasan Pembelian</h2>
                    </div>

                    <!-- Event Info -->
                    <div class="flex items-center gap-3 mb-6">
                        <i class="fas fa-calendar-alt text-gray-600"></i>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Tiket Masuk</p>
                            <p class="text-sm text-gray-600">Curug Semirang</p>
                        </div>
                    </div>

                    <div class="divider my-4"></div>

                    <!-- Pricing Details -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Tiket</span>
                            <span class="font-medium">{{ $ticket->qty }} tiket</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Harga per tiket</span>
                            <span class="font-medium">Rp 10.000</span>
                        </div>
                    </div>

                    <div class="divider my-4"></div>

                    <!-- Total -->
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-lg font-semibold text-gray-800">Total Pembayaran</span>
                        <span class="text-xl font-bold text-green-600">Rp {{ $ticket->total_price }}</span>
                    </div>

                    <!-- Continue Button -->
                    <button id="pay-button" class="btn btn-success w-full text-white font-medium mb-4">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-center bg-white border-t mt-16 p-6">
        <div class="footer-content max-w-7xl mx-auto w-full">
            <div class="flex flex-col lg:flex-row justify-between items-center w-full">
                <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-4 lg:mb-0">
                    <a href="#" class="hover:text-gray-800">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-gray-800">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-gray-800">Bantuan</a>
                </div>
                <div class="text-sm text-gray-500">
                    © Checkout Page
                </div>
            </div>
        </div>
    </footer>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            fetch('/tickets/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        ticket_id: {{ $ticket->id }}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            window.location.href = '/tickets/success/' + '{{ $ticket->order_id }}';
                        },
                        onPending: function(result) {
                            alert("Menunggu pembayaran!");
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal!");
                        }
                    });
                });
        };
    </script>
</body>

</html>
