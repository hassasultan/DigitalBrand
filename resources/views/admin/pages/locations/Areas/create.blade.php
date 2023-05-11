@extends('.admin.layouts.default')

@section('content')

    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Areas Form</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Dashboard</span></li>
                <li><span>Areas</span></li>
                <li><span>Areas Form</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form1" class="form-horizontal">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">New Area</h2>
                    </header>
                    <div class="card-body">
                        <div class="row form-group pb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">City</label>
                                    <select class="form-control" id="formGroupExampleInput" placeholder="">
                                        <option>City 1</option>
                                        <option>City 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Area Code</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Facebook Page ID</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="card-footer text-end">
                        <button class="btn btn-danger"><i class="fas fa-sync"></i> Reset</button>
                        <button class="btn btn-primary"><i class="fas fa-check"></i> Add Area</button>
                    </footer>
                </section>
            </form>
        </div>


    </div>

@stop
