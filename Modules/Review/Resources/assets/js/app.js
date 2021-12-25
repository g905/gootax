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
                autocomplete();
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

            url: "/reviews/" + $(this).data('review') + "/edit",
            type: "get",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $(this).data('review'),
            },
            success: function (data) {
                $('#editReviewModal .editReviewData').append(data);
                $('#editReviewModal').modal('show');
                autocomplete();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

});

function autocomplete() {
    var token = "c8616d4e3423b210b36fa956f3dd7d4e11de2a02";

    var defaultFormatResult = $.Suggestions.prototype.formatResult;

    function formatResult(value, currentValue, suggestion, options) {
        var newValue = suggestion.data.city;
        suggestion.value = newValue;
        return defaultFormatResult.call(this, newValue, currentValue, suggestion, options);
    }

    function formatSelected(suggestion) {
        return suggestion.data.city;
    }

    $("#cityInput").suggestions({
        token: token,
        type: "ADDRESS",
        hint: false,
        bounds: "city",
        constraints: {
            locations: {city_type_full: "город"}
        },
        formatResult: formatResult,
        formatSelected: formatSelected,
        onSelect: function (suggestion) {
            console.log(suggestion);
        }
    });
}
;