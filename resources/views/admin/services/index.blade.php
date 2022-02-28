@extends('layouts.app')
@section('title','Services')


@section('content')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right"></div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>



<div><h3 class="text-center mb-3">All Services</h3></div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="bootstrap-data-table-panel">
                <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub-category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="wsnw">Demo</td>
                                <td class="wsnw">Demo category</td>
                                <td class="wsnw">Demo sub-category</td>
                                <td>
                                    <div class="serviceDescription">Demo Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste similique, rerum ducimus minus officia quod quibusdam quia deserunt distinctio perspiciatis sunt, quidem eaque numquam quos alias, soluta voluptatum illo molestiae!</div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewServices">View</button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td class="wsnw">Demo</td>
                                <td class="wsnw">Demo category</td>
                                <td class="wsnw">Demo sub-category</td>
                                <td>
                                    <div class="serviceDescription">Demo Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste similique, rerum ducimus minus officia quod quibusdam quia deserunt distinctio perspiciatis sunt, quidem eaque numquam quos alias, soluta voluptatum illo molestiae!</div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewServices">View</button>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td class="wsnw">Demo</td>
                                <td class="wsnw">Demo category</td>
                                <td class="wsnw">Demo sub-category</td>
                                <td>
                                    <div class="serviceDescription">Demo Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste similique, rerum ducimus minus officia quod quibusdam quia deserunt distinctio perspiciatis sunt, quidem eaque numquam quos alias, soluta voluptatum illo molestiae!</div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewServices">View</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Add Category Modal Start --}}
<div class="modal fade" id="viewServices" tabindex="-1" role="dialog" aria-labelledby="viewServicesTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="form-valide" id="create-form">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">View Service</h5>
                    <button type="button" class="close pt-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2"> Category:</div>
                        <div class="col-lg-10">
                           Category is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Sub category:</div>
                        <div class="col-lg-10">
                           Sub category is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Title:</div>
                        <div class="col-lg-10">
                           Title is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Description:</div>
                        <div class="col-lg-10">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, consequatur, pariatur rerum voluptates iusto necessitatibus explicabo placeat natus, consectetur nesciunt minima obcaecati. Est maxime perspiciatis repellendus ipsam. Consequuntur, pariatur accusamus!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Contact name:</div>
                        <div class="col-lg-10">
                            Contact name is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Phone number:</div>
                        <div class="col-lg-10">
                            Phone number is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Business name:</div>
                        <div class="col-lg-10">
                            Business name is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Business address:</div>
                        <div class="col-lg-10">
                           Street No - Business street - Business unit - Business address is here
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Vetting Docs:</div>
                        <div class="col-lg-10">
                            <div class="d-flex">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Vaccinations:</div>
                        <div class="col-lg-10">
                            <div class="d-flex">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> Certifications:</div>
                        <div class="col-lg-10">
                            <div class="d-flex">
                                <img src="{{asset('assets/admin/images/2.png')}}" class="mr-2" alt="">
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
{{-- Add Category Modal end --}}



@endsection
