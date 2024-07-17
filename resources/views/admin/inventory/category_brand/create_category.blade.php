<!-- Modal -->
<div class="modal fade" id="create-category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('create.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="5" id="cat_description" name="cat_description" class="form-control" placeholder="Category Description."></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <div>Upload (Single File) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">Clear</a></div>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                            accept="image/png, image/jpg, image/jpeg" name="cat_image" >
                                        {{-- <input type="hidden" name="cat_image" value="10485760" /> --}}
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('admin_assets/plugins/fileupload/fileupload.min.js') }}"></script>

