<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{Storage::url('img/logo/onlylogo.svg')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- LINK CDN FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- LINK SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Incluye la biblioteca de Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @if (session('error_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'error',
                title: '{{ session('error_msg') }}',
                position: 'top-end',
                timer: 3900,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        </script>
    @endif

    @if (session('success_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'success',
                title: '{{ session('success_msg') }}',
                position: 'top-end',
                timer: 3900,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        </script>
    @endif

    @stack('js')

    @livewireScripts


    <footer class="py-4" style="background-color: #004aad; color: #ffffff">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Enlaces útiles</h5>
                    <ul class="list-unstyled" >
                        <li><a @if (Auth::user())
                            href="{{route('dashboard')}}" style="color: #ffffff">Inicio</a></li>
                            @else
                            <a href="login" style="color: #ffffff">Inicio</a>
                        @endif
                        <li><a  href="{{route('aboutUs')}}" style="color: #ffffff">Acerca de nosotros</a></li>
                        <li><a href="mailto:paytogether.com" style="color: #ffffff">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt"></i> Dirección: Calle 123, Ciudad</li>
                        <li><i class="bi bi-envelope"></i> Correo electrónico: contacto@example.com</li>
                        <li><i class="bi bi-phone"></i> Teléfono: +123456789</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos en redes sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: #ffffff"><i class="bi bi-facebook"></i> Facebook</a></li>
                        <li><a href="#" style="color: #ffffff"><i class="bi bi-twitter"></i> Twitter</a></li>
                        <li><a href="#" style="color: #ffffff"><i class="bi bi-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <img src="{{ Storage::url('img/logo/onlylogo.svg') }}" alt="Logo" width="150" class="img-fluid mx-auto">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="fs-6">&copy; 2023 PayTogether, Inc. Todos los derechos reservados.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
                        <img alt="Licencia de Creative Commons" class="mx-auto mt-3 img-fluid" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" />
                    </a>

                    <br />Este obra está bajo una <a rel="license" class="text-white" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">licencia de Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 Internacional</a>.
                </div>
            </div>
        </div>



    </footer>

</body>

</html>
