<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>{{ Auth::user()->role === "admin" ? "Sistem Manajemen Absensi Guru" : "Absensi Guru" }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default b g-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 min-h-75"></div>

    @if (Auth::user()->role === 'admin')
        @include('layouts.sidebar')
    @elseif(Auth::user()->role === 'guru')
        @include('layouts.sidebar-guru')
    @endif


    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('layouts.nav')

        <div class="w-full px-6 py-4 mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- plugin for charts  -->
    <script src="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/js/plugins/chartjs.min.js') }}" async></script>
    <!-- plugin for scrollbar  -->
    <script src="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async>
    </script>
    <!-- main script file  -->
    <script src="{{ asset('argon-dashboard-tailwind-1.0.1/build/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async>
    </script>
</body>

</html>
