<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

    {{-- plugins --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/conector.js') }}" type="text/javascript"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <wireui:scripts />
    @livewireStyles

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }
    </script>

</head>

<body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400"
    :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'false') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-[100dvh] overflow-hidden">

        <x-app.sidebar />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">

            {{-- <x-app.header /> --}}
            @livewire('admin.plantilla.header', ['page' => request()->fullUrl()])
            <x-banner />
            @livewire('app.header.reportes')
            {{-- <x-app.comprobantes /> --}}

            <main class="grow">
                @yield('contenido')
            </main>

        </div>

    </div>

    @stack('modals')
    @livewire('admin.reportes.ventas')
    @livewireScripts

    @stack('scripts')
</body>
<script>
    document.addEventListener('livewire:initialized', () => {
        //success
        //question
        //info
        //warning
        //error
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,

            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });


        Livewire.on('notify-toast', (event) => {
            Toast.fire({
                icon: event.icon,
                title: `<div  style="font-size: 15px; color: #056b85;"> ` +
                    event.title + `</div`,
                html: `<div  style="font-size: 14px; color: #056b85;"> ` +
                    event.mensaje + `</div`,
                showCloseButton: true,
                width: event.width ? event.width : '32em',
                timer: event.timer ? event.timer : 3000,
            });

        });


        Livewire.on('error', (event) => {
            Toast.fire({
                icon: 'error',
                title: event.title,
                html: event.mensaje,
                showCloseButton: true,
            });
        });

        Livewire.on('notify', (event) => {
            Swal.fire({
                icon: event.icon,
                title: event.title,
                text: event.mensaje,
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
        });


    });
</script>
@if (session('venta-registrada'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'VENTA REGISTRADA',
                text: '{{ session('venta-registrada') }}',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
@endif
@if (session('nota-registrada'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'NOTA REGISTRADA',
                text: '{{ session('nota-registrada') }}',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
@endif

@if (session('guia-store'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'GUIA REGISTRADA',
                text: '{{ session('guia-store') }}',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
@endif

@if (session('cotizacion-actualizada'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'COTIZACION ACTUALIZADA',
                text: '{{ session('cotizacion-actualizada') }}',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
@endif

@if (session('cotizacion-registrada'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'COTIZACION REGISTRADA',
                text: '{{ session('cotizacion-registrada') }}',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
@endif

@yield('js')
<script>
    $(document).ready(function() {

        Echo.channel('ventas')
            .listen('VentaCreada', e => {
                console.log(e)
            })

    });
</script>




</html>
