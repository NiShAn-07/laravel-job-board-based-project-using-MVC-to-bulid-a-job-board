<x-layout :title="$title">

<h1>$title</h1>
@foreach($tags as $tag)
    <h2>{{ $tag->title }}</h2>
@endforeach


</x-layout>