@extends('admin.master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Category</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form id="form-create-product" method="POST" action="{{route('admin-category-store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Category Name</label>
                                    <input required type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Category Quantity</label>
                                    <input required type="text" name="quantity" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->

                    </div>
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input form="form-create-product" type="submit" value="Create new category" class="btn btn-success float-right">
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
