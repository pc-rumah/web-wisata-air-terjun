<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Tiket Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-base-200 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Success Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-success rounded-full mb-4">
                <i class="fas fa-check text-3xl text-white"></i>
            </div>
            <h1 class="text-4xl font-bold text-base-content mb-2">Pembelian Berhasil!</h1>
            <p class="text-base-content/70 text-lg">Terima kasih atas pembelian tiket Anda</p>
        </div>

        <!-- Ticket Card -->
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <!-- Card Header -->
                <div class="card-body">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="card-title text-2xl">
                            <i class="fas fa-ticket-alt text-primary"></i>
                            Detail Tiket
                        </h2>
                        <div class="badge badge-success badge-lg">BERHASIL</div>
                    </div>

                    <!-- Ticket Details -->
                    <div class="space-y-4">
                        <!-- Nama -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                <i class="fas fa-user text-primary"></i>
                                <span class="font-medium text-base-content/70">Nama Pemesan</span>
                            </div>
                            <span class="font-semibold text-lg">{{ $ticket->nama }}</span>
                        </div>

                        <!-- Email -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                <i class="fas fa-envelope text-primary"></i>
                                <span class="font-medium text-base-content/70">Email</span>
                            </div>
                            <span class="font-semibold text-lg">{{ $ticket->email }}</span>
                        </div>

                        <!-- Quantity -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                <i class="fas fa-hashtag text-primary"></i>
                                <span class="font-medium text-base-content/70">Jumlah Tiket</span>
                            </div>
                            <span class="font-semibold text-lg">{{ $ticket->qty }} Tiket</span>
                        </div>

                        <!-- Total Price -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-primary/10 rounded-lg border border-primary/20">
                            <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                <i class="fas fa-money-bill-wave text-primary"></i>
                                <span class="font-medium text-base-content/70">Total Pembayaran</span>
                            </div>
                            <span class="font-bold text-2xl text-primary">Rp {{ $ticket->total_price }}</span>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="divider"></div>

                    <div class="bg-info/10 p-4 rounded-lg border border-info/20">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle text-info mt-1"></i>
                            <div>
                                <h3 class="font-semibold text-info mb-2">Informasi Penting:</h3>
                                <ul class="text-sm text-base-content/70 space-y-1">
                                    <li>• Tiket elektronik telah dikirim ke email Anda</li>
                                    <li>• Simpan tiket ini sebagai bukti pembelian</li>
                                    <li>• Tunjukkan QR code saat masuk venue</li>
                                    <li>• Hubungi customer service jika ada pertanyaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-actions justify-center mt-6 gap-4">
                        <button class="btn btn-primary btn-lg">
                            <i class="fas fa-download"></i>
                            Download Tiket
                        </button>
                        <a href="/" class="btn btn-outline btn-lg">
                            <i class="fas fa-home"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order ID -->
            <div class="text-center mt-6">
                <p class="text-base-content/50 text-sm">
                    Order ID: <span class="font-mono font-semibold">#{{ $ticket->order_id }}</span>
                </p>
                <p class="text-base-content/50 text-sm mt-1">
                    Tanggal: 8 September 2024, 14:30 WIB
                </p>
            </div>
        </div>
    </div>

    <!-- Floating Animation -->
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .fas.fa-check {
            animation: float 2s ease-in-out infinite;
        }

        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>
