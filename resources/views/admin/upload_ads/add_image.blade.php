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
        <form action="">
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Title <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="title" placeholder="Enter title.." />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Page <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <select class="js-select2 form-control" id="val-select2" name="page"  style="width: 100%;">
                        <option selected disabled>Select Ads location</option>
                        <option value="home">Home</option>
                        <option value="sidebar">Sidebar</option>
                        <option value="serviceDetail" >Service Detail</option>
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label class="col-lg-2 col-form-label" for="val-select2">Image <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <input type="file" class="form-control" name="" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary px-3">Save</button>
            </div>




        </form>
    </div>


</div>



