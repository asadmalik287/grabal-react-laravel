
<form class="form-valide" id="update-form">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
        <button type="button" class="close pt-3" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body my-5">
        <div class="form-validation">
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="update-category"> Category <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="update-category" name="name" value="{{$category->name}}" placeholder="Enter a Category.." />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Status <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <select class="js-select2 form-control" id="val-select2" name="status" style="width: 100%;">
                        <option selected disabled>Select status</option>
                        <option value="Active" @if($category->status == 'active') selected  @endif>Active</option>
                        <option value="Paused" @if($category->status == 'paused') selected  @endif>Paused</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="commonFunction(false,'{{ route('categories.update',$category->id) }}','{{route('sub-categories.index')}}','post','','update-form');">Save</button>
    </div>
</form>
