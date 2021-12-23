<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Выберите город
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
            <div class="row">
                @if(isset($ip_city))
                <h4>
                    Ваш город - {{ $ip_city->name }}?
                </h4>
                <div class="col">
                    <form action="{!! route('select-city-form') !!}" method="post" name="by_ip">
                        @csrf
                        <input type="hidden" name="city_id" value="{{ $ip_city->id }}">
                        <button type="submit" class="btn btn-danger" name="by_ip" value="1">Да</button>
                        <button type="submit" class="btn btn-danger" name="by_ip" value="0">Нет</button>
                    </form>
                </div>
                @else
                <h4>
                    Выберите город:
                </h4>
                <div class="col">
                    <ul class="list-group">
                        @foreach ($cities as $city)
                        <li class="list-group-item"><a href="{!! route('select-city', ['city_id' => $city->id]) !!}">{{ $city->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>