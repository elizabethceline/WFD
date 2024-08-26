@extends('base.base')

@section('content')
    <h1>{{ $title }}</h1>
    <div>
        <p>{{ $param1 }}</p>
        <img src="{{ asset('asset/about.jpg') }}" alt="" style="width: 300px;" class="my-3">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla ullam perferendis a est, ratione at deleniti id
            maxime, velit asperiores nisi omnis laudantium dignissimos, debitis cum animi! Id, repudiandae fuga.</p>
    </div>
@endsection
