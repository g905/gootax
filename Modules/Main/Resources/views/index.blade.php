@extends('main::layouts.master')

@section('content')
<div class="container">
    <div class="caption py-2">
        <h4>Привет</h4>
        Выбранный город: {{ $city->name }}
    </div>
    <a href="{{ route('reviews') }}">К отзывам</a>
</div>
@endsection
