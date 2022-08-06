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
                            <h3 class="card-title">Edit Product {{$product->name}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form id="form-create-product" method="POST" action="{{route('admin-product-update',parameters: ['id'=>$product->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Product Name</label>
                                    <input value="{{$product->name}}" required type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Product Description</label>
                                    <textarea value="{{$product->description}}"  name="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="type">Product Category</label>
                                    <select name="type" class="form-control custom-select">
                                        @foreach($categories as $category)
                                            {{--                                                <option selected="" disabled="">Select one</option>--}}
                                            <option @if($product->type == $category->id) selected @endif value="{{ $category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Product Price</label>
                                    <input value="{{$product->price}}" required type="number" min="0" name="price" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="inputProductQuantity">Project Quantity</label>
                                    <input value="{{$product->quantity}}"   required type="number" min="0" name="quantity" class="form-control">
                                </div>

                                {{--                                    atribute of table product infor--}}

                                <div class="form-group">
                                    <label for="display">Display</label>
                                    <input   value="{{$product_infor->display}}" type="text" name="display" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="operating_system">Operating System</label>
                                    <input  value="{{$product_infor->operating_system}}" type="text" name="operating_system" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="front_camera">Font camera</label>
                                    <input  value="{{$product_infor->front_camera}}"  type="number" min="0" name="front_camera" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="rear_camera">Rear camera</label>
                                    <input  value="{{$product_infor->rear_camera}}" type="text" name="rear_camera" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cpu">CPU</label>
                                    <input value="{{$product_infor->cpu}}"  type="text" name="cpu" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="ram">Ram</label>
                                    <input  value="{{$product_infor->ram}}"  type="text" name="ram" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="ram">Rom</label>
                                    <input   value="{{$product_infor->rom}}" type="number" min="0" name="rom" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="battery">Battery</label>
                                    <input  value="{{$product_infor->battery}}"   type="number" min="0" name="battery" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="security">Security</label>
                                    <input  value="{{$product_infor->security}}" type="text" name="security" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="charging_port">Charging port</label>
                                    <input  value="{{$product_infor->charging_port}}" type="text" name="charging_port" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="compatible">Compatible</label>
                                    <input  value="{{$product_infor->compatible}}" type="text" name="compatible" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="sound_technology">Sound Technology</label>
                                    <input  value="{{$product_infor->sound_technology}}" type="text" name="sound_technology" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="used_time">Used Time</label>
                                    <input value="{{$product_infor->used_time}}" type="text" name="used_time" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="connect">Connect</label>
                                    <input value="{{$product_infor->connect}}" type="text" name="connect" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input value="{{$product_infor->weight}}" type="text" name="weight" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input value="{{$product_infor->brand}}" type="text" name="brand" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="made_in">Made in</label>
                                    <input value="{{$product_infor->made_in}}" type="text" name="made_in" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="hard_drive">Hard drive</label>
                                    <input value="{{$product_infor->hard_drive}}" type="text" name="hard_drive" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="graphic_card">Graphic card</label>
                                    <input value="{{$product_infor->graphic_card}}" type="text" name="graphic_card" class="form-control">
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Image for product</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">


                            <table border="1" cellspacing="10px" cellpadding="10px">
                                <tr>
                                    <td><label>Image main</label></td>
                                    <td><input form="form-create-product" name='image' type="file" onchange="readURL(this,'image_preview_main');" /></td>
                                    <td> <img height="100px" width="100px" id="image_preview_main" src="{{asset($product->get_url_image())}}" alt="your image" /></td>
                                </tr>

                                <tr>
                                    <td><label>Image 1</label></td>
                                    <td> <input form="form-create-product" name='image_1' type="file" onchange="readURL(this,'image_preview_1');" /></td>
                                    <td>  <img height="100px" width="100px" id="image_preview_1" @if(isset($product_images['0'])) src="{{asset($product_images['0']->get_url_image_by_image_name())}}"  @endif alt="your image" /></td>
                                </tr>

                                <tr>
                                    <td><label>Image 2</label></td>
                                    <td> <input form="form-create-product" name='image_2' type="file" onchange="readURL(this,'image_preview_2')" /></td>
                                    <td>  <img height="100px" width="100px" id="image_preview_2" @if(isset($product_images['1'])) src="{{asset($product_images['1']->get_url_image_by_image_name())}}"  @endif alt="your image" /></td>
                                </tr>

                                <tr>
                                    <td><label>Image 3</label></td>
                                    <td> <input form="form-create-product" name='image_3'  type="file" onchange="readURL(this,'image_preview_3')" /></td>
                                    <td>  <img height="100px" width="100px" id="image_preview_3" @if(isset($product_images['2'])) src="{{asset($product_images['2']->get_url_image_by_image_name())}}" @endif alt="your image" /></td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input form="form-create-product" type="submit" value="Update product" class="btn btn-success float-right">
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script type="text/javascript">
        function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#'+id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>


@endsection
