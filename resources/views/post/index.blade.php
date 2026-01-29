<x-layout :title="$title">

@php
$userRole = auth()->user()->role ;
@endphp


@if (session('success'))
    <div class="mb-4 text-sm font-medium text-green-600">
        {{ session('success') }}
    </div>

@endif

@if (session('fail'))
    <div class="bg-red-50 mb-4 text-sm font-medium text-green-1000">
        {{ session('fail') }}
    </div>

@endif

  @if (in_array($userRole , ["admin", "editor"])  )

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/blog/create"
            type="submit"
            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-gray-100
                  hover:bg-indigo-400
                  focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/60">
            Create Post
         </a>
       </div>

  @endif

@foreach ($posts as $post)
<div class="flex justify-between items-center border border-gray-200 rounded-md px-4 py-2 mt-4 my-2">
          <div >
        <p class="text-2xl" style="color: brown;"><a href="/blog/{{ $post->id }}">{{ $post->title}}</a></p>
        <p style="color: blueviolet;">{{ $post->user->name }}</p>
         </div>
  
  
     <div>
      @if (in_array($userRole , ["admin", "editor"])  )
        <a class="text-yellow-500 hover:text-gray-500" href="/blog/{{ $post->id }}/edit">Edit</a>
     @endif
        @if ($userRole == "admin"  )
        <form action="/blog/{{ $post->id }}" method="POST" onsubmit="return confirm('Are U sure U want to delete this post ?')">
            @csrf
            @method('DELETE')
           <button type="submit" class="text-red-500 hover:text-gray-500">Delete</button>
      </form>
        @endif
    </div>

</div>

@endforeach

{{ $posts->links() }}
</x-layout>