@extends('layouts.app')
@section('title', 'Upload ads')

@section('style')
    <link href="{{ asset('assets/admin/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://foliotek.github.io/Croppie/croppie.css" rel="stylesheet" />

    <style>
        .modal-dialog {
            max-width: 1800px !important;
            width: 100% !important;
            height: 800px !important;
        }

        label.cabinet {
            display: block;
            cursor: pointer;
        }

        label.cabinet input.file {
            position: relative;
            height: 100%;
            width: auto;
            opacity: 0;
            -moz-opacity: 0;
            filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
            margin-top: -30px;
        }

        #upload-demo {
            width: 100%;
            height: 500px;
            padding-bottom: 25px;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right"></div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Upload ads</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <div>
    </div>
    <div class="row">

        <div class="col-lg-12 pt-0">
            <div class="row mt-0">
                <div class="col-lg-6 pt-0">
                    @if ($detail != null)
                        <form action="{{ route('ads.update', $detail->id) }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                        @else
                            <form action="{{ url('admin/store_banner') }}" method=post>
                                @csrf
                    @endif
                    <div class="form-group row align-items-center">
                        <label class="col-lg-2 col-form-label" for="val-select2">Title <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter title.."
                                value="{{ $detail != null ? $detail->title : '' }}" />
                            {{-- @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-lg-2 col-form-label" for="val-select2">Page <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select class="js-select2 form-control" id="val-select2" name="page" style="width: 100%;">
                                <option selected disabled>Select Ads location</option>
                                <option data-width='1523' data-height='369' value="home"
                                    {{ $detail != null ? ($detail->page == 'home' ? 'selected' : '') : '' }}>Home
                                </option>
                                <option data-width='233' data-height='650' value="sidebar"
                                    {{ $detail != null ? ($detail->page == 'sidebar' ? 'selected' : '') : '' }}>
                                    Sidebar</option>
                                <option data-width='362' data-height='394' value="serviceDetail"
                                    {{ $detail != null ? ($detail->page == 'serviceDetail' ? 'selected' : '') : '' }}>
                                    Service Detail</option>
                            </select>
                            {{-- @error('page')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="form-group row align-items-center">
                                <span id="dimension" style="color:red">
                                </span>
                                <label class="cabinet center-block">
                                    <figure class="position-relative">
                                        @if ($detail != null)
                                            <img src="{{ asset('storage/' . $detail->attachment_link) }}"
                                                class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                            <span style="color:rgb(124, 121, 121)"> Please Click on Image to change
                                                Attachment</span>
                                        @else
                                            <img src=" {{ asset('/assets/admin/banners/ad.jpg') }}"
                                                class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                        @endif
                                        {{-- <figcaption class="position-absolute" style="top: 150px"><i class="fa fa-camera"></i></figcaption> --}}
                                    </figure>
                                    <input type="file" class="item-img file center-block" id="attachment"
                                        {{ $detail == null ? 'disabled' : '' }} name="attachment" />
                                </label>
                                {{-- @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                            </div>

                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success px-3">Save Ad</button>
                    </div>
                </div>

                <input type="hidden" name="hiddenInput" id="hiddenInput">
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> </h4>
                </div>
                <div class="modal-body">
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/bootstrap.min.js') }}"></script>
    <script src="https://foliotek.github.io/Croppie/croppie.js"></script>



    <script>
        // Start upload preview image
        // $(".gambar").attr("src", "{{ URL::asset('/assets/admin/banners/ads_tutorial.png') }}");
        var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;
        $(document).ready(function() {
            detail = <?php echo json_encode($detail); ?>;
            if (detail) {
                $('#val-select2').change()
                $('#val-select2').attr('readonly',true)
            }
        })

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                // swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }
        var globalWidth = 0;
        var globalHeight = 0;
        $('#val-select2').on('change', function() {
            $('#attachment').prop('disabled', false)
            var globalWidth = $(this).find(':selected').attr('data-width')
            var globalHeight = $(this).find(':selected').attr('data-height')
            $('#dimension').html('Note: <span style="color:red">*</span> Image Dimension should be ' + globalWidth +
                ' by ' + globalHeight + ' ')
            $('.cr-viewport').css('width', globalWidth)
            $('.cr-viewport').css('height', globalHeight)
        });
        $uploadCrop = $('#upload-demo').croppie({
            // viewport: {
            //     width: globalWidth,
            //     height: globalHeight,
            // },
            enforceBoundary: false,
            enableExif: true
        });
        $('#cropImagePop').on('shown.bs.modal', function() {
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function() {
                console.log('jQuery bind complete');
            });
        });
        $('.item-img').on('change', function() {
            imageId = $(this).data('id');
            tempFilename = $(this).val();
            $('#cancelCropBtn').data('id', imageId);

            readFile(this);
        });
        $('#cropImageBtn').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                backgroundColor:'white',
                // size: {
                //     width: 150,
                //     height: 200
                // }
            }).then(function(resp) {
                $('#item-img-output').attr('src', resp);
                console.log(resp)
                $('#hiddenInput').val(resp)
                $('#cropImagePop').modal('hide');
            });
        });
        // End upload preview image
    </script>
@endsection
