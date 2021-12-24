@extends('main::layouts.master')

@section('content')
<div class='container'>
    <div class="caption py-3 d-flex justify-content-between">
        <h4>Отзывы</h4>

        @if (Auth::user())
        <div class=''><a href="{{ route('reviews.create') }}" class="btn btn-danger">Добавить отзыв</a></div>
        @endif
    </div>
    <div class="row mb-4">
        <div class='col-12 d-flex flex-wrap justify-content-around'>
            @if(count($reviews))
            @foreach ($reviews as $review)

            <div class='card w-25 me-2 mb-2'>
                <div class='card-title p-2 h-8 d-flex justify-content-between'>
                    <div>{{ $review->title }}</div>
                    @if (Auth::id() == $review->author->id)
                    <div>
                        <a href=''>edit</a>
                    </div>
                    @endif
                </div>
                <div class="card-body text-sm text-gray-500 d-flex justify-content-between">
                    <div class=''>
                        @for ($i = 0; $i < $review->rating; $i++)
                        &#9733;
                        @endfor
                    </div>
                    <div>
                        {{ $review->city->name }}
                    </div>
                </div>
                <div class='card-body p-2'>{{ $review->text }}</div>
                <div class="card-footer text-sm d-flex justify-content-end">by&nbsp;
                    @if (Auth::user())
                    <button class='btn authorBtn bg-white py-0 px-1' data-author="{{ $review->author->id }}">
                        {{ $review->author->name }}
                    </button>
                    @else
                    {{ $review->author->name }}
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        Еще нет отзывов
        @endif
        <br>

    </div>
</div>


<div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="addArticleLabel">Отзыв</h4>

            </div>

            <div class="modal-body">
                <div class="data" id="data"></div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Закрыть</button>

            </div>

        </div>

    </div>

</div>

@endsection

@section('module-scripts')
<script src='{{ Module::asset("review:js/app.js") }}'></script>
@endsection