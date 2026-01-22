<x-layout :title="$title">


@foreach ($posts as $post)

<p class="text-2xl" style="color: brown;">-{{ $post->title}}</p>
<p>{{ $post->body}}</p>
<p style="color: blueviolet;">{{ $post->author }}</p>
@endforeach

{{ $posts->links() }}
</x-layout>