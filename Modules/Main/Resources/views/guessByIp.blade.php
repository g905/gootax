@extends('main::layouts.master')

@section('content')
<div class="container">
    <div class="caption py-2">
        <h4>Ваш город - {{ $city->name }}?</h4>
    </div>
    <div class="city-form">
        <form action="{{ route('select-city-form') }}" method="post">
            @csrf
            <input type="hidden" name="city_id" value="{{ $city->id }}">
            <button type="submit" class="btn btn-danger" name="by_ip" value="1">Да</button>
            <button type="submit" class="btn btn-danger" name="by_ip" value="0">Нет</button>
        </form>
    </div>

</div>
@endsection
