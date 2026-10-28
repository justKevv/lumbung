<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Kopdes but good</title>
        <body>
            <div class="drawer lg:drawer-open">
              <input id="my-drawer-4" type="checkbox" class="drawer-toggle inline" />
              <div class="drawer-content">
                <!-- Navbar -->
                <x-navbar></x-navbar>
                <!-- Page content here -->
                <div class="p-4 flex flex-col gap-4">
                    <h1 class="text-xl font-bold">{{ $title }}</h1>
                    {{ $slot }}
                </div>
              </div>

                <x-sidebar></x-sidebar>
            </div>
        </body>
</html>
