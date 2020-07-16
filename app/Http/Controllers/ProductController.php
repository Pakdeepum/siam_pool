<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductMaster;
use App\CategoryProductMaster;
use App\Order;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        return view('Product.product')->render();
        // $id= 2;
        // $name = 'Pumps';
        //   return view('Product.product')->with('filter',['id'=>2,'cate_name'=>$name]);
          //return view('Product.product',compact('id','name'));

    }
    public function FilterCategory($id)
    {
      return view('Product.product')->with('filter',['id'=>$id]);
    }

    public function ListProduct()
    {
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function ListProducts()
    {
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->orderBy('id_product','DESC')->limit(4)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }


    public function ListProductByCategoryProduct(int $id_category_product)
    {
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->where('id_category_product',$id_category_product)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectProductByCategoryProductOnDashboarde(Request $request)
    {
        return view('Product.product')->with('data',$request['id_category_product']);
    }

    public function ListProductByCategoryProducts(Request $request)
    {   $id = (int)$request->input('category');
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->where('id_category_product',$id)
        ->orderBy('product_master.id_product','DESC')->limit(4)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function getProduct(Request $request){
        $result = CategoryProductMaster::with(['products'=> function($q){
            $q->with('special')->where('stdel',0);
        }])->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function TopSeller(){
      try{
         // $result = Order::select('*')->with('products')
         // ->groupBy('product_id')
         // ->orderByRaw('SUM(product_amount) DESC')
         // ->get()->toArray();
        $result = DB::table("order")->selectRaw("product_master.*,sum(`product_amount`) as SellAmount")
        ->leftJoin("product_master","product_master.id_product","=","order.product_id")
        ->where("status",2)//status = approved
        ->where("product_master.stdel",0)
        ->groupBy("product_id")
        ->orderByRaw('SUM(product_amount) DESC')
        ->limit(5)
        ->get()->toArray();
         return response()->json($result);
      }catch(Exception $e){

      }
    }
    public function NewArival(){
      $result = ProductMaster::select('*')
      ->orderBy('id_product','DESC')
      ->limit(10)
      ->get()->toArray();
      return response()->json($result);
    }
}
