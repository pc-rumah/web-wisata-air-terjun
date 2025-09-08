<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 min-h-screen">
    <!-- Header -->
    <div class="navbar bg-primary text-primary-content shadow-lg">
        <div class="container mx-auto">
            <div class="flex-1">
                <h1 class="text-xl font-bold">🎫 Pembelian Tiket</h1>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Form Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-6 text-center">Form Pembelian Tiket</h2>
                    <x-semuaalert />
                    <form method="POST" action="{{ route('order.checkout') }}" id="ticketForm" class="space-y-6">
                        @csrf
                        <!-- Nama -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Nama Lengkap</span>
                                <span class="label-text-alt text-error">*</span>
                            </label>
                            <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda"
                                class="input input-bordered w-full" required />
                        </div>

                        <!-- Email -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Email</span>
                                <span class="label-text-alt text-error">*</span>
                            </label>
                            <input type="email" name="email" placeholder="contoh@email.com"
                                class="input input-bordered w-full" required />
                        </div>

                        <!-- No Telepon -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">No. Telepon</span>
                                <span class="label-text-alt text-error">*</span>
                            </label>
                            <input type="tel" name="no_telp" placeholder="08xxxxxxxxxx"
                                class="input input-bordered w-full" required />
                        </div>

                        <!-- Alamat -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Alamat Lengkap</span>
                                <span class="label-text-alt text-error">*</span>
                            </label>
                            <textarea name="alamat" class="textarea textarea-bordered h-24 w-full" placeholder="Masukkan alamat lengkap Anda"
                                required></textarea>
                        </div>

                        <!-- Jumlah Tiket -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Jumlah Tiket</span>
                                <span class="label-text-alt text-error">*</span>
                            </label>
                            <input type="qty" name="qty" placeholder="Beli Berapa?"
                                class="input input-bordered w-full" required />
                        </div>

                        <!-- Info Harga -->
                        <div class="alert alert-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-bold">Informasi Harga</h3>
                                <div class="text-xs">Harga per tiket: Rp 10.000</div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-lg w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                </svg>
                                Pesan Tiket Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card bg-base-100 shadow-lg mt-6">
                <div class="card-body">
                    <h3 class="card-title text-lg">📋 Informasi Penting</h3>
                    <ul class="list-disc list-inside space-y-2 text-sm">
                        <li>Pastikan data yang diisi sudah benar sebelum mengirim</li>
                        <li>Tiket akan dikirim ke email yang di input</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-center p-4 bg-base-300 text-base-content mt-12">
        <div>
            <p>© Form Tiket</p>
        </div>
    </footer>

</body>

</html>
