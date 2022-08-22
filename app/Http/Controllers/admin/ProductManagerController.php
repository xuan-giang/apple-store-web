<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductInformation;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductManagerController extends Controller
{
    function index()
    {
        $products = Product::query()->get();
        return view('admin.product.product',data:[
            'products' => $products
        ]);
    }



    public function create()
    {
        //$products = Product::query()->get();
        $categories = DB::table('product_category')->get();
        return view('admin.product.product_add',data:[
            // 'products' => $products
            'categories' =>$categories
        ]);
    }

    public function updateQuantityCategory($idCategory, $process)
    {
        if($idCategory == null)
            return;
        $data = Category::find($idCategory);
        if($process == "CREATE"){
            $data->quantity = $data->quantity + 1;
        }

        if($process == "DELETE"){
            $data->quantity = $data->quantity - 1;
        }

        $data->save();
    }

    public function store(Request $request)
    {

        if($request->file('image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_1'  =>'mimes:jpeg,bmp,png',
                'image_2'  =>'mimes:jpeg,bmp,png',
                'image_3'  =>'mimes:jpeg,bmp,png',
            ]);

            $product = Product::create($request->all());

            $file_main= $request->file('image');

            if($request->file('image_1')){
                $file_1 = $request->file('image_1');
                $filename_1 = $product->id.'_1.'.$file_1->extension();
                $storedPath_1 = $file_1-> move(public_path('img/image-product'), $filename_1);
                ProductImages::create(array('id_product' => $product->id,'url'=> $filename_1));
            }

            if($request->file('image_2')){
                $file_2 = $request->file('image_2');
                $filename_2 = $product->id.'_2.'.$file_2->extension();
                $storedPath_2 = $file_2-> move(public_path('img/image-product'), $filename_2);
                ProductImages::create(array('id_product' => $product->id,'url'=> $filename_2));
            }

            if($request->file('image_3')){
                $file_3 = $request->file('image_3');
                $filename_3 = $product->id.'_3.'.$file_3->extension();
                $storedPath_3 = $file_3-> move(public_path('img/image-product'), $filename_3);
                ProductImages::create(array('id_product' => $product->id,'url'=> $filename_3));
            }



            $filename = $product->id.'.'.$file_main->extension();
            $storedPath   = $file_main-> move(public_path('img/image-product'), $filename);
            Product::where('id', $product->id)->update(['image' => $filename]);
            ProductInformation::create(array_merge($request->all(),['id_product' => $product->id]));
            $this->updateQuantityCategory($request->type, "CREATE");
            return  redirect('admin-product');
        }

    }

    public function delete(Request $request)
    {
        if($request->has('id')){
            $id = $request->input('id');
            $product = Product::where('id',$id)->first();
            $this->updateQuantityCategory($request->type, "DELETE");
            $product_images = ProductImages::where('id_product',$id)->get();
            //dd($product_images['1']);
            //dd($product->delete());
            if($product != null){
                $image_path_main = $product->get_url_image();

                if($product->delete()){

                    //xóa file ảnh phụ

                    foreach($product_images as $product_image){
                        $image_path = $product_image->get_url_image_by_image_name();
                        if(File::exists($image_path)) {
                            File::delete($image_path);
                            // dd($image_path);
                        }
                    }

                    // xóa file ảnh chính


                    if(File::exists($image_path_main)) {
                        File::delete($image_path_main);
                    }
                    return  redirect('admin-product')->with('success','Đã xóa thành công');
                }
                else{
                    return  redirect('admin-product')->with('failed','Đã xóa thất bại');
                }
            }

        }
    }


    public function edit(Request $request)
    {
        $categories = DB::table('product_category')->get();
        if($request->has('id')){
            $id = $request->input('id');
            $product = Product::find($id);
            $product_infor = ProductInformation::where('id_product',$id)->first();
            $product_images = ProductImages::where('id_product',$id)->get();
            return view('admin.product.product_edit', data:[
                'product' => $product,
                'categories' =>$categories,
                'product_infor' =>$product_infor,
                'product_images'=>$product_images
                ]);
        }
    }


    public function update(Request $request)
    {
        if($request->has('id')){
            $id = $request->input('id');
            if($request->file('image')){
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                    'image_1'  =>'mimes:jpeg,bmp,png',
                    'image_2'  =>'mimes:jpeg,bmp,png',
                    'image_3'  =>'mimes:jpeg,bmp,png',
                ]);
                $product = Product::where('id',$id)->update($request->all());

                $file_main= $request->file('image');

                if($request->file('image_1')){
                    $file_1 = $request->file('image_1');
                    $filename_1 = $product->id.'_1.'.$file_1->extension();
                    $storedPath_1 = $file_1-> move(public_path('img/image-product'), $filename_1);
                    ProductImages::create(array('id_product' => $product->id,'url'=> $filename_1));
                }

                if($request->file('image_2')){
                    $file_2 = $request->file('image_2');
                    $filename_2 = $product->id.'_2.'.$file_2->extension();
                    $storedPath_2 = $file_2-> move(public_path('img/image-product'), $filename_2);
                    ProductImages::create(array('id_product' => $product->id,'url'=> $filename_2));
                }

                if($request->file('image_3')){
                    $file_3 = $request->file('image_3');
                    $filename_3 = $product->id.'_3.'.$file_3->extension();
                    $storedPath_3 = $file_3-> move(public_path('img/image-product'), $filename_3);
                    ProductImages::create(array('id_product' => $product->id,'url'=> $filename_3));
                }



                $filename = $product->id.'.'.$file_main->extension();
                $storedPath   = $file_main-> move(public_path('img/image-product'), $filename);
                Product::where('id', $product->id)->update(['image' => $filename]);
                ProductInformation::create(array_merge($request->all(),['id_product' => $product->id]));

                return  redirect('admin-product');
            }
        }


    }
}
