<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Loading Bar -->
        @include('components.loading-bar')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Handle form submissions with SweetAlert2
        document.addEventListener('DOMContentLoaded', function() {
            // Handle all form submissions
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Get form method and action
                    const method = form.querySelector('input[name="_method"]')?.value || form.method;
                    const action = form.action;

                    // Determine the type of action
                    let title, text, icon, confirmButtonText;

                    if (method === 'DELETE') {
                        title = 'Apakah Anda yakin?';
                        text = 'Data yang dihapus tidak dapat dikembalikan!';
                        icon = 'warning';
                        confirmButtonText = 'Ya, hapus!';
                    } else if (method === 'PUT') {
                        title = 'Konfirmasi Update';
                        text = 'Apakah Anda yakin ingin mengupdate data ini?';
                        icon = 'question';
                        confirmButtonText = 'Ya, update!';
                    } else if (action.includes('status')) {
                        const status = form.querySelector('input[name="status"]')?.value;
                        title = 'Konfirmasi Status';
                        text = `Apakah Anda yakin ingin ${status === 'diterima' ? 'menerima' : 'menolak'} pengajuan ini?`;
                        icon = 'question';
                        confirmButtonText = `Ya, ${status === 'diterima' ? 'terima' : 'tolak'}!`;
                    } else {
                        title = 'Konfirmasi Simpan';
                        text = 'Apakah Anda yakin ingin menyimpan data ini?';
                        icon = 'question';
                        confirmButtonText = 'Ya, simpan!';
                    }

                    // Show SweetAlert2
                    Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: confirmButtonText,
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            popup: 'animated fadeInDown'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Handle success messages from session
            @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('
                success ') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
            @endif

            // Handle error messages from session
            @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('
                error ') }}',
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
            @endif
        });
    </script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>