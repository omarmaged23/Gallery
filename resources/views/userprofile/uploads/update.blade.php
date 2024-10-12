<div class="card my-4" style="border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <h3 class="card-header text-center" style="color: rgb(12, 9, 9);">Upload Your File</h3>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            <div class="mb-3">
                <input type="text" name="name" placeholder="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description" style="resize:none;" required></textarea>
            </div>
            <div class="mb-3">
                <select class="form-control" name="category" id="">
                    <option value="1">cat1</option>
                    <option value="2">cat2</option>
                    <option value="3">cat3</option>
                    <option value="4">cat4</option>
                    <option value="5">cat5</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="slugs" id="" multiple>
                    <option value="1">Tag1</option>
                    <option value="2">Tag2</option>
                    <option value="3">Tag3</option>
                    <option value="4">Tag4</option>
                    <option value="5">Tag5</option>
                </select>
            </div>
            {{-- <div class="mb-3">
                <input class="form-control" type="file" id="myFile" name="filename" accept=".jpg,.jpeg,.png,.mp4" required>
            </div> --}}
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
