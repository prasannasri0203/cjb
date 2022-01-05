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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Featured_video;
use App\Categories;
use App\Banner;  
Route::get('/', function () {
    return view('index');
});

Route::get('/check', function () {
    return view('index');
});

Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//Twitter
Route::get('twitter', function () {
    return view('twitterAuth');
});
Route::get('auth/twitter', 'Auth\TwitterController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleTwitterCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
|--------------------------------------------------------------------------
| Portal user routes start
|--------------------------------------------------------------------------
*/

/* multilanguge */

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// User Management
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/login', function () { return view('auth/login'); })->name('login');
    Route::any('/login', 'Auth\LoginController@login')->name('admin.login');
    
    // Auth::routes();
    // Dashboard
    Route::group(['middleware'=> ['auth','checkadmin']], function()
    {
        Route::resource('roles','Portal\RoleController');
        //Route::get('roles/roles-datatable','Portal\RoleController@roles_datatable')->name('roles.datatable');

        Route::resource('users','Portal\UserController');
        //Route::get('users','Portal\UserController');

        Route::post('users/update','Portal\UserController@update')->name('user.update');
        Route::post('roles/update','Portal\RoleController@update')->name('role.update');
        Route::any('roles/delete','Portal\RoleController@destroy')->name('role.delete');
        Route::any('users/delete','Portal\UserController@destroy')->name('user.delete');
        Route::post('roles/create','Portal\RoleController@create')->name('role.create');
        Route::get('/role_edit/{id}', 'Portal\RoleController@edit')->name('role_edit');
        Route::get('/user_edit/{id}', 'Portal\UserController@edit')->name('user_edit');
        Route::get('/role_list', 'Portal\RoleController@getData')->name('role.getData');
        Route::get('/image_delete', 'Portal\UserController@imageDelete')->name('image_delete');

        // Route::get('/roles/list', 'Portal\RoleController@index')->name('rolesindex');
        Route::get('/index', 'Portal\UserController@index')->name('userindex');

        // Route::get('roles_datatable', 'Portal\RoleController@roles_datatable')->name('roles_datatable');
        Route::get('profile/{id}/edit', 'Portal\UserController@profileEdit')->name('profile.edit');
        Route::post('profile/update', 'Portal\UserController@profileUpdate')->name('profile.update');

        //Featured Videos
        Route::resource('videos', 'Portal\FeaturedVideosController');

        //Preset Collection
        Route::resource('collection', 'Portal\CollectionController');
        Route::post('collections/update','Portal\CollectionController@update')->name('collection.update');
        Route::any('collections/delete','Portal\CollectionController@destroy')->name('collection.delete');
        Route::get('collections/list','Portal\CollectionController@index')->name('collectioninlist');
        Route::get('/collection_edit/{id}', 'Portal\CollectionController@edit')->name('collection_edit');

        Route::get('/', 'Portal\AdminHomeController@index');
        Route::get('/supplier', 'Portal\AdminHomeController@supplier')->name('suppliercreate');
        Route::get('/supplier_list', 'Portal\AdminHomeController@supplier_list')->name('supplier.list');
        Route::post('/supplier_create', 'Portal\SupplierController@supplier_create')->name('postSupplierSave');
        Route::post('/supplier_update', 'Portal\SupplierController@supplier_update')->name('postSupplierUpdate');
        Route::get('/supplier_edit', 'Portal\SupplierController@supplier_edit')->name('supplier_edit');
        Route::get('/supplier_edit/{id}', 'Portal\SupplierController@supplier_edit')->name('supplier_edit');
        Route::get('/supplier_datatable', 'Portal\SupplierController@supplier_datatable')->name('supplier_datatable');
        Route::get('/supplier_datatable_status/{id}', 'Portal\SupplierController@supplier_datatable_delete')->name('supplier_deletable');
        Route::any('supplier/delete','Portal\SupplierController@destroy')->name('supplier.delete');

        Route::any('/categories', 'Portal\AdminHomeController@categories_create')->name('categories');
        // color
        Route::any('/colors', 'Portal\AdminHomeController@colorView')->name('colors');
        Route::any('/colors_datatable', 'Portal\CategoriesController@colors_datatable')->name('colors_datatable');

        //autopopulate
        Route::any('/autocomplete', 'Portal\CategoriesController@autoComplete')->name('autocomplete');
        Route::any('/categories_create', 'Portal\CategoriesController@categories_create')->name('categoriesSave');
        Route::any('/categories_datatable', 'Portal\CategoriesController@categories_datatable')->name('categories_datatable');
        Route::any('/category_datatable_status/{id}', 'Portal\CategoriesController@category_datatable_status')->name('category_delete');
        Route::any('/cupdate', 'Portal\CategoriesController@categories_update')->name('categories_update');
        Route::any('autocomplete', 'Portal\CategoriesController@search')->name('autocomplete');
        Route::any('/edit/{id}','Portal\CategoriesController@edit');

    //categories
    Route::any('/autocomplete', 'Portal\CategoriesController@autoComplete')->name('autocomplete');
    Route::any('/categories_create', 'Portal\CategoriesController@categories_create')->name('categoriesSave');
    Route::any('/categories_datatable', 'Portal\CategoriesController@categories_datatable')->name('categories_datatable');
    Route::any('/category_datatable_status/{id}', 'Portal\CategoriesController@category_datatable_status')->name('category_delete');
    Route::any('/categories_update', 'Portal\CategoriesController@categories_update')->name('categoriesUpdate');
    Route::any('categories/delete','Portal\CategoriesController@destroy')->name('categories.delete');

    //Route::get('autocomplete', 'Portal\CategoriesController@search')->name('autocomplete');
    Route::get('category_dropdown', 'Portal\CategoriesController@category_dropdown')->name('category_dropdown');

    //color
      Route::any('/colors_datatable', 'Portal\CategoriesController@colors_datatable')->name('colors_datatable');
      Route::get('color_dropdown', 'Portal\CategoriesController@color_dropdown')->name('color_dropdown'); 
      Route::any('/colorupdate', 'Portal\CategoriesController@colors_update')->name('colors_update'); 
      Route::any('/colorsSave', 'Portal\CategoriesController@colorCreate')->name('colorsSave');
      Route::any('/color-delete', 'Portal\CategoriesController@colorDelete')->name('color-delete');

        //Faq's
        Route::get('/faq_list' , 'Portal\InformationController@faqList')->name('faq_list');
        Route::get('/faq/add' , 'Portal\InformationController@addFaq');
        Route::post('/faq/save' , 'Portal\InformationController@saveFaq');
        Route::get('/faq_edit/{id}', 'Portal\InformationController@editFaq')->name('faq_edit');
        Route::any('/faq/delete', 'Portal\InformationController@deleteFaq');
        
    //CMS page
        Route::get('/cms_list', 'Portal\InformationController@cmsList')->name('cms_list');
        Route::get('/cms/add' , 'Portal\InformationController@addCmsPage');
        Route::post('/cms/save' , 'Portal\InformationController@saveCmsPage');
        Route::get('/cms_edit/{id}', 'Portal\InformationController@editCms')->name('cms_edit');
        Route::post('/cms/delete', 'Portal\InformationController@deleteCms');

    //Faults And Returns
        Route::get('/fault_list', 'Portal\FaultsReturnsController@faultList')->name('fault_list');
        Route::any('/fault_create', 'Portal\FaultsReturnsController@faultCreate')->name('fault_create');
        Route::get('/fault_view/{id}', 'Portal\FaultsReturnsController@editFault')->name('fault_view');
        Route::post('/fault_update', 'Portal\FaultsReturnsController@faultUpdate')->name('fault_update');
        Route::any('/fault_delete', 'Portal\FaultsReturnsController@deleteFaults')->name('fault_delete');
        Route::post('/fault_staff_list', 'Portal\FaultsReturnsController@faultStaffList')->name('fault_staff_list');
        Route::post('/fault_assign_staff', 'Portal\FaultsReturnsController@FaultReturnAssign')->name('fault_assign_staff');
        Route::post('/fault_status_update', 'Portal\FaultsReturnsController@FaultStatusUpdate')->name('fault_status_update');

    //Order Information
    Route::get('/order_list', 'Portal\OrderController@orderList');
    Route::any('/add_shipping_details/{id}', 'Portal\OrderController@shippingCreate')->name('shippingDetailsAdd');
    Route::any('/save_shipping_details', 'Portal\OrderController@SaveShippingDetails')->name('save_shipping_details');
    Route::any('/add_shipping_item_details/{id}/{item_id}', 'Portal\OrderController@shippingItemCreate')->name('shippingDetailsAdd');
    Route::any('/save_shipping_item_details', 'Portal\OrderController@SaveShippingItemDetails')->name('save_shipping_item_details');                
    // change supplier list 
    Route::post('/get_pro_supplier', 'Portal\OrderController@productSupplierList')->name('get_pro_supplier');   
    Route::post('/supplier_change', 'Portal\OrderController@productSupplierUpdate')->name('supplier_change');   

    Route::any('/shipment_import','Portal\OrderController@importShimentDetails')->name('shipment_import');
    Route::any('/order_index','Portal\OrderController@order_index')->name('order_list');
    Route::any('/order_index_data','Portal\OrderController@order_index_data')->name('order_list_data');
    Route::post('/enable_return','Portal\OrderController@enable_return')->name('enable_return');
    Route::get('/order_view/{id}','Portal\OrderController@view_order');
    Route::get('/order_edit/{id}','Portal\OrderController@edit');
    Route::post('/order_update','Portal\OrderController@update');
    Route::any('/order/delete','Portal\OrderController@destroy');
    Route::post('/export','ExcelController@export');
    Route::any('/delivered','ExcelController@product_delivered');
 

    //featured Video
        Route::get('/featured_video', 'Portal\AdminHomeController@featured_video')->name('featured_video');
        Route::post('/featured_video_add', 'Portal\AdminHomeController@featured_video_add')->name('featured_videoAdd');
        Route::get('/featured_video_datatable_status_update/{id?}', 'Portal\AdminHomeController@featured_video_datatable_status_update')->name('featuredVideoStatusUpdate');
        Route::post('/featured_video_edit', 'Portal\AdminHomeController@featured_video_edit')->name('featured_videoEdit');
        Route::any('/featured_video/delete', 'Portal\AdminHomeController@destroy')->name('featured_video.delete');

        //Manage Emojis
          Route::get('/emoji_list', 'EmojiController@emoji_list')->name('emoji_list');
          Route::get('/emoji_list/create', 'EmojiController@emoji_list_create')->name('emojiCreate');
          Route::get('emoji_list/status', 'EmojiController@emoji_list_status')->name('emojiStatus');
          Route::post('/emoji_list/save', 'EmojiController@emoji_list_store')->name('emojiSave');

       //product
        Route::any('/product_list', 'Portal\ProductsController@product_list')->name('product_list');
        Route::get('/product_add', 'Portal\ProductsController@product_add')->name('productAdd');
        Route::post('/product_add/process', 'Portal\ProductsController@productProcess')->name('productProcess');
		Route::post('/product_add/options', 'Portal\ProductsController@productOptions');
        Route::post('/product_add/process/options', 'Portal\ProductsController@productProcessOptions')->name('productProcess');
        Route::post('product-import', 'Portal\ProductsController@productImport')->name('product-import');
        Route::get('/get_sub_category/{id?}', 'Portal\ProductsController@get_sub_category')->name('get_sub_category');
        Route::post('/product_save', 'Portal\ProductsController@product_save')->name('productSave');
        Route::post('/product_new_variant_save', 'Portal\ProductsController@product_new_variant_save')->name('product_new_variant_save');

        Route::get('/product_datatable_status_update/{id}', 'Portal\ProductsController@product_datatable_status_update')->name('product_datatable_status_update');
        Route::get('/product_edit/{id}', 'Portal\ProductsController@product_edit')->name('product_edit');
        Route::post('/product_update', 'Portal\ProductsController@product_update')->name('productUpdate');

        Route::post('/product_update_main', 'Portal\ProductsController@product_update_main')->name('productUpdateMain');
        Route::get('/product_variant_edit/{id}', 'Portal\ProductsController@product_variant_edit')->name('product_variant_edit');

        Route::get('/product_variant_add/{id}', 'Portal\ProductsController@product_variant_add')->name('product_variant_edit');

        Route::post('/product_variant_edit/update', 'Portal\ProductsController@pvUpdate')->name('pvUpdate');
        Route::any('/product/variant/delete', 'Portal\ProductsController@pvdestroy')->name('product.pvdelete');
        Route::get('/attribute_check', 'Portal\ProductsController@attributeCheck');
        Route::get('/product_name_check/{productname?}', 'Portal\ProductsController@product_name_check')->name('productNameCheck');
        Route::get('/product_name_check_update/{productname?}/{id?}', 'Portal\ProductsController@product_name_check_update')->name('productNameCheckUpdate');
        Route::any('/product/delete', 'Portal\ProductsController@destroy')->name('product.delete');
    
        //print type
        Route::get('/print_type_list', 'Portal\ProductsController@print_type_list')->name('print_type_list');
        Route::any('/review_list', 'Portal\ProductsController@review_list')->name('review_list');
        Route::any('/banner_list', 'Portal\ProductsController@banner_list')->name('banner_list');
        Route::any('/banner_image_get', 'Portal\ProductsController@banner_image_get')->name('banner_image_get');
        Route::any('/image_save', 'Portal\ProductsController@image_save')->name('image_save');
        Route::any('/image_status_update', 'Portal\ProductsController@image_status_update')->name('image_status_update');
        Route::post('/review_update_data', 'Portal\ProductsController@review_update_data')->name('review_update_data');
        Route::post('/print_type_list_post', 'Portal\ProductsController@print_type_list_post')->name('print_type_list_post');
        Route::get('/print_type_delete', 'Portal\ProductsController@print_type_delete')->name('print_type_delete');
        Route::get('/print_type_get', 'Portal\ProductsController@print_type_get')->name('print_type_get');

    //Merchandise Product     
    Route::get('/merchandise/product', 'Portal\MerchandiseProductController@index')->name('mrech_prod_lst');
    Route::get('/merchandise/product/{id}/view', 'Portal\MerchandiseProductController@view')->name('mrech_prod_view');

    //ckeditor
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

    //Enquiry
    Route::any('/enquiry_list', 'Portal\EnquiryController@index')->name('enquiry_list');
    Route::get('/enquiry_edit/{id}', 'Portal\EnquiryController@view')->name('enquiry_edit');
    Route::any('/enquiry_status_change', 'Portal\EnquiryController@enquiry_status_change')->name('enquiry_status_change');
    Route::post('/maill','Portal\EnquiryController@maill');
    Route::get('/mailsuccess','Portal\EnquiryController@maill')->name('mailsuccess');

//revenue
// Route::resource('revenue', 'Portal\RevenuesharingController');
Route::get('revenue','Portal\RevenuesharingController@create')->name('revenuecreate');
Route::post('revenue/store','Portal\RevenuesharingController@store')->name('revenue.store');
Route::post('revenue/update','Portal\RevenuesharingController@update')->name('revenue.update');
Route::any('revenue/delete','Portal\RevenuesharingController@update_status')->name('revenue.delete');
Route::get('revenue_list','Portal\RevenuesharingController@index')->name('revenue_list');
Route::get('/revenue_edit/{id}', 'Portal\RevenuesharingController@edit')->name('revenue_edit');

//delivery-packing
Route::get('delivery_packing','Portal\DeliveryAndPackingController@create')->name('delivery_packingcreate');
Route::post('delivery_packing/store','Portal\DeliveryAndPackingController@store')->name('delivery_packing.store');
Route::post('delivery_packing/update','Portal\DeliveryAndPackingController@update')->name('delivery_packing.update');
Route::any('delivery_packing/delete','Portal\DeliveryAndPackingController@update_status')->name('delivery_packing.delete');
Route::get('delivery_packing_list','Portal\DeliveryAndPackingController@index')->name('delivery_packing_list');
Route::get('delivery_packing_edit/{id}', 'Portal\DeliveryAndPackingController@edit')->name('delivery_packing_edit');

//customers
Route::get('customer','Portal\CustomerController@create')->name('customercreate');
Route::get('customer_list','Portal\CustomerController@index')->name('customer_list');
Route::post('customer/store','Portal\CustomerController@store')->name('customer.store');
Route::post('customer/update','Portal\CustomerController@update')->name('customer.update');
Route::any('customer/delete','Portal\CustomerController@destroy')->name('customer.delete');
Route::get('/customer_edit/{id}', 'Portal\CustomerController@edit')->name('customer_edit');

//Artist
Route::get('artist','Portal\ArtistController@create')->name('artistcreate');
Route::get('artist_list','Portal\ArtistController@index')->name('artist_list');
Route::post('enable_artist','Portal\ArtistController@enable_artist')->name('enable_artist');
Route::post('artist/store','Portal\ArtistController@store')->name('artist.store');
Route::post('artist/update','Portal\ArtistController@update')->name('artist.update');
Route::any('artist/delete','Portal\ArtistController@destroy')->name('artist.delete');
Route::get('/artist_edit/{id}', 'Portal\ArtistController@edit')->name('artist_edit');
Route::get('/artist_edit/{id}', 'Portal\ArtistController@edit')->name('artist_edit');
Route::get('/artist_dashboard', 'Portal\ArtistController@artist_dashboard')->name('artist_dashboard');

//Notifications
Route::get('send', 'HomeController@sendNotification');
Route::get('sendorder', 'HomeController@sendOrderNotification');
Route::get('sendfault', 'HomeController@sendFaultNotification');
Route::get('readfaultnotification/{id}','HomeController@readFaultNotification')->name('readfaultnotification');
Route::get('readenquiryNotification/{user_id}','HomeController@readEnquiryNotification')->name('readenquiryNotification');
Route::get('readOrderNotification/{user_id}','HomeController@readOrderNotification')->name('readOrderNotification');
Route::get('viewall','HomeController@viewAll')->name('viewall');
Route::get('fault_viewall','HomeController@faultViewAll')->name('fault_viewall');
Route::get('order_viewall','HomeController@orderViewAll')->name('order_viewall');


    });

});


/*
|--------------------------------------------------------------------------
| Portal user routes end
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Front-end Artist routes start
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=> ['checkadmin']], function()
{
    Route::get('/', function () {
        // return 'Just...';
        $data = DB::table("cms")->whereNull('deleted_at')->orderBy('id', 'asc')->get(); 
        $featured_video = Featured_video::where('type','Home')->get();
        $featured_count = Featured_video::where('deleted_at',null)->count();
        $categories = Categories::where('parent_id',0)->get();
        $categories_count = Categories::where('deleted_at',null)->count('category_image');
        $banner = Banner::all()->where('status','1')->sortBy('id');
        Route::get('/home', 'Front\PageController@home');
        return view('front/home',compact('featured_video','data','categories','categories_count','featured_count','banner'));
    })->name('home');

    Route::get('/home', function () { 
        return redirect('/');
    });
    Route::any('/returnadmin','HomeController@returnAdmin')->name('returnAdmin');
    Route::any('/login', function () { return view('front/login'); })->name('login');
    Route::get('/signup', function () { return view('front/signup'); })->name('signup');
    // Route::get('/signup','Auth\RegisterController@create_signup')->name('signup');
    Route::post('/signup', 'RegisterController@signup');
    // Route::get('/faq', function () { return view('front/faq'); });
    Route::any('/faq', 'Front\PageController@faq')->name('faq');
    Route::post('/currency_set', 'Front\PageController@currencySwitcher');
    Route::get('/help', 'Front\PageController@help');
    Route::post('/enquiry_details', 'Front\PageController@saveEnquiryDetails')->name('enquiry_details');
    Route::get('/productdetail', 'Front\PageController@productdetail');

    // Route::get('/privacy','Front\PageController@privacy');
    // Route::any('privacy/{slug}','Front\PageController@privacySlug');
    // Route::get('/terms','Front\PageController@terms');
    // Route::any('terms/{slug}','Front\PageController@termsSlug');
    // Route::get('/shipping','Front\PageController@shipping');
    // Route::any('shipping/{slug}','Front\PageController@shippingSlug');

    Route::any('others/{slug}','Front\PageController@others');


    Route::get('/ideas', 'Front\PageController@ideas');
    Route::get('/detailpage/{id}', 'Front\PageController@detailpage');
    Route::get('/wishlist', 'Front\PageController@wishlist');
    Route::any('/wishlistadd', 'Front\PageController@wishlistadd')->name('wishlistadd');

    // Route::get('/ideas', function () { return view('front/ideas'); })->name('ideas');
    Route::get('/password/reset', function () { return view('front/password-reset'); });
    Route::get('/password/reset/{token}', function () { return view('front/password-update'); });

    /* forgot password */
    // Route::get('password/reset', 'Portal\UserController@forgotpsw');
    Route::any('password/email', 'Portal\UserController@forgotpsw_sendemail');
    Route::get('reset', 'Portal\UserController@reset');
    Route::post('reset/update', 'Portal\UserController@reset_update');

    Route::get('/referral', 'HomeController@referral');
    Route::post('/refferalCreate', 'HomeController@refferalcupon')->name('refferalCreate');

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    // Route::get('/about-me', 'Front\PageController@aboutMe');
    Route::get('/artist/{uname}', 'Front\PageController@aboutMe');
    Route::any('/shop/{uname}','Front\ArtistShopController@productList');
    Route::get('/products/{uname}/{name}','Front\ArtistShopController@seeAll');
    Route::get('/category/{uname}/{name}','Front\ArtistShopController@cat_see_all');

    Route::get('/edit-profile', 'HomeController@editProfile');
    Route::post('/edit-profile/update', 'HomeController@editProfileUpdate');
    Route::post('/edit-profile/about-me', 'HomeController@editProfileAboutMe');
    Route::post('/edit-profile/changepassword', 'HomeController@changepassword');
    Route::post('/edit-profile/paymentInfo', 'HomeController@paymentInfo');
    Route::get('/edit-profile/complete-fap/{flag}', 'HomeController@completeFap');
    Route::post('/edit-profile/2fa','HomeController@completeOtp')->name('edit-profile/2fa')->middleware('2fa');
    Route::get('/2fa', 'HomeController@faPage');
    Route::post('/otp-page','HomeController@otpPage')->name('otp-page');
    Route::post('/update_otp','HomeController@updateOtp')->name('update_otp')->middleware('2fa');
    Route::post('/2fa-status','HomeController@faStatus')->name('2fa-status');
    Route::get('/complete-2fa','HomeController@complete2fa')->name('complete-2fa');

    //Manage Artist Emojis
    Route::get('/emoji_list', 'EmojiController@artist_emoji_list')->name('artist.emoji_list');
    Route::get('/artist/emoji_list/create', 'EmojiController@artist_emoji_list_create')->name('artist.emojiCreate');
    Route::post('/artist/emoji_list/save', 'EmojiController@artist_emoji_list_store')->name('artist.emojiSave');


    Route::get('/media-gallery', 'HomeController@mediaGallery');
    Route::post('/media-gallery/add', 'HomeController@mediaGalleryAdd');
    Route::get('/media-gallery/{id}/destory', 'HomeController@mediaGalleryDestory');
    // Route::post('/ajax-upload', 'HomeController@ajaxUpload')->name('ajax.upload');

    // Design Creation Routes
    // Route::get('/design-creation', 'HomeController@createMerchendise');
    // Route::get('/design-creation/{id}', 'HomeController@customiseMerchendise');

    Route::get('/theme', 'Front\ArtistController@theme');
    Route::post('/theme/update', 'Front\ArtistController@themeUpdate');
    Route::get('/theme/preview', function () { return view('front/theme-preview'); });

    // Design Creation Routes
    Route::get('/design-creation', 'Front\MerchandiseDesginController@createMerchendise')->name('designCreation');
    Route::get('/design-creation/{id}', 'Front\MerchandiseDesginController@customiseMerchendise');
    Route::post('/category/product', 'Front\MerchandiseDesginController@categoryProduct');
    Route::get('/artist/merchendise/{id}/delete', 'Front\MerchandiseDesginController@artistMerchendiseDelete');
    Route::get('/artist/merchendise/{id}/add', 'Front\MerchandiseDesginController@artistMerchendiseAdd');
    Route::post('/design-upload/', 'Front\MerchandiseDesginController@designUpload')->name('designUpload');
    Route::any('artist/category/autocomplete', 'Front\MerchandiseDesginController@autocomplete')->name('ac_autocomplete');

    Route::post('/get_promotional_image','Front\MerchandiseDesginController@get_promotional_image')->name('get_promotional_image');

    Route::any('/artist/sort/order', 'Front\CustomiseMerchendiseController@artistMerchendiseSortUpdate');
    Route::get('/manage_merchandise_product','Front\CustomiseMerchendiseController@merchendiseView')->name('manage_product');
    Route::any('/merchandise/product/delete/{id}', 'Front\CustomiseMerchendiseController@deleteImage');
    Route::any('/merchandise/product/edit/{id}', 'Front\CustomiseMerchendiseController@EditProductDetails')->name('manage_edit');
    Route::any('/merchandise/product/edit-addon', 'Front\CustomiseMerchendiseController@editAddonProductDetails')->name('manage_edit');
    Route::any('/merchandise/product/update', 'Front\CustomiseMerchendiseController@UpdateProductDetails');
    // Manage shipping address
    Route::get('/address_book','Front\AddresssBookController@addressBook');
    Route::post('/address_book/store','Front\AddresssBookController@store');
    Route::post('/address_book/update','Front\AddresssBookController@update');
    Route::get('/address_book/edit/{id}','Front\AddresssBookController@edit');
    Route::delete('/address_book/delete','Front\AddresssBookController@delete');
    Route::get('/address_book/list','Front\AddresssBookController@list');

    //Artist list 
    Route::get('/artist_list','SearchController@create');
    Route::get('artist_shop','Front\ArtistShopController@view');
    Route::any('/artist_search_list','SearchController@artist_search_list')->name('artist_search_list');
    //
    Route::get('/manage_merchandise_product','Front\CustomiseMerchendiseController@merchendiseView')->name('manage_product');


    Route::any('/product_list','Front\ProductController@product_list');
    Route::any('/print_type_add','Front\ProductController@print_type_add');
    Route::any('/merchandise_product_list','Front\ProductController@list');
    Route::get('/merchandise_product_list/artist_id={artist_id}','Front\ProductController@list');
    Route::post('merch_filter','Front\ProductController@filter');
    Route::get('/product_detail/{id}','Front\ProductController@detail_view');
    Route::post('name_filter','Front\ProductController@name_filter');
    Route::post('sort_filter','Front\ProductController@sort_value');
    Route::get('merch_category','Front\ProductController@merch_cat');
     // Route::get('merch_sub_category/{id}','Front\ProductController@merch_subcat');
    Route::any('merch_sub_category/{id}/{productid?}','Front\ProductController@merch_subcat');
    Route::any('merch_description_page/{productId}','Front\ProductController@merch_description_page');
    Route::post('merch_sub_category_ajax','Front\ProductController@merch_subcat_ajax')->name('sub_category_ajax');
    Route::post('image_display','Front\ProductController@image_display')->name('image_display');
    Route::post('merch_search_list','SearchController@merch_search_list')->name('merch_search_list');
    Route::post('search_sub_category_products','SearchController@searchSubCategoryProducts')->name('search_sub_category_products');

    //Cart Management
    Route::get('/checkout_loggedin','Front\CartController@customerCheckoutPage');
    Route::any('/checkout_loggedin_form','Front\CartController@customerCheckout')->name('checkout_loggedin_form');
    Route::get('/guest_checkout_page','Front\CartController@guestCheckoutPage');
    Route::any('/checkout_customer','Front\CartController@customerOrder');
    Route::get('/cart','Front\CartController@cardPageView')->name('cart');
    Route::get('/cart_guest','Front\CartController@cardPageViewGuest')->name('cart_guest');
    Route::any('/packing/update','Front\CartController@packingUpdate')->name('packingUpdate');

    Route::post('/additionalcharge/update','Front\CartController@additionalchargeUpdate')->name('additionalchargeUpdate');

    Route::any('/delivery/update','Front\CartController@deliveryUpdate')->name('deliveryUpdate');
    Route::get('/term-and-condition','Front\CartController@termsConditionView')->name('term-and-condition');
    Route::get('/privacy-policy','Front\CartController@policyView')->name('privacy-policy');

    Route::any('/add-to-cart/store','Front\CartController@addToCart')->name('add_to_cart');
    Route::any('/update-cart-qty','Front\CartController@updateCartQty')->name('update_cart_qty');
    Route::any('/add-to-cart/remove','Front\CartController@cartItemRemove')->name('cart_item_remove');
    Route::any('/add-address','Front\CartController@addAddressLoggedCustomer')->name('add-address');

    //stripe payment
    Route::get('stripe/page', 'Front\PaymentController@stripe')->name('stripe_page');
    Route::any('stripe_guest_page', 'Front\PaymentController@guest_stripe');
    Route::post('payment', 'Front\PaymentController@payStripe'); 
    Route::get('sample/order', 'Front\PaymentController@sampleOrder');

    //paypal
    // Route::any('paypal/payment', 'Front\PayPalController@paymentPage')->name('paymentPage');
    Route::any('payment/paypal', 'Front\PayPalController@payment')->name('paypal_page');
    Route::get('cancel', 'Front\PayPalController@cancel')->name('payment.cancel');
    Route::any('payment/success', 'Front\PayPalController@success')->name('payment.success');

     //order management
    Route::any('artist_sale_product', 'Front\OrderController@artistSaleProduct')->name('artistSaleProduct');
    Route::any('sale_product_detail_page/{id}', 'Front\OrderController@saleProductDetailPage')->name('sale_product_detail_page');

    //order management
    Route::any('order_list', 'Front\OrderController@orderListPage')->name('order_list');
    Route::any('order_details/{id}', 'Front\OrderController@orderDetailPage')->name('order_details');
    Route::any('order_cancel/{id}', 'Front\OrderController@orderCancel')->name('order_cancel');
    Route::post('review_save', 'Front\OrderController@review_save')->name('review_save');
    Route::any('/fault_add', 'Front\OrderController@AddFaultChecker')->name('fault_add');
    Route::any('/return_view/{order_id}/{product_id}', 'Front\OrderController@ViewReturnItems')->name('return_view');
    Route::any('printTypeUpdate','Front\CartController@printTypeUpdate')->name('printTypeUpdate');
    Route::any('/search','Front\ProductController@search');


    //affiliate 
    Route::get('/affiliate','Front\AffiliateController@affiliate_start')->name('affiliate_start');
    Route::any('/affiliate_list','Front\AffiliateController@affiliate_list')->name('affiliate_list');
    Route::any('affiliate_search_list','Front\AffiliateController@affiliate_search_list')->name('affiliate_search_list');
    Route::any('affiliate_sharemail','Front\AffiliateController@affiliate_sharemail')->name('affiliate_sharemail');
});

// Artist shop
// Route::get('/{uname}/shop','Front\ArtistShopController@view');
// User Management
Route::group(['prefix' => 'u', 'as' => 'u.'], function () {


});
