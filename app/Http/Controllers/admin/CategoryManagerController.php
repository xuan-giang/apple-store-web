<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryManagerController
{
    function index()
    {
        $categories = Category::query()->get();


        return view('admin.category.category',data:[
            'categories' => $categories
        ]);
    }



    public function create()
    {

        return view('admin.category.category_add');
    }


    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return  redirect('admin-category');
    }

    public function delete(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->input('id');
            $category = Category::where('id', $id)->first();


            if ($category != null) {

                if ($category->quantity > 0) {
                    echo '<script language="javascript">';
                    echo 'alert(Không thể xoá do danh mục này tồn tại sản phẩm)';
                    echo '</script>';
                    return redirect('admin-category')->with('failed', 'Không thể xoá do danh mục này tồn tại sản phẩm');

                } else {
                    $category->delete();
                    return redirect('admin-category')->with('success', 'Đã xóa thành công');
                }
            }

        }
    }

    public function edit(Request $request)
    {
        if($request->has('id')){
            $id = $request->input('id');
            $category = Category::find($id);

            return view('admin.category.category_edit', data:[
                'category' => $category
            ]);
        }
    }


    public function update(Request $request)
    {
        if($request->has('id')) {
            $id = $request->input('id');
            $data = Category::find($id);
            $data->name = $request->name;
            $data->save();

            return redirect('admin-category');
        }
    }

}
