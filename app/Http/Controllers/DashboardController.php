<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use File;

use App\HomeCarouselMainMaster;
use App\AboutMaster;
use App\PromotionMaster;
use App\CategoryProductMaster;
use App\MenuMaster;


class DashboardController extends Controller
{
    public function ListHomeCarouselMain()
    {
        $carousal = DB::select('select * from carousel Order by created_at DESC limit 1');
        return json_encode(array('data'=>$carousal),JSON_UNESCAPED_UNICODE);
    }

    public function ListAbout()
    {
        $allabout = AboutMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allabout),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function ListPromotion()
    {
        $allpromotion = PromotionMaster::select('*')->orderBy('id_promotion', 'DESC')->where('stdel',0)->take(3)->get()->toArray();
        $data = json_encode(array('data'=>$allpromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function ListCategoryProduct()
    {
        $allcategoryproduct = CategoryProductMaster::select('*')->where('stdel',0)->inRandomOrder()->get()->toArray();
        $data = json_encode(array('data'=>$allcategoryproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function Listmemu()
    {
        $allmemu = MenuMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allmemu),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function Dealer(){
      return view('Dealer.dealer');
    }
    public function FAQ(){
      return view('FAQ.faq');
    }
}
