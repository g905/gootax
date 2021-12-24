$(function () {
    var myModal = $('#authorModal');
    var myInput = $('#data');

    myModal.on('hidden.bs.modal', function () {
        myInput.empty();
    });

    $('.authorBtn').on('click', function () {
        $.ajax({
            beforeSend: function () {
                $('#loader').show();
            },
            complete: function () {
                $('#loader').hide();
            },

            url: "/reviews/author",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                author_id: $(this).data('author'),
            },
            success: function (data) {
                $('#authorModal').modal('show');
                var str = '<div>Автор: ' + data['name'] + '</div>' +
                        '<div>Email: ' + data['email'] + '</div>' +
                        '<div>Телефон: ' + data['phone'] + '</div>' +
                        '<div class="mt-2"><a class="btn btn-danger" href="/reviews-by-author/' + data["id"] + '">Все отзывы автора</a></div>';
                $('.data').append(str);
            },
            error: function (msg) {
                console.log(msg);
            }

        });
    });


    $('#addReview').on('click', function () {
        var addReviewModal = $('#addReviewModal');
        var addReviewInput = $('#addReviewModal .addReviewData');

        addReviewModal.on('hidden.bs.modal', function () {
            addReviewInput.empty();
        });
        $.ajax({
            beforeSend: function () {
                $('#loader').show();
            },
            complete: function () {
                $('#loader').hide();
            },

            url: "/reviews/create",
            type: "get",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                author_id: $(this).data('author'),
            },
            success: function (data) {
                $('#addReviewModal .addReviewData').append(data);
                $('#addReviewModal').modal('show');
            },
            error: function (msg) {
                console.log(msg);
            }

        });
    });

    $('.editReviewBtn').on('click', function () {
        var editReviewModal = $('#editReviewModal');
        var editReviewInput = $('#editReviewModal .editReviewData');

        editReviewModal.on('hidden.bs.modal', function () {
            editReviewInput.empty();
        });
        $.ajax({
            beforeSend: function () {
                $('#loader').show();
            },
            complete: function () {
                $('#loader').hide();
            },

            url: "/reviews/edit",
            type: "post",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $(this).data('review'),
            },
            success: function (data) {
                $('#editReviewModal .editReviewData').append(data);
                $('#editReviewModal').modal('show');
            },
            error: function (msg) {
                console.log(msg);
            }

        });
    });

})