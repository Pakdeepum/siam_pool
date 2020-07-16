<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProductMaster;
use App\ProductMaster;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Quotation;

class BackendProductController extends Controller
{
    public function index()
    {
        $allcategoryproduct = CategoryProductMaster::all()
            ->where('stdel',0);

        $allproduct = DB::table('product_master')
            ->leftJoin('category_product_master', 'product_master.id_category_product', '=', 'category_product_master.id_category_product')
            ->leftJoin('special','special.id', '=', 'product_master.promotion_id')
            ->leftJoin('brand_product_master','product_master.id_brand_product','=','brand_product_master.id_brand')
            ->where('product_master.stdel', '=', 0)
            ->paginate(8);
            //return response()->JSON(['allproduct' => $allproduct]);
          return view('BackendProduct.Backendproduct')->with( ['allcategoryproduct' => $allcategoryproduct , 'allproduct' => $allproduct] );
    }

    public function CategoryProduct($id)
    {
        $allcategoryproduct = CategoryProductMaster::all()
            ->where('stdel',0);
        $allproduct = DB::table('product_master')
            ->leftJoin('category_product_master', 'product_master.id_category_product', '=', 'category_product_master.id_category_product')
            ->leftJoin('special','special.id', '=', 'product_master.promotion_id')
            ->leftJoin('brand_product_master','product_master.id_brand_product','=','brand_product_master.id_brand')
            ->where('product_master.id_category_product', '=', $id)
            ->where('product_master.stdel', '=', 0)
            ->paginate(8);
        return view('BackendProduct.Backendproduct')->with( ['allcategoryproduct' => $allcategoryproduct , 'allproduct' => $allproduct] );
    }

    public function DeleteProduct($id)
    {
        ProductMaster::where('id_product',$id)->update(
            [
                'stdel'=>1,
            ]);
            return redirect()->back()->with('message', 'Delete Product Success');
    }

    public function EditProduct($id)
    {
        $EditProduct = ProductMaster::all()
            ->where('id_product',$id)
            ->where('stdel',0);
        return response()->JSON(['editproduct' => $EditProduct]);
    }

    private function uploadfile($file, $type, $id, $index){
      $showpath=null;
        if($type == "jpg" || $type == "jpeg" || $type == "png"){
            Storage::makeDirectory('storage/product/'.$id);
            if($type == "jpeg" || $type == "jpg"){
                $file->move('storage/product/'.$id, $index.'.jpg');
                $showpath =  $index.'.jpg';
            }
            if($type == "png"){
                $file->move('storage/product/'.$id, $index.'.png');
                $showpath = $index.'.png';
            }
        }
        ProductMaster::where('id_product',$id)->update(
        [
            'pic'.($index).'_url'=>$showpath,
        ]);
    }

    public function AddProduct(Request $request)
    {
        $id = Auth::user()->id;
        // ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ รูป
        ProductMaster::insert([
            'product_name'=>"Adding",
        ]);
        //อัพแต่ไฟส์ jpg png
        $HaveImages = 0 ;
        //Get ID with Count product type to name pic
        $new_id = (ProductMaster::all()->toArray())[count(ProductMaster::all()->toArray()) - 1]['id_product'];
         $showpath = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('file1')) {
            $file = $request->file('file1');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,1);
        }
        if ($request->hasFile('file2')) {
            $file = $request->file('file2');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,2);
        }
        if ($request->hasFile('file3')) {
            $file = $request->file('file3');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,3);
        }
        if ($request->hasFile('file4')) {
            $file = $request->file('file4');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,4);
        }
        if ($request->hasFile('file5')) {
            $file = $request->file('file5');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,5);
        }
        ProductMaster::where('id_product',$new_id)->update(
        [
            'product_name'=>$request['productname'],
            'id_category_product'=>$request['idproducttype'],
            'id_brand_product'=>$request['idBrandProduct'],
            'price'=>$request['productprice'],
            'product_code'=>$request['productcode'],
            'id_user'=>$id,
            'product_detail'=>$request['product_detail'],
            'product_instruction'=>$request['product_instruction'],
            'product_warning'=>$request['product_warning'],
            'promotion_id'=>$request['promotion'],
            'stock_amount'=>$request['stock_amount'],
        ]);
        return redirect()->back()->with('message', 'Add Product Success');
    }

    public function SaveEditProduct(Request $request)
    {
        $id = Auth::user()->id;
        //อัพแต่ไฟส์ jpg png
        $HaveImages = 0 ;
        //Get ID with Count product type to name pic
        $new_id = $request['idsaveedit'];
        $showpath = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('file_e1')) {
            $file = $request->file('file_e1');
            $HaveImages = 1 ;
            Storage::delete('storage/product/'.$new_id.'/'.'1.jpg'); //ลบรูปเก่า
            Storage::delete('storage/product/'.$new_id.'/'.'1.png'); //ลบรูปเก่า
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,1);
        }
        if ($request->hasFile('file_e2')) {
            $file = $request->file('file_e2');
            $HaveImages = 1 ;
            Storage::delete('storage/product/'.$new_id.'/'.'2.jpg'); //ลบรูปเก่า
            Storage::delete('storage/product/'.$new_id.'/'.'2.png'); //ลบรูปเก่า
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,2);
        }
        if ($request->hasFile('file_e3')) {
            $file = $request->file('file_e3');
            $HaveImages = 1 ;
            Storage::delete('storage/product/'.$new_id.'/'.'3.jpg'); //ลบรูปเก่า
            Storage::delete('storage/product/'.$new_id.'/'.'3.png'); //ลบรูปเก่า
            $type = $file->getClientOriginalExtension();
            $this->uploadfile($file,$type,$new_id,3);
        }
        if ($request->hasFile('file_e4')) {
            $file = $request->file('file_e4');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            Storage::delete('storage/product/'.$new_id.'/'.'4.jpg'); //ลบรูปเก่า
            Storage::delete('storage/product/'.$new_id.'/'.'4.png'); //ลบรูปเก่า
            $this->uploadfile($file,$type,$new_id,4);
        }
        if ($request->hasFile('file_e5')) {
            $file = $request->file('file_e5');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
            Storage::delete('storage/product/'.$new_id.'/'.'5.jpg'); //ลบรูปเก่า
            Storage::delete('storage/product/'.$new_id.'/'.'5.png'); //ลบรูปเก่า
            $this->uploadfile($file,$type,$new_id,5);
        }
        ProductMaster::where('id_product',$new_id)->update(
            [
                'product_name'=>$request['productname'],
                'id_category_product'=>$request['idproducttype'],
                'id_brand_product'=>$request['idBrandProduct'],
                'price'=>$request['productprice'],
                'product_code'=>$request['productcode'],
                'id_user'=>$id,
                'product_detail'=>$request['product_detail'],
                'product_instruction'=>$request['product_instruction'],
                'product_warning'=>$request['product_warning'],
                'promotion_id'=>$request['promotion_edit'],
                'stock_amount'=>$request['stock_amount'],
            ]);

        return redirect()->back()->with('message', 'Edit Product Success');
    }
}
