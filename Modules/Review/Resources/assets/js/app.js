$(function () {
    var myModal = $('#authorModal');
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

            url: "reviews/author",
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
})