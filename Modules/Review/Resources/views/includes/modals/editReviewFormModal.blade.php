<div class="">
    <div class="modal-header">Изменить отзыв</div>
    <div id="editReviewModalData">
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
            <form action="{{ route('reviews.update', $review->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
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
                        <input id="cityInput" name="city" type="text" />
                    </div>
                    <input type="hidden" name="id" value="{{ $review->id }}">
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