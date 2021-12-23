<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить новый отзыв
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('reviews.save') }}" method="post">
                        @csrf
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label for="title">Text</label>
                            <textarea rows="" name="text"></textarea>
                        </div>
                        <div>
                            <label for="title">Rating</label>
                            <input type="number" min="1" max="5" value="1" name="rating">
                        </div>
                        <div>
                            <label for="title">File</label>
                            <input type="file" name="file">
                        </div>
                        <div>
                            <label for="city">City</label>
                            <select name="city_id">
                                <option value="none" selected>-</option>>
                                @foreach($cities as $city)

                                <option value="{{ $city->id }}" @if(session('city_id') == $city->id) selected @endif>{{ $city->name }}</option>
                                @endforeach
                                <option value="all">Все</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>