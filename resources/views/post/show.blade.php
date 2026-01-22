<x-layout :title="$title">


<h2>{{ $post->title}} : </h2>
<p>{{ $post->body}}</p>
<p>{{ $post->author}}</p>
<p>{{ $post->created_at}}</p>


</x-layout>