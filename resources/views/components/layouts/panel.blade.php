<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$headerName}}</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
        
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      <x-layouts.sidebar sidebarIndex='{{$index}}' nombreEmpresa="Cursos.CR" >
      <x-slot name="content">{!! $content !!}</x-slot>
      </x-layouts.sidebar>

    </body>
    
</html>
