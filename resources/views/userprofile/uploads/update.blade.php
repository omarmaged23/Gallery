<div class="card my-4" style="border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <h3 class="card-header text-center" style="color: rgb(12, 9, 9);">Upload Your File</h3>
    <div class="card-body">
        <form action="{{route('admin.media.update')}}" method="post" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            <input type="hidden" name="id" value="{{$photo->id}}">
            <div class="mb-3">
                <input type="text" name="name" placeholder="title" class="form-control" id="title" value="{{$photo->name}}" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description" style="resize:none;">{{$photo->description}}</textarea>
            </div>
            <div class="mb-3">
                <select class="form-control" name="category" id="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $photo->categories->first()->id ? 'selected' :''}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="slugs[]" id="" multiple>
                    @foreach($slugs as $slug)
                        <option value="{{$slug->id}}" {{in_array($slug->id,$photoSlugs) ? 'selected' : ''}}>{{$slug->title}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Submit Changes">
        </form>
    </div>
</div>
