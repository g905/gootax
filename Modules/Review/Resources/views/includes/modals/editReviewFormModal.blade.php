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
            <form action="{{ route('reviews.update') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
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
                        <label for="city">City</label>
                        <select name="select_city">
                            <option value="none" selected>-</option>>
                            @foreach($cities as $city)
                            <option value="{{ $city }}" @if($city == $review->city->name) selected @endif>{{ $city }}</option>
                            @endforeach
                        </select>
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