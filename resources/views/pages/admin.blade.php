@extends('layouts.main')
@section('content')

<ul>
@foreach ($SiteTree ?? [] as $tree
   <li>{{ $tree->id }} {{ $tree->uri }} {{ $tree->url }}</li>
@endforeach
</ul>
<form action="/admin/pages">
@csrf
<label for="title">Title</label>
<input type="text" name="title" id="title" placeholder="title">
</form>
@endsection
