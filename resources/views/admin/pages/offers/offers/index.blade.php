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
                                <th width="22%">Image</th>
                                <th width="30%">Title</th>
{{--                                <th width="10%">Category</th>--}}
                                <th width="10%">Featured</th>
                                <th width="30" style="text-align: center">Action</th>
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
{{--                                        <td>{{ $row->category->name }}</td>--}}
                                        <td>
                                            @if($row->IsFeature == 1)
                                                Yes
                                            @else
                                                No
                                            @endif

                                        </td>
                                        <td style="text-align: center">
                                            <button class="btn btn-danger" onclick="openDeleteModal()" style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-times"></i></button>
                                            <button class="btn btn-warning" style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-comments"></i></button>
                                            <button class="btn btn-primary"  style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-secondary"  style="padding: 6px 8px;font-size: 14px;"><i class="fas fa-eye"></i></button>
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

@stop
