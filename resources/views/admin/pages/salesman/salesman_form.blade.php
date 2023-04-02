@extends('admin.layouts.default')

@section('content')

    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Salesman Form</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Dashboard</span></li>
                <li><span>Salesman</span></li>
                <li><span>Salesman Form</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form1" class="form-horizontal">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">New Salesman</h2>
                    </header>
                    <div class="card-body">
                        <div class="row form-group pb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">First Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Last Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Email</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Contact No.</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Qualification</label>
                                    <select class="form-control mb-3">
                                        <option>Matriculation</option>
                                        <option>Intermediate</option>
                                        <option>Graduation</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">CNIC No</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">CNIC</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Marital Status</label>
                                    <select class="form-control mb-3">
                                        <option>Single</option>
                                        <option>Married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Religion</label>
                                    <select class="form-control mb-3">
                                        <option>Islam</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Work History</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Passport Size Picture</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Bank Account Details (if any)</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Age</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4 pb-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Address</label>
                                    <textarea class="form-control" rows="3" id="textareaDefault"></textarea>                                </div>
                            </div>

                        </div>
                    </div>
                    <footer class="card-footer text-end">
                        <button class="btn btn-danger"><i class="fas fa-sync"></i> Reset</button>
                        <button class="btn btn-primary"><i class="fas fa-check"></i> Add Salesman</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>

@stop
