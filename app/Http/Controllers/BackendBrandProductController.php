<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\BrandProductMaster;
use DB;
use Illuminate\Support\Facades\Storage;

class BackendBrandProductController extends Controller
{
    //
    public function index()
    {
      $allBrandproduct = DB::table('brand_product_master')->where('stdel',0)->paginate(5);
        //return response()->JSON(['$allBrandproduct' => $allBrandproduct]);
      return view('BackendBrandProduct.Backendbrandproduct')
      ->with( ['allBrandproduct' => $allBrandproduct] );

    }
    public function ListBrandAll(){
      $allBrandproduct = DB::table('brand_product_master')->where('stdel',0)->get()->toArray();
        return response()->JSON(['data' => $allBrandproduct]);
    }
    public function ListBrandSelect()
    {
        $brandProduct = BrandProductMaster::all()->where('stdel',0);
        return response()->JSON($brandProduct);
    }
    public function DeleteBrand($id)
    {
        BrandProductMaster::where('id_brand',$id)->update([
            'stdel'=>1,
        ]);
        return redirect()->back()->with('message', 'Delete Brand Success');
    }
    public function AddBrand(Request $request)
    {
        /* ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ รูป */
        BrandProductMaster::insert([
            'brand_name'=>"Adding",
        ]);

        /*อัพแต่ไฟส์ jpg png */
        $HaveImages = 0 ;
        $new_id = (BrandProductMaster::all()->toArray())[count(BrandProductMaster::all()->toArray()) - 1]['id_brand']; //Get ID with Count product type to name pic
        $showpath = null ;
        /*ถ้าไม่ iput รูปก็ไม่ทำ*/
        if($request->hasFile('file1')){
            $HaveImages = 1 ;

            $file = $request->file('file1');
            $type = $file->getClientOriginalExtension();
                if($type == "jpg" || $type == "jpeg" || $type == "png"){
                    if($type == "jpeg" || $type == "jpg"){
                        Storage::makeDirectory('storage/brandProduct/'.$new_id);
                        $file->move('storage/brandProduct/'.$new_id, '1.jpg');
                        $showpath = '1.jpg';
                    }
                    if($type == "png"){
                        Storage::makeDirectory('storage/brandProduct/'.$new_id);
                        $file->move('storage/brandProduct/'.$new_id, '1.png');
                        $showpath = '1.png';
                    }
                }
                BrandProductMaster::where('id_brand',$new_id)->update([
                    'brand_pic_url'=>$showpath,
                ]);
            }
            BrandProductMaster::where('id_brand',$new_id)->update([
                'brand_name'=>$request['brandname'],
            ]);
        return redirect()->back()->with('message', 'Add Brand Success');
    }
    public function EditBrand($id)
    {
        $EditBrand = BrandProductMaster::all()
            ->where('id_brand',$id)
            ->where('stdel',0);
        return response()->JSON(['editbrand' => $EditBrand]);
    }
    /**
     * หน้าแก้ไขหมวดหมู่สินค้า
     */
    public function SaveEditBrand(Request $request)
    {
        //อัพแต่ไฟส์ jpg png
        $HaveImages = 0 ;
        //Get ID with Count product type to name pic
        $new_id = $request['idsaveedit'];
        $showpath = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if($request->hasFile('file_e')){
            $HaveImages = 1 ;
            Storage::delete('storage/brandProduct/'.$new_id.'/'.'1.jpg'); //ลบรูปเก่า
            Storage::delete('storage/brandProduct/'.$new_id.'/'.'1.png'); //ลบรูปเก่า
            $file = $request->file('file_e');
            $type = $file->getClientOriginalExtension();
            if($type == "jpg" || $type == "jpeg" || $type == "png"){
                if($type == "jpeg" || $type == "jpg"){
                    Storage::makeDirectory('storage/brandProduct/'.$new_id);
                    $file->move('storage/brandProduct/'.$new_id, '1.jpg');
                    $showpath = '1.jpg';
                }
                if($type == "png"){
                    Storage::makeDirectory('storage/brandProduct/'.$new_id);
                    $file->move('storage/brandProduct/'.$new_id, '1.png');
                    $showpath = '1.png';
                }
            }
            BrandProductMaster::where('id_brand',$new_id)->update([
                'brand_pic_url'=>$showpath,
            ]);
        }
        BrandProductMaster::where('id_brand',$new_id)->update([
            'brand_name'=>$request['brandname'],
        ]);
        return redirect()->back()->with('message', 'Edit Brand Success');
    }
}
