<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Отзывы
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
            <div class="row mb-4">
                <div class='col-12 d-flex flex-wrap justify-content-start'>
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
                            <button type='button' class='authorBtn bg-white px-1' data-author="{{ $review->author->id }}">
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
            @if (Auth::user())
            <div class='w-25'><a href="{{ route('reviews.create') }}" class="btn btn-danger">Добавить отзыв</a></div>
            @endif
        </div>



        <!-- Modal -->

        <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

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

        <div class="modal fade" id="addReview" tabindex="-1" role="dialog" aria-labelledby="addReviewLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="addArticleLabel">Добавление отзыва</h4>

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

        <div id='loader' style='display: none; position: absolute; top:0; bottom:0;left:0;right:0; text-align: center; opacity: 0.5; background: black;'>
            <div style="position: relative; height: 100%; top: 50%; font-size: 2rem; font-weight: 800">loading</div>
        </div>



        <script>

            $(function () {

                var myModal = $('#addArticle');
                var myInput = $('#data');

                myModal.on('hidden.bs.modal', function () {
                    myInput.empty();
                });

                $('.authorBtn').on('click', function () {

                    var title = "";
                    var text = "";

                    $.ajax({

                        beforeSend: function () {
                            $('#loader').show();
                        },
                        complete: function () {
                            $('#loader').hide();
                        },

                        url: "{{ route('reviews.author') }}",
                        type: "POST",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            author_id: $(this).data('author'),
                        },
                        success: function (data) {

                            $('#addArticle').modal('show');
                            var str = '<div>Автор: ' + data['name'] + '</div>' +
                                    '<div>Email: ' + data['email'] + '</div>' +
                                    '<div>Телефон: ' + data['phone'] + '</div>' +
                                    '<div class="mt-2"><a class="btn btn-danger" href="/reviews-by-author/' + data["id"] + '">Все отзывы автора</a></div>';
                            $('.data').append(str);
                        },
                        error: function (msg) {

                            alert('Ошибка');
                        }

                    });
                });
            })

        </script>
    </x-slot>
</x-app-layout>