<div class="card my-4" style="border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <h3 class="card-header text-center" style="color: rgb(12, 9, 9);">Upload Your File</h3>
    <div class="card-body">
        <form action="{{route('admin.media.store')}}" method="post" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            <div class="mb-3">
                <input type="text" name="name" placeholder="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description" style="resize:none;" required></textarea>
            </div>
            <div class="mb-3">
                <select class="form-control" name="category" id="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="slugs[]" id="" multiple>
                    @foreach($slugs as $slug)
                        <option value="{{$slug->id}}">{{$slug->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" id="myFile" name="media" accept=".jpg,.jpeg,.png,.mp4,.mkv" required>
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Submit">
        </form>
    </div>
</div>
