@extends('.admin.layouts.default')

@section('content')

    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Provinces Form</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Dashboard</span></li>
                <li><span>Provinces</span></li>
                <li><span>Provinces Form</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form1" method="post" action="{{ route('province-management.store') }}" class="form-horizontal" >
                @csrf
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">New Province</h2>
                    </header>
                    <div class="card-body">
                        <div class="row form-group pb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Name</label>
                                    <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="formGroupExampleInput">Code</label>
                                    <input type="text" name="code" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="card-footer text-end">
                        <button type="button" class="btn btn-danger"><i class="fas fa-sync"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Add Province</button>
                    </footer>
                </section>
            </form>
        </div>


    </div>

@stop
