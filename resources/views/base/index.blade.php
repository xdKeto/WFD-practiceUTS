<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <!-- tagify -->
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    @yield('library-css')

    <title>Cinema</title>
</head>
<body style="margin-bottom: 25vh">
    {{-- NAVBAR --}}
    <div class="shadow bg-white px-10">
        <div class="h-16 mx-auto px-5 flex items-center justify-between">
            <a href="{{route('movies/index')}}" class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer font-bold">Cinema XXI</a>
            
            <ul class="flex items-center gap-5">
              <li><a href="{{route('movies/index')}}" class="hover:text-cyan-500 transition-colors font-semibold" href="/movies">Home</a></li>
            </ul>
        </div>
      </div>

    <div class="contaner mx-auto px-4">
        @yield('content')
    </div>
    

    <!-- jQuery (move this above DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Data table (after jQuery is loaded) -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <!-- Tagify -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    @vite(['resources/js/app.js'])
    @yield('library-js')
</body>
</html>