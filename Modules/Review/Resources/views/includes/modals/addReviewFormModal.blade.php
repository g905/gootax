<div class="">
    <div class="modal-header">Добавить отзыв</div>
    <div id="addReviewModalData">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="addReviewErrors text-danger">
            </div>

            <form action="" method="post" enctype="multipart/form-data" id="addReviewForm">
                <div class="modal-body">
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
                        <input type="file" name="attach">
                    </div>
                    <div>
                        <label for="city">Город:</label>
                        <input id="cityInput" name="city" type="text" />
                    </div>

                </div>
                <div class="modal-footer">
                    <div>
                        <button class="btn btn-danger" id="addReviewSubmit" type="button">Отправить</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#addReviewSubmit").click(function (e) {
            e.preventDefault();

            var addReviewErrors = $('.addReviewErrors');

            addReviewErrors.empty();

            formData = $("#addReviewForm").serializeArray();

            $.ajax({
                beforeSend: function () {
                    $('#loader').show();
                },
                complete: function () {
                    $('#loader').hide();
                },

                url: "/reviews/store",
                type: "post",
                data: formData,
                success: function (data) {
                    location.reload();
                },
                error: function (msg) {
                    let errors = msg.responseJSON.errors;
                    str = "";
                    $.each(errors, function (idx, val) {
                        str += "<div class='error'>" + idx + ": " + val + "</div>";
                    })
                    addReviewErrors.append(str);
                }

            });
        });
    });
</script>