<?php


//website all route:
Route::get('/', 'LandingPageController@index')->name('landing-page');
// Product View Modal with Ajax
Route::get('/products/view/modal/{id}','LandingPageController@ProductViewAjax');

Route::post('load/products', 'LandingPageController@loadMorePro')->name('load.products');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::post('/search-result', 'ShopController@serachResult');
Route::get('/shop/{products}', 'ShopController@show')->name('shop.show');

//Cart route:
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/payment-method', 'CartController@paymentMethod')->name('payment.method');
//add to cart ajax
Route::get('/cart/get-cart-partial', 'CartController@getCartPartial');
Route::get('/cart/set-shipping', 'CartController@setShipping');
Route::get('/cart/{products}', 'CartController@addToCart')->name('addto.cart');
Route::get('/products/mini/cart', 'CartController@AddMiniCart');
Route::get('/minicart/products-remove/{rowId}', 'CartController@RemoveMiniCart');

Route::post('/cart/{products}', 'CartController@store')->name('cart.store');
Route::post('/cart/update/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{products}', 'CartController@destroy')->name('cart.destroy');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth:customer');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
Route::post('/payment', 'ConfirmationController@confirmPayment')->name('confirm.payment');
Route::get('/payment', 'ConfirmationController@payment')->name('payment.index');

//blog
Route::get('/all-blogs', 'BlogController@index')->name('blogs.all');
Route::get('/show/blogs/{slug}', 'BlogController@showBlog')->name('show.blogs');
//pages
Route::get('/contact-us', 'PageController@contact')->name('contact.page');
Route::get('/faqs', 'PageController@faqs')->name('faqs.page');
Route::get('/page/{slug}', 'PageController@show')->name('all.pages');

Route::get('/brands', 'BrandController@allbrand')->name('all.brands');
Route::get('/brand/{slug}', 'BrandController@show')->name('brand.show');

Route::get('/order-tracking', 'TrackOrderController@index')->name('track.order');
Route::get('/order-tracking/result', 'TrackOrderController@orderTrack')->name('check.order');
Route::post('/subscriber', 'SubscriberController@store')->name('subscribers.store');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/flash-deals', 'FlashdealController@allFlashDeals')->name('all.flashdeals');
Route::get('/flash-deals/{slug}', 'FlashdealController@showFlashDeals')->name('show.flashdeals');

Route::get('/campaigns', 'CampaignController@allCampaign')->name('all.campaign');
Route::get('/campaigns/{slug}', 'CampaignController@showCampaign')->name('show.campaign');

//message
Route::post('messages', 'MessageController@store')->name('message.store');
Route::post('chatting', 'MessageController@storeByAjax')->name('message.storebyajax');
Route::post('chat-box/ajax', 'MessageController@chatboxAjax')->name('chatbox.ajax');


//Admin All route:
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login.post');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('home', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('payment-method', 'Admin\PaymentController@index')->name('payment.index');

    //settings route:
    Route::get('settings', 'Admin\SettingsController@showSettings')->name('settings.index');
    Route::get('shipping-method', 'Admin\SettingsController@shippingMethod')->name('shipping.method');
    Route::get('storefront', 'Admin\AppearanceController@storeFront')->name('store.front');
    Route::post('update/settings', 'Admin\SettingsController@updateSettings')->name('store-settings');

    //data backup
    Route::get('backup', 'Admin\DbBackupController@index')->name('backup.index');
    Route::post('backup/db', 'Admin\DbBackupController@store')->name('db-backup.store');
    Route::post('backup', 'Admin\DbBackupController@fileBackup')->name('file.backup');

    Route::get('/update-status/{id}/{status}','Admin\ProductController@updateStatus')->name('update.status');
    Route::get('/get-sub','Admin\ProductController@getSub')->name('sub.get');
    Route::resource('products', 'Admin\ProductController');

    Route::resource('blogs', 'Admin\BlogController');
    Route::resource('blogscategories', 'Admin\BlogCategoryController');

    Route::get('/subscribers','Admin\SubscriberController@index')->name('subscribers.index');
    Route::delete('/subscribers/{id}','Admin\SubscriberController@destroy')->name('subscribers.destroy');

    Route::get('/contacts','Admin\ContactController@index')->name('contacts.index');
    Route::delete('/contacts/{id}','Admin\ContactController@destroy')->name('contacts.destroy');

    Route::get('/slider-status/{id}/{status}','Admin\SliderController@sliderStatus');
    Route::resource('sliders', 'Admin\SliderController');

    Route::get('/banner-status/{id}/{status}','Admin\BannersController@bannerStatus');
    Route::resource('banners', 'Admin\BannersController');

    Route::resource('wishlist', 'Admin\wishlistController');
    //flash deal
    Route::resource('flashdeals', 'Admin\FlashdealController');
    Route::post('/flash-deal/products-flashdeal', 'Admin\FlashdealController@flashdealpro')->name('flashdeal.products');
    Route::post('/flash-deal/flashdeal-edit', 'Admin\FlashdealController@flashdealedit')->name('flashdeal.flashdealedit');

    //Campaign
    Route::resource('campaigns', 'Admin\CampaignController');
    Route::post('/campaign/products-campaign', 'Admin\CampaignController@campaignpro')->name('campaign.products');
    Route::post('/campaign/campaign-edit', 'Admin\CampaignController@campaignedit')->name('campaign.campaignedit');

    //review
    Route::get('/reviews', 'Admin\ReviewController@allReview')->name('reviews.all');
    Route::get('/review-status/{id}/{status}','Admin\ReviewController@reviewStatus');
    Route::delete('/reviews/{id}', 'Admin\ReviewController@destroy')->name('reviews.destroy');

    Route::resource('coupons', 'Admin\CouponController');

    Route::get('/cat-status/{id}/{status}','Admin\CategoryController@catStatus')->name('cat.status');
    Route::get('categories/data','Admin\CategoryController@data')->name('categories.data');
    Route::resource('categories', 'Admin\CategoryController')->except(['show']);
    Route::get('show-homepage/{id}/{show_homepage}', 'Admin\CategoryController@showHomepage');

    Route::get('brands/data','Admin\BrandController@data')->name('brands.data');
    Route::post('get/brands','Admin\BrandController@getBrands')->name('get.brands');
    Route::resource('brands', 'Admin\BrandController')->except(['show','edit','create']);

    Route::resource('customers', 'Admin\CustomersController');
    Route::get('pages/faqs', 'Admin\PagesController@faqsIndex')->name('faqs.index');
    Route::get('pages/contact-us', 'Admin\PagesController@contactIndex')->name('contact.index');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('faqs', 'Admin\FaqsController');

    Route::post('product-images', 'Admin\ProductImgController@altTempPimgUp')->name('altTempPimgUp');
    Route::post('product-images-remove', 'Admin\ProductImgController@altTempPimgRemove')->name('altTempPimgRemove');
    Route::post('product-images-delete', 'Admin\ProductImgController@deleteAltImgById')->name('deleteAltImgById');

    //message
    Route::get('messages', 'Admin\MessageController@index')->name('message.index');
    Route::post('get-chat', 'Admin\MessageController@getChatAjax')->name('getchat.ajax');
    Route::post('chatting', 'Admin\MessageController@AdminstoreByAjax')->name('message.adminbyajax');

    Route::post('order/status/{id}', 'Admin\OrdersController@OrderStatus')->name('order.status');
    Route::post('payment/status/{id}', 'Admin\OrdersController@PaymentStatus')->name('payment.status');
    Route::resource('orders', 'Admin\OrdersController', [
        'as' => 'admin'
    ]);
});


Route::group(['namespace' => 'Customer\Auth'], function() {

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@createAdmin')->name('register');

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    //laravel socialite
    Route::get('/login/github', 'LoginController@github');
    Route::get('/login/github/redirect', 'LoginController@githubRedirect');

    Route::post('/login', 'LoginController@adminLogin');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    //facebook login
    Route::get('login/facebook', 'FacebookController@redirectToProvider');
    Route::get('login/facebook/callback', 'FacebookController@handleProviderCallback');

    //Google login
    Route::get('login/google', 'GoogleController@redirectToProvider');
    Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

});

//Route::auth();

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::post('/wishlist/{products}','wishlistController@add')->name('add.wishlist');

Route::middleware('auth:customer')->group(function () {
    //wishlist
    Route::get('/wishlist','wishlistController@index')->name('wishlist.index');
    Route::get('/get-wishlist-products','wishlistController@GetWishlistProduct');
    Route::get('/wishlist-remove/{id}','wishlistController@RemoveWishlistProduct');

    Route::post('/wishlist/{row}/delete','wishlistController@deleteWishlist')->name('delete.wishlist');

    Route::post('review', 'ReviewController@postReview')->name('customer.review');

    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');

});
