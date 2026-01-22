<x-layout :title="$title">


<h2>{{ $comment->title}} : </h2>
<p>{{ $comment->body}}</p>
<p>{{ $comment->author}}</p>
<p>{{ $comment->created_at}}</p>


</x-layout>