<x-layout :title="$title">


<h2>{{ $post->title}} : </h2>
<p>{{ $post->body}}</p>
<p>{{ $post->author}}</p>



@foreach ($post->comments as $comment)
    <div >
        <li>
        <p class="text-gray-800">{{ $comment->content }}</p>
        <span class="mt-1 text-sm text-gray-600">{{ $comment->author }}</span>
        </li>
    </div>

@endforeach


<form action="/comments" method="POST" class="mt-6 space-y-4">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">

<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
       <div class="sm:col-span-3">
          <label for="title" class="block text-sm/6 font-medium">Author</label>
          <div class="mt-2">
            <input
              id="author"
              type="text"
              name="author"
              autocomplete="given-name"
              class="block w-full rounded-md px-3 py-2
                     text-base 
                     border border-gray-700 ring-1 ring-gray-800
                     focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/60
                     sm:text-sm/6"
            />
          </div>
         
        </div>

<div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium">Content</label>
          <div class="mt-2">
            <textarea
              id="content"
              name="content"
              rows="3"
              class="block w-full rounded-md px-3 py-2
                     text-base 
                     border border-gray-700 ring-1 ring-gray-800
                     focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/60
                     sm:text-sm/6"
            >    </textarea>
          </div>
           
                @if (session('success'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('success') }}
                    </div>

                @endif    
                   
          </div>


<button
      type="submit"
      class="rounded-md bg-indigo-500 px-6 py-2 text-sm font-semibold text-gray-100
             hover:bg-indigo-400
             focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/60"
    >
      Save
    </button>
</form>

</x-layout>