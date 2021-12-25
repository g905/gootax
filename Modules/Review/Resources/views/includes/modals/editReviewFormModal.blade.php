<div class="">
    <div class="modal-header">Изменить отзыв</div>
    <div id="editReviewModalData">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="editReviewErrors text-danger">
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="editReviewForm">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $review->title }}">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>
                    <div>
                        <label for="title">Text</label>
                        <textarea rows="" name="text">{{ $review->text }}</textarea>
                    </div>
                    <div>
                        <label for="title">Rating</label>
                        <input type="number" min="1" max="5" value="{{ $review->rating }}" name="rating">
                    </div>
                    <div>
                        <label for="title">File</label>
                        <input type="file" name="attach">
                    </div>
                    <div>
                        <label for="city">Город:</label>
                        <input id="cityInput" name="city" type="text" value="{{ $review->city->name }}"/>
                    </div>
                    <input type="hidden" name="id" value="{{ $review->id }}">
                </div>
                <div class="modal-footer">
                    <div>
                        <button class="btn btn-danger" id="editReviewSubmit" type="button">Отправить</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#editReviewSubmit").click(function (e) {
            e.preventDefault();

            var editReviewErrors = $('.editReviewErrors');

            editReviewErrors.empty();

            formData = $("#editReviewForm").serializeArray();

            $.ajax({
                beforeSend: function () {
                    $('#loader').show();
                },
                complete: function () {
                    $('#loader').hide();
                },

                url: "/reviews/update",
                type: "post",
                data: formData,
                success: function (data) {
                    location.reload();
                },
                error: function (msg) {
                    console.log(msg)
                    let errors = msg.responseJSON.errors;
                    str = "";
                    $.each(errors, function (idx, val) {
                        str += "<div class='error'>" + idx + ": " + val + "</div>";
                    })
                    editReviewErrors.append(str);
                }

            });
        });
    });
</script>