<x-layout :title="$title">

<h2>comments exploring</h2>

@foreach ($comments as $comment)

<p class="text-2xl">{{ $comment->content}}</p>
<p>{{ $comment->author}}</p>
<a href="/blog/{{ $comment->post->id }}"  style="color: blue;">  {{ $comment->post->title}}</a>

@endforeach

</x-layout>