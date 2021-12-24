@extends('main::layouts.master')

@section('content')
<div class="container">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('city.name') !!}
    </p>
</div>
@endsection
