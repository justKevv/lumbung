<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ config('app.name', 'Laravel') }}</title>

        <body>
            <h1 class="text-3xl text-red-500 font-bold underline">
              Hello world!
            </h1>
        </body>
</html>
