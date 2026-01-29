<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($title) ? $title : "Job Board Abdullah" }}</title> 
        <!--             ?? means if $title is not defined use "Job Board Abdullah" -->
                     
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

     
    </head>
    <body >

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
                   {{ $slot }}

    </div>
  </main>
</div>


        </body>
</html>
