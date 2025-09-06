<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('components.dash.sidebar')

        <div class="body-wrapper">

            @include('components.dash.header')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alertBox) {
                    alertBox.classList.remove('show');
                    alertBox.classList.add('fade');

                    setTimeout(() => alertBox.remove(), 500);
                });
            }, 5000);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');

            alert.forEach(function(alert) {
                setTimeout(function() {
                    alert.classList.add('fade');
                    alert.classList.add('show');

                    alert.classList.transition = 'opacity 0.5s ease';
                    alert.classList.opacity = '0';

                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            })
        })
    </script>
</body>

</html>
