@extends('layouts.default')

@section('content')
    <hs1 class="text-2xl font-bold my-6">{{ $page->title }}</hs1>

    <div class="prose">
        {!! $page->content !!}
    </div>
@endsection
