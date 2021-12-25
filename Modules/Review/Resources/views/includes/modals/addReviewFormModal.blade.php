<div class="">
    <div class="modal-header">Добавить отзыв</div>
    <div id="addReviewModalData">
        <div class="p-6 bg-white border-b border-gray-200">
            @if ($errors->any())
            <div class="modal-body">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
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
                        <button class="btn btn-danger" type="submit">Отправить</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>