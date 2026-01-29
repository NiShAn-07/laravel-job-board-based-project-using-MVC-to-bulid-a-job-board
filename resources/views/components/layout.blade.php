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

<div class="min-h-full">
  <nav class="bg-gray-950/50 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
              

                <x-nav-link href="/" :active="request()->is('/')">Index</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                <x-nav-link href="/blog" :active="request()->is('blog')">Blogs</x-nav-link>
                <x-nav-link href="/comments" :active="request()->is('comments')">Comments</x-nav-link>
                <x-nav-link href="/tag" :active="request()->is('tag')">Tags</x-nav-link>

             </div>
          </div>
        </div>
   
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">

            @auth
            <span class="text-white mr-4">{{ Auth::user()->name }}</span>
             <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
            @else
            <a href="/signup" class="mr-4 hover:underline">
                    Sign Up
                </a>

                <a href="/login" class="mr-4 hover:underline">
                    Log In
                </a>
            @endauth
                
          </div>
        </div>
  
      </div>
    </div>

  </nav>


   @if (isset($title))
   <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-white">{{$title}}</h1>
    </div>
  </header> 
  @endif



  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
                   {{ $slot }}

    </div>
  </main>
</div>


        </body>
</html>
