@extends('main::layouts.master')

@section('content')
<div class="container">
    <div class="caption py-2">
        <h4>Выберите город</h4>
    </div>
    <ul>
        @foreach($cities as $city)
        <li><a href="{{ route('select-city', ['city_id' => $city->id]) }}">{{ $city->name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection
