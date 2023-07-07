@extends('.admin.layouts.default')

@section('content')

    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Offers</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Dashboard</span></li>
                <li><span>Offers</span></li>
                <li><span>Offers List</span></li>

            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <div class="card card-modern card-modern-table-over-header">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <a href="/offers/form" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Offer</a>
                                </div>
                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">

                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">

                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Offer">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-ecommerce-simple table-borderless table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 640px;">

                            <thead>

                            <tr>
                                <th width="8%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
{{--                                <th width="5%">ID</th>--}}
                                <th width="10%">Seller</th>
                                <th width="20%">Image</th>
                                <th width="15%">Title</th>
                                <th width="25%">Description</th>
{{--                                <th width="10%">Featured</th>--}}
                                <th width="10%" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $key => $row )
                                    <tr>
                                        <td><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
{{--                                        <td>{{ ++$key }}</td>--}}
                                        <td>{{ $row->shop->seller->name }}</td>
                                        <td><img src="{{ asset('storage/'.$row->banner) }}" style="width:150px; height:150px;"/></td>
                                        <td><strong>{{ $row->title }}</strong></td>
                                        <td>{{ $row->description }}</td>
{{--                                        <td>--}}
{{--                                            @if($row->IsFeature == 1)--}}
{{--                                                Yes--}}
{{--                                            @else--}}
{{--                                                No--}}
{{--                                            @endif--}}

{{--                                        </td>--}}
                                        <td style="text-align: center">
                                            <button class="btn btn-danger" onclick="openDeleteModal()" style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-times"></i></button>
                                            <button class="btn btn-primary" onclick="openViewModal()" style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-stretch">
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <select class="form-control select-style-1 bulk-action" name="bulk-action" style="min-width: 170px;">
                                                <option value="" selected>Bulk Actions</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <a href="ecommerce-orders-detail.html" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-auto text-center order-3 order-lg-2">
                                    <div class="results-info-wrapper"></div>
                                </div>
                                <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                    <div class="pagination-wrapper"></div>
                                </div>
                            </div>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterTitle">Remove Offer</h5>
                    <button type="button" class="close" onclick="closeDeleteModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="formGroupExampleInput">Reason for Offer Removal</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeDeleteModal()">Close</button>
                    <button type="button" class="btn btn-danger">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterTitle">View Offer</h5>
                    <button type="button" class="close" onclick="closeViewModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-body p-0">
                                <div class="row no-gutters">
                                    <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                        <div class="page-account-profil pt-5">
                                            <div class="profile-img text-center rounded-circle">
                                                <div class="pt-5">
                                                    <div class="bg-img m-auto">
                                                        <img class="img-fluid" alt="Offer Image">
                                                    </div>
                                                    <div class="profile pt-4">
                                                        <h4 class="mb-1">Offer Title</h4>
                                                        <p>by Seller Name</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-3 profile-counter">
                                                <ul class="nav justify-content-center text-center">
                                                    <li class="nav-item border-right px-3">
                                                        <div>
                                                            <h4 class="mb-0">90</h4>
                                                            <p>Views</p>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item  px-3">
                                                        <div>
                                                            <h4 class="mb-0">20</h4>
                                                            <p>Conversion</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                        <div class="page-account-form">
                                            <div class="form-titel border-bottom p-3">
                                                <h5 class="mb-0 py-2">Offer Details</h5>
                                            </div>
                                            <div class="p-4">
                                                <div class="form-row border-bottom mb-4" >
                                                    <div class="col-md-4 mb-3">
                                                        <label for="name1">Featured: Yes</label>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="name1">Title: Summer Sale</label>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="title1">Category: T-shirts, Shoes, Socks, Kurta Shalwar, Caps</label>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="phone1">Targeted Area: Bahadurabad, Tariq Road</label>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <label for="phone1">Decription: Flat 30% Sale on All Items</label>
                                                    </div>
                                                </div>
                                                <h5 class="">Uploaded Details</h5>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name1">Created At: 7-July-2023 12:30:40 PM</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeViewModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openDeleteModal(){
            $('#deleteModal').modal('show');
        }
        function closeDeleteModal(){
            $('#deleteModal').modal('hide');
        }
        function openViewModal(){
            $('#viewModal').modal('show');
        }
        function closeViewModal(){
            $('#viewModal').modal('hide');
        }
    </script>
@stop
