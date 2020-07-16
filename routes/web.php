<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::group(['middleware' => ['admin']], function(){
    Route::get('/', function () {
        return view('Home.home');
    });
// });
Route::get('setlocale/{locale}', function ($locale) {
//  if (in_array($locale, \Config::get('app.locales'))) {
    session(['locale' => $locale]);
  //}
  return redirect()->back();
});
    Route::prefix('/home')->group(function () {
        Route::get('/ListHomeCarouselMain','DashboardController@ListHomeCarouselMain');
        Route::get('/ListAbout','DashboardController@ListAbout');
        Route::get('/ListPromotion','DashboardController@ListPromotion');
        Route::get('/ListCategoryProduct','DashboardController@ListCategoryProduct');
        Route::get('/Listmemu','DashboardController@Listmemu');
        Route::get('/Dealer','DashboardController@Dealer');
        Route::get('/FAQ','DashboardController@FAQ');
    });



/**product*/
Route::prefix('/showproduct')->group(function(){
    Route::get('/','ShowProductController@index');
});

/**notification */
Route::get('/notification', 'MailController@htmlmail');
Route::post('/contactemail','MailController@contactMail');
Route::get('/getInformation/{id}', 'MailController@getInformation');
Route::prefix('/product')->group(function () {
    // ProductController
    Route::get('', 'ProductController@index');
    Route::get('/ListProduct','ProductController@ListProduct');
    Route::get('/ListProducts','ProductController@ListProducts');
    Route::get('/ListProductByCategoryProduct/{id_category_product}','ProductController@ListProductByCategoryProduct');
    Route::get('/ListProductByCategoryProducts','ProductController@ListProductByCategoryProducts');
    Route::get('/SelectProductByCategoryProductOnDashboarde','ProductController@SelectProductByCategoryProductOnDashboarde')->name('product.SelectProductByCategoryProductOnDashboarde');
    //ProductDetailsController
    Route::get('/ListProductDetail','ProductDetailsController@ListProductDetail')->name('product.ListProductDetail');
    Route::get('/getProduct', 'ProductController@getProduct');
    Route::get('/TopSeller', 'ProductController@TopSeller');
    Route::get('/NewArival', 'ProductController@NewArival');
    Route::get('/FilterCategory/{id}', 'ProductController@FilterCategory');
});

Route::prefix('/categoryproduct')->group(function () {
    Route::get('/ListCategoryProduct','CategoryProductController@ListCategoryProduct');
    Route::get('/GetCategoryById/{id}','CategoryProductController@GetCategoryById');
});

Route::prefix('/promotion')->group(function () {
    //PromotionController
    Route::get('', 'PromotionController@index');
    Route::get('/ListPromotion','PromotionController@ListPromotion');
    Route::get('/ListPromotionByCategoryPromotion/{id_category_promotion}','PromotionController@ListPromotionByCategoryPromotion');
    //PromotionDetailsController
    Route::get('/ListPromotionDetail','PromotionDetailsController@ListPromotionDetail')->name('promotion.ListPromotionDetail');
});

Route::prefix('/categorypromotion')->group(function () {
    Route::get('/ListCategoryPromotion','CategoryPromotionController@ListCategoryPromotion');
});

Route::prefix('/reviews')->group(function () {
    Route::get('', 'ReviewsController@index');
    Route::get('/ListReviews','ReviewsController@ListReviews');
    Route::get('/ListAboutProduct','ReviewsController@ListAboutProduct');
    //ProductDetailsController
    Route::get('/ListReviewDetail','ReviewDetailsController@ListReviewDetail')->name('reviews.ListReviewDetail');
});

Route::prefix('/about')->group(function () {
    Route::get('', 'AboutController@index');
    Route::get('/ListAbout','AboutController@ListAbout');
});

Route::prefix('/contactUs')->group(function () {
    Route::get('', 'ContactUsController@index');
    Route::get('/ListContactUs','ContactUsController@ListContactUs');
});

Route::prefix('/v1')->group(function(){
    Route::post('/signup','SignupController@created')->name('created');
    Route::get('/conutry-code','SignupController@getConutryCode');
    Route::post('/signin','SigninController@postLogin');
    Route::post('/signinAdmin','SigninController@signinAdmin');
    Route::post('/forgotpwd','MailController@resetPassword');
    Route::get('/getSignupProvince','SignupController@getProvince');
    Route::get('/getSignupAmphur','SignupController@getAumphar');
    Route::get('/getSignupDistict','SignupController@getDistict');
    Route::get('/getSignupPostCode','SignupController@getPostCode');
});
Route::prefix('/Video')->group(function(){
  Route::get('/ListVideoSelect','VideoSettingController@ListVideoSelect');
});
Route::prefix('/Brand')->group(function(){
  Route::get('/AllBrandList', 'BackendBrandProductController@ListBrandAll');
  });
Auth::routes();
/**sign in */
Route::group(['middleware' => 'signin'], function () {
    Route::prefix('/v1')->group(function(){
        Route::get('/profile','ProfileController@index')->name('profile');
        Route::get('/getProvince','ProfileController@getProvince');
        Route::get('/getAumphar','ProfileController@getAumphar');
        Route::get('/getDistict','ProfileController@getDistict');
        Route::get('/getPostCode','ProfileController@getPostCode');
        Route::put('/updateProfile','ProfileController@updateProfile');
    });

    /**adrress*/
    Route::prefix('/v1')->group(function(){
        Route::get('/address','AddressController@index')->name('address');
        Route::get('/getAddress','AddressController@getAddress');
    });

    /**product info*/
    Route::prefix('/v1')->group(function(){
        Route::get('/productinfo','ProductInfoController@index')->name('productinfo');
        Route::get('/listDelivery','BackendDeliveryController@viewed')->name('deliveryList');
        Route::post('/updateOrder','ProductInfoController@updateOrder');
        Route::post('/emailOrder','MailController@orderMail');
        //Route::get('/key','ProductInfoController@gennerateKey');
    });

    Route::prefix('/v1')->group(function(){
        /*  acceptpayment  */
        Route::get('/acceptPayment','AcceptPaymentController@index');
    });
    /**view payment silp */
    Route::prefix('/v1')->group(function(){
        Route::get('/payment/{id}','PaymentController@index')->name('payment');
        Route::get('/payment/old/{id}','PaymentController@paymentOld')->name('paymentOld');
        Route::get('/order','PaymentController@getOrder')->name('getOrder');
        Route::post('/order','PaymentController@updateOrder')->name('updateOrder');
        Route::get('/myOrder/{id}','MyOrderController@index')->name('myOrder');
        Route::get('/getOrderById/{id}','MyOrderController@getOrderById')->name('getOrderById');
    });        


});
//Back End
Route::group(['middleware' => 'auth'], function () {

    /**backend payment silp */
    Route::prefix('/v1')->group(function(){
        Route::get('/','BackendBankInfoController@index');
        Route::get('/getBankInfo','BackendBankInfoController@getBankInfo')->name('getBankInfo');
        Route::get('/bankInfo','BackendBankInfoController@views')->name('views');
        Route::post('/bankInfo','BackendBankInfoController@created')->name('create');
        Route::put('/bankInfo','BackendBankInfoController@updated')->name('update');
        Route::delete('/bankInfo','BackendBankInfoController@deleted')->name('delete');
    });
    /*  acceptpayment  */
    Route::prefix('/v1/handle')->group(function(){
        Route::get('/delivery','BackendDeliveryController@index');
        Route::get('/delivery/view','BackendDeliveryController@viewed');
        Route::delete('/delivery','BackendDeliveryController@deleted');
        Route::post('/delivery','BackendDeliveryController@created');
        Route::post('/useDelivery','BackendDeliveryController@updated');
    });

    Route::prefix('/v1/handle')->group(function(){
        Route::get('/','BackendSilpController@index');
        Route::get('/silp','BackendSilpController@view')->name('view');
        Route::delete('/silp','BackendSilpController@deleted')->name('delete');
        Route::get('/restore','BackendSilpController@restored')->name('restore');

        Route::get('/approved','BackendSilpController@approved')->name('approved');
        Route::get('/subView','BackendSilpController@subView')->name('subView');
        Route::get('/trackCode','BackendSilpController@trackCode')->name('trackCode');
        Route::post('/trackMail', 'MailController@trackMail');

        Route::get('/user','BackendUserController@index')->name('index');
        Route::get('/getUser','BackendUserController@getUser')->name('getUser');
        Route::delete('/user','BackendUserController@userDelete')->name('userDelete');
    });

    Route::prefix('/BackendContactUs')->group(function () {
        Route::get('', 'BackendContactUsController@index');
        Route::get('/ListContactUs','BackendContactUsController@ListContactUs');
        Route::get('/SaveEditContactUs','BackendContactUsController@SaveEditContactUs')->name('BackendContactUs.SaveEditContactUs');
    });

    Route::prefix('/BackendAbout')->group(function () {
        Route::get('', 'BackendAboutController@index');
        Route::post('/SaveEditAbout','BackendAboutController@SaveEditAbout')->name('BackendAbout.SaveEditAbout');
    });

    Route::prefix('/BackendReview')->group(function () {
        Route::get('', 'BackendReviewController@index');
        Route::get('/ListReviews','BackendReviewController@ListReviews');
        Route::get('/DeleteReview','BackendReviewController@DeleteReview')->name('BackendReview.DeleteReview');
        Route::post('/SaveReview','BackendReviewController@SaveReview')->name('BackendReview.SaveReview');
        Route::get('/ListAboutProduct','BackendReviewController@ListAboutProduct');
        Route::get('/EditReview/{id}', 'BackendReviewController@EditReview');
        Route::post('/SaveEditReview', 'BackendReviewController@SaveEditReview')->name('BackendReview.SaveEditReview');
    });

    Route::prefix('/BackendProduct')->group(function () {
        Route::get('', 'BackendProductController@index')->name('BackendProduct');
        Route::get('/CategoryProduct/{id}', 'BackendProductController@CategoryProduct')->name('BackendProduct.CategoryProduct');
        Route::get('/DeleteProduct/{id}', 'BackendProductController@DeleteProduct')->name('BackendProduct.DeleteProduct');
        Route::get('/EditProduct/{id}', 'BackendProductController@EditProduct')->name('BackendProduct.EditProduct');
        Route::post('/SaveEditProduct', 'BackendProductController@SaveEditProduct')->name('BackendProduct.SaveEditProduct');
        Route::post('/AddProduct', 'BackendProductController@AddProduct')->name('BackendProduct.AddProduct');
    });


    Route::prefix('/BackendCategoryProduct')->group(function () {
        Route::get('', 'BackendCategoryProductController@index');
        Route::get('/ListProductType', 'BackendCategoryProductController@ListProductType')->name('BackendProduct.ListProductType');
        Route::post('/AddCategory', 'BackendCategoryProductController@AddCategory')->name('BackendCategoryProduct.AddCategory');
        Route::get('/EditCategory/{id}', 'BackendCategoryProductController@EditCategory')->name('BackendCategoryProduct.EditCategory');
        Route::post('/SaveEditCategory', 'BackendCategoryProductController@SaveEditCategory')->name('BackendCategoryProduct.SaveEditCategory');
        Route::get('/DeleteCategory/{id}', 'BackendCategoryProductController@DeleteCategory')->name('BackendCategoryProduct.DeleteCategory');
    });
    Route::prefix('/BackendBrandProduct')->group(function () {
      Route::get('', 'BackendBrandProductController@index');
      Route::get('/AllBrandList', 'BackendBrandProductController@ListBrandAll');
      Route::get('/ListBrandSelect','BackendBrandProductController@ListBrandSelect');
      Route::get('/DeleteBrand/{id}','BackendBrandProductController@DeleteBrand');
      Route::post('/AddBrand', 'BackendBrandProductController@AddBrand')->name('BackendBrandProduct.AddBrand');
      Route::get('/EditBrand/{id}', 'BackendBrandProductController@EditBrand')->name('BackendBrandProduct.EditBrand');
      Route::post('/SaveEditBrand', 'BackendBrandProductController@SaveEditBrand')->name('BackendBrandProduct.SaveEditBrand');
    });
    Route::prefix('/VideoSetting')->group(function () {
      Route::get('', 'VideoSettingController@index');
      Route::get('/AllVideoList', 'VideoSettingController@ListVideoAll');
      Route::get('/DeleteVideo/{id}','VideoSettingController@DeleteVideo');
      Route::post('/AddVideo', 'VideoSettingController@AddVideo')->name('VideoSetting.AddVideo');
      Route::get('/EditVideo/{id}', 'VideoSettingController@EditVideo')->name('VideoSetting.EditVideo');
      Route::post('/SaveEditVideo', 'VideoSettingController@SaveEditVideo')->name('VideoSetting.SaveEditVideo');
      Route::patch('/VideoStatus/update', 'VideoSettingController@VideoStatusUpdate');
    });

    Route::prefix('/BackendPromotion')->group(function () {
        Route::get('', 'BackendPromotionController@index');
        Route::get('ListPromotion', 'BackendPromotionController@ListPromotion');
        Route::get('/EditPromotion/{id}', 'BackendPromotionController@EditPromotion');
        Route::get('/DeletePromotion/{id}', 'BackendPromotionController@DeletePromotion');
        Route::post('/SaveEditPromotion', 'BackendPromotionController@SaveEditPromotion')->name('BackendPromotion.SaveEditPromotion');
        Route::post('/AddPromotion', 'BackendPromotionController@AddPromotion')->name('BackendPromotion.AddPromotion');
        Route::get('ListCategoryPromotion', 'BackendPromotionController@ListCategoryPromotion');
        Route::get('/SelectPromotionByCategoryPromotion/{id}', 'BackendPromotionController@SelectPromotionByCategoryPromotion');

    });

    Route::prefix('/BackendCategoryPromotion')->group(function () {
        Route::get('', 'BackendCategoryPromotionController@index');
        Route::get('ListCategoryPromotion', 'BackendCategoryPromotionController@ListCategoryPromotion');
        Route::get('/EditCategoryPromotion/{id}', 'BackendCategoryPromotionController@EditCategoryPromotion');
        Route::get('/DeleteCategoryPromotion/{id}', 'BackendCategoryPromotionController@DeleteCategoryPromotion');
        Route::get('/SaveEditCategoryPromotion', 'BackendCategoryPromotionController@SaveEditCategoryPromotion')->name('BackendCategoryPromotion.SaveEditCategoryPromotion');
        Route::get('/AddCategoryPromotion', 'BackendCategoryPromotionController@AddCategoryPromotion')->name('BackendCategoryPromotion.AddCategoryPromotion');
    });

    Route::prefix('/BackendCategoryProduct')->group(function () {
        Route::get('', 'BackendCategoryProductController@index');
        Route::get('/ListProductType', 'BackendCategoryProductController@ListProductType')->name('BackendProduct.ListProductType');
        Route::post('/AddCategory', 'BackendCategoryProductController@AddCategory')->name('BackendCategoryProduct.AddCategory');
        Route::get('/DeleteCategory/{id}', 'BackendCategoryProductController@DeleteCategory')->name('BackendCategoryProduct.DeleteCategory');
    });

    Route::prefix('/BackendBanner')->group(function () {
        Route::get('', 'BackendBannerController@index');
        Route::get('/ListCarousal', 'BackendBannerController@ListCarousal');
        Route::get('/SelectCarousal/{id}', 'BackendBannerController@SelectCarousal');
        Route::get('/DeleteCarousal/{id}', 'BackendBannerController@DeleteCarousal');
        Route::post('/StoreBanner', 'BackendBannerController@StoreBanner');
        Route::post('/EditBanner', 'BackendBannerController@EditBanner');
    });

    Route::prefix('/BackendSpecial')->group(function () {
        Route::get('', 'BackendSpecialController@index');
        Route::get('/promotion', 'BackendSpecialController@view');
        Route::post('/promotion', 'BackendSpecialController@created');
        Route::delete('/promotion', 'BackendSpecialController@deleted');
        Route::put('/promotion', 'BackendSpecialController@updated');
    });
});
//Elements
Route::prefix('/elements')->group(function () {
    Route::get('Listmemu', 'ElementsController@Listmemu');
    Route::get('/ListContactUs','ElementsController@ListContactUs');
});

Route::group(['middleware' => ['admin']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
