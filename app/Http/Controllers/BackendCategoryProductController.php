<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\CategoryProductMaster;
use Illuminate\Support\Facades\Storage;
use DB;

class BackendCategoryProductController extends Controller
{
    /**
     * หน้าเริ่มต้นหมวดหมู่สินค้า
     */
    public function index()
    {
        $allcategoryproduct = DB::table('category_product_master')->where('stdel',0)->paginate(5); 
        return view('BackendCategoryProduct.Backendcategoryproduct')
        ->with( ['allcategoryproduct' => $allcategoryproduct] );
    }

    /**
     * method เพิ่มหมวดหมู่สินค้า
     */
    public function AddCategory(Request $request)
    {
        /* ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ รูป */
        CategoryProductMaster::insert([
            'category_product_name'=>"Adding",
        ]);

        /*อัพแต่ไฟส์ jpg png */
        $HaveImages = 0 ;
        $new_id = (CategoryProductMaster::all()->toArray())[count(CategoryProductMaster::all()->toArray()) - 1]['id_category_product']; //Get ID with Count product type to name pic
        $showpath = null ;
        /*ถ้าไม่ iput รูปก็ไม่ทำ*/
        if($request->hasFile('file1')){ 
            $HaveImages = 1 ;

            $file = $request->file('file1');
            $type = $file->getClientOriginalExtension();
                if($type == "jpg" || $type == "jpeg" || $type == "png"){  
                    if($type == "jpeg" || $type == "jpg"){
                        Storage::makeDirectory('storage/categoryProduct/'.$new_id);
                        $file->move('storage/categoryProduct/'.$new_id, '1.jpg');
                        $showpath = '1.jpg';
                    }
                    if($type == "png"){
                        Storage::makeDirectory('storage/categoryProduct/'.$new_id);
                        $file->move('storage/categoryProduct/'.$new_id, '1.png');
                        $showpath = '1.png';
                    }                
                }
                CategoryProductMaster::where('id_category_product',$new_id)->update([
                    'pic_url'=>$showpath,  
                ]);  
            }
            CategoryProductMaster::where('id_category_product',$new_id)->update([
                'category_product_name'=>$request['categoryname'],
                'category_product_detail'=>$request['categorydetail'],  
            ]);  
        return redirect()->back()->with('message', 'Add Category Success');
    }

    public function ListProductType()
    {
        $Categoryproduct = CategoryProductMaster::all()->where('stdel',0);
        return response()->JSON($Categoryproduct);
    }
    
    public function DeleteCategory($id)
    {
        CategoryProductMaster::where('id_category_product',$id)->update([
            'stdel'=>1,
        ]);  
        return redirect()->back()->with('message', 'Delete Category Success');
    }

    public function EditCategory($id)
    {
        $EditCategory = CategoryProductMaster::all()
            ->where('id_category_product',$id)
            ->where('stdel',0);
        return response()->JSON(['editcategory' => $EditCategory]);
    }
    /**
     * หน้าแก้ไขหมวดหมู่สินค้า 
     */
    public function SaveEditCategory(Request $request)
    {
        //อัพแต่ไฟส์ jpg png 
        $HaveImages = 0 ;
        //Get ID with Count product type to name pic
        $new_id = $request['idsaveedit']; 
        $showpath = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if($request->hasFile('file_e')){ 
            $HaveImages = 1 ;
            Storage::delete('storage/categoryProduct/'.$new_id.'/'.'1.jpg'); //ลบรูปเก่า
            Storage::delete('storage/categoryProduct/'.$new_id.'/'.'1.png'); //ลบรูปเก่า
            $file = $request->file('file_e');
            $type = $file->getClientOriginalExtension();
            if($type == "jpg" || $type == "jpeg" || $type == "png"){  
                if($type == "jpeg" || $type == "jpg"){
                    Storage::makeDirectory('storage/categoryProduct/'.$new_id);
                    $file->move('storage/categoryProduct/'.$new_id, '1.jpg');
                    $showpath = '1.jpg';
                }
                if($type == "png"){
                    Storage::makeDirectory('storage/categoryProduct/'.$new_id);
                    $file->move('storage/categoryProduct/'.$new_id, '1.png');
                    $showpath = '1.png';
                } 
            }
            CategoryProductMaster::where('id_category_product',$new_id)->update([
                'pic_url'=>$showpath,  
            ]);  
        }
        CategoryProductMaster::where('id_category_product',$new_id)->update([
            'category_product_name'=>$request['categoryname'],
            'category_product_detail'=>$request['categorydetail'],  
        ]);  
        return redirect()->back()->with('message', 'Edit Category Success');
    }
}
