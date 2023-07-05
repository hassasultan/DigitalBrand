@extends('admin.layouts.default')

@section('content')

    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Salesman</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Dashboard</span></li>
                <li><span>Salesman</span></li>
                <li><span>Salesman List</span></li>
            </ol>
        </div>
    </header>
    <div class="row">
        <div class="col">
            <div class="card card-modern card-modern-table-over-header">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <a href="{{ route('salesman-management.create') }}"
                                       class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add
                                        Salesman</a>
                                </div>
                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">

                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">

                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <input type="text" class="search-term form-control" name="search-term"
                                                   id="search-term" placeholder="Search Salesman">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-ecommerce-simple table-borderless table-striped mb-0"
                               id="datatable-ecommerce-list" style="min-width: 640px;">

                            <thead>
                            <tr>
                                <th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value=""/></th>
                                <th width="5%">Image</th>
                                <th width="25%">ID</th>
                                <th width="17%">Name</th>
                                <th width="20%">Email</th>
                                <th width="15%">Contact</th>
                                <th width="50%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesman as $key => $row)
                                    <tr>
                                        <td><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value=""/></td>
                                        <td><div class="bg-img mr-4"><img class="img-fluid" ></div></td>
                                        <td>{{ $key++ }}</td>
                                        <td><a href="#"><strong>{{ $row->user->name }}</strong></a></td>
                                        <td>{{ $row->user->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            <button class="btn btn-success" style="padding: 4px 6px;font-size: 12px;" onclick="openApproveModal()"><i
                                                    class="fas fa-check"></i></button>
                                            <button class="btn btn-danger" style="padding: 4px 6px;font-size: 12px;" onclick="openDeleteModal()"><i
                                                    class="fas fa-trash"></i></button>
                                            <button class="btn btn-warning" style="padding: 4px 6px;font-size: 12px;"><i
                                                    class="fas fa-pen"></i></button>
                                            <button class="btn btn-primary" onclick="openViewModal()" style="padding: 4px 6px;font-size: 12px;"><i
                                                    class="fas fa-eye"></i></button>
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
                                            <select class="form-control select-style-1 bulk-action" name="bulk-action"
                                                    style="min-width: 170px;">
                                                <option value="" selected>Bulk Actions</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <a href="ecommerce-orders-detail.html"
                                               class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
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
    <div class="modal fade" id="aprroveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterTitle">Approve Salesman</h5>
                    <button type="button" class="close" onclick="closeApproveModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve this account
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeApproveModal()">Close</button>
                    <button type="button" class="btn btn-success">Approve</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterTitle">Delete Salesman</h5>
                    <button type="button" class="close" onclick="closeDeleteModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this salesman ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeDeleteModal()">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterTitle">View Salesman</h5>
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
                                                        <img class="img-fluid" alt="">
                                                    </div>
                                                    <div class="profile pt-4">
                                                        <h4 class="mb-1">Salesman Name</h4>
                                                        <p>Salesman ID</p>
                                                        <p>City, Area</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-5 profile-counter">
                                                <ul class="nav justify-content-center text-center">
                                                    <li class="nav-item border-right px-3">
                                                        <div>
                                                            <h4 class="mb-0">90</h4>
                                                            <p>Sellers</p>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item  px-3">
                                                        <div>
                                                            <h4 class="mb-0">20k</h4>
                                                            <p>Balance</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                        <div class="page-account-form">
                                            <div class="form-titel border-bottom p-3">
                                                <h5 class="mb-0 py-2">Salesman Details</h5>
                                            </div>
                                            <div class="p-4">
                                                <div class="form-row border-bottom mb-4" >
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name1">Name: Ahmed</label>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="title1">Phone: +92 324 2520084 </label>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone1">CNIC: 42201-4501150-3 </label>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone1">Email: salesmanemail@gmail.com</label>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="phone1">Address: House # 123, abc colony, main xyz road</label>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="">Age: 21</label>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="">Religion: Islam</label>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="">Qualification: Intermediate</label>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="">Marital Status: Single</label>
                                                    </div>
                                                </div>
                                                <h5 class="">Account Details</h5>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name1">Bank Name: Meezan</label>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="title1">Account No:</label>
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
        function openApproveModal(){
            $('#aprroveModal').modal('show');
        }
        function closeApproveModal(){
            $('#aprroveModal').modal('hide');
        }
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

