<x-layout :title="$title">


<form method="POST" action="/blog/{{ $post->id }}" class="mt-10 space-y-8 divide-y divide-gray-700">
    @csrf
    @method('PUT')
<input type="hidden" name="id" value="{{ $post->id }}" />
  <div class="space-y-12">
    <div class="border-b pb-12">
      <h2 class="text-base/7 font-semibold">Edit Post: {{ $post->title }}</h2>
      <p class="mt-1 text-sm/6">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
       <div class="sm:col-span-3">
          <label for="title" class="block text-sm/6 font-medium">Title</label>
          <div class="mt-2">
            <input
              id="title"
              value="{{ old( "title"  , $post->title) }}"
              type="text"
              name="title"
              autocomplete="given-name"
              class="block w-full rounded-md px-3 py-2
                     text-base 
                     border border-gray-700 ring-1 ring-gray-800
                     focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/60
                     sm:text-sm/6"
            />
          </div>
          @error('title')
            <p class="text-sm/6 text-red-600 mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="author" class="block text-sm/6 font-medium">Author</label>
          <div class="mt-2">
            <input
              id="author"
              value="{{ old( "author"  , $post->author) }}"
              type="text"
              name="author"
              autocomplete="family-name"
              class="block w-full rounded-md px-3 py-2
                     text-base 
                     border border-gray-700 ring-1 ring-gray-800
                     focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/60
                     sm:text-sm/6"
            />
          </div>
          @error('author')
            <p class="text-sm/6 text-red-600 mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium">Content</label>
          <div class="mt-2">
            <textarea
              id="body"
              name="body"
              rows="3"
              class="block w-full rounded-md px-3 py-2
                     text-base 
                     border border-gray-700 ring-1 ring-gray-800
                     focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/60
                     sm:text-sm/6"
            >    {{ old( "body"  , $post->body) }} </textarea>
          </div>
            @error('body')
                <p class="text-sm/6 text-red-600 mt-2">{{ $message }}</p>
            @enderror
          <p class="mt-3 text-sm/6">Write a few sentences body yourself.</p>
        </div>

        <div class="col-span-full">
          <div class="flex gap-3">
              <div class="flex h-6 shrink-0 items-center">
                <div class="group grid size-4 grid-cols-1">
                  <input
                    id="published"
                    type="checkbox"
                    name="published"
                    value="1" {{ old( "published" ) || (old() && $post->published) ? 'checked' : '' }}
                    aria-describedby="published-description"
                    class="col-start-1 row-start-1 appearance-none rounded
                           border border-gray-700 bg-gray-900/60
                           checked:border-indigo-500 checked:bg-indigo-500
                           focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/60
                           disabled:border-gray-800 disabled:bg-gray-900/40 forced-colors:appearance-auto"
                  />
                  <svg viewBox="0 0 14 14" fill="none"
                    class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-gray-100 group-has-[:disabled]:stroke-gray-600">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-[:checked]:opacity-100" />
                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-[:indeterminate]:opacity-100" />
                  </svg>
                </div>
              </div>
              <div class="text-sm/6">
                <label for="published" class="font-medium">IsPublished ?</label>
                <p id="published-description" >Do U want to publish on publick.</p>
              </div>
            </div>
         </div>

        
      </div>
    </div>

    

    
  

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/blog" class="text-sm/6 font-semibold text-gray-200 hover:text-gray-100">Cancel</a>
    <button
      type="submit"
      class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-gray-100
             hover:bg-indigo-400
             focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/60"
    >
      Save
    </button>
  </div>
</form>

</x-layout>