<form class="form-valide" id="create-form">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Service Title: {{ $service->title }}</h5>
        <button type="button" class="close pt-3 btn-sm" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-2"> Category:</div>
            <div class="col-lg-10">
                {{ $service->hasCategory->name }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Sub category:</div>
            <div class="col-lg-10">
                {{ $service->subcat->name }}

            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Title:</div>
            <div class="col-lg-10">
                {{ $service->title }}

            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Description:</div>
            <div class="col-lg-10">{{ $service->description }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Contact name:</div>
            <div class="col-lg-10">
                {{ $service->contact_name }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Phone number:</div>
            <div class="col-lg-10">
                {{ $service->phone_number }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Business name:</div>
            <div class="col-lg-10">
                {{ $service->business_name }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Business address:</div>
            <div class="col-lg-10">
                {{ $service->service }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Service Image</div>
            <div class="col-lg-10">
                <div class="d-flex">
                    <img src="{{$service->main_service_image}}" class="mr-2" alt="" width="200" height="120">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"> Multiple Images:</div>
            <div class="col-lg-10">
                <div class="d-flex flex-wrap">
                    {{-- @dd($service->hasAttachment) --}}
                    @foreach ($service->hasAttachment as $key)
                        <img src="{{$key->attachment_name}}" class="mr-2 mt-2" alt="" width="200" height="120">
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Save</button>
        </div> --}}
</form>
</div>
</div>
</div>
