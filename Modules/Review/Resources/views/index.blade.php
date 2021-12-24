@extends('main::layouts.master')

@section('content')
<div class='container'>
    <div class="caption py-3 d-flex justify-content-between">
        <h4>Отзывы</h4>

        @if (Auth::user())
        <div class=''><button id="addReview" class="btn btn-danger">Добавить отзыв</button></div>
        @endif
    </div>
    <div class="row mb-4">
        <div class='col-12 d-flex flex-wrap '>
            @if(count($reviews))
            @foreach ($reviews as $review)

            <div class='card w-25 me-2 mb-2'>
                <div class='card-title p-2 h-8 d-flex justify-content-between'>
                    <div>{{ $review->title }}</div>
                    @if (Auth::id() == $review->author->id)
                    <div class='d-flex'>
                        <a href='javascript:void(0);' class="editReviewBtn" data-review="{{ $review->id }}" style='text-decoration: none'>&#9998;</a>
                        <a href='{{ route('reviews.delete', ["id" => $review->id]) }}' class="ms-3 text-danger" style='text-decoration: none'>&#10005;</a>
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
                <div class="card-footer text-sm d-flex justify-content-between">
                    <div>
                        @if($review->img != "")
                        <a href="{{ route('download-file', ['id' => $review->id]) }}" class="text-danger text-decoration-none">&#9762;</a>
                        @endif
                    </div>
                    <div><small>by&nbsp;</small>
                        @if (Auth::user())
                        <button class='btn authorBtn bg-white py-0 px-1' data-author="{{ $review->author->id }}">
                            {{ $review->author->name }}
                        </button>
                        @else
                        {{ $review->author->name }}
                        @endif
                    </div>
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

<div class="modals">

    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="addReviewData"></div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="editReviewData"></div>
            </div>
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

</div>
@endsection

@section('module-scripts')
<script src='{{ Module::asset("review:js/app.js") }}'></script>
@endsection