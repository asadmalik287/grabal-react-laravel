<div>
    @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="row">
    <div class="col-lg-12 pt-0">
        <button class="btn btn-success text-right">
            Add new +
        </button>
    </div>

    <div class="col-lg-6 pt-0">
        <form action="{{ url('admin/store_banner') }}" method=post>
            @csrf
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Title <span
                        class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="title" placeholder="Enter title.." />
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Page <span
                        class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <select class="js-select2 form-control" id="val-select2" name="page" style="width: 100%;">
                        <option selected disabled>Select Ads location</option>
                        <option value="home">Home</option>
                        <option value="sidebar">Sidebar</option>
                        <option value="serviceDetail">Service Detail</option>
                    </select>
                    @error('page')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label class="cabinet center-block">
                    <figure>
                        <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                        <figcaption><i class="fa fa-camera"></i></figcaption>
                    </figure>
                    <input type="file" class="item-img file center-block" name="file_photo" />
                </label>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    </div>
F
    <div class="text-right">
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>




    </form>
</div>


</div>
