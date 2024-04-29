<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\EventController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CampaignController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;

use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerProfileController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminMissionController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminCampaignController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminOtherPageController;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-message', [ContactController::class, 'send_message'])->name('contact_send_message');



Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event/{slug}', [EventController::class, 'detail'])->name('event');
Route::post('/event/send-message', [EventController::class, 'send_message'])->name('event_send_message');


Route::post('/event/ticket/payment', [EventController::class, 'payment'])->name('event_ticket_payment');
Route::get('/event/ticket/paypal-success', [EventController::class, 'paypal_success'])->name('event_ticket_paypal_success');
Route::get('/event/ticket/paypal-cancel', [EventController::class, 'paypal_cancel'])->name('event_ticket_cancel');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
Route::get('/campaign/{slug}', [CampaignController::class, 'detail'])->name('campaign');
Route::post('/campaign/send-message', [CampaignController::class, 'send_message'])->name('campaign_send_message');


Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');


Route::group(['middleware' => 'admin:admin'], function () {
    Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile'); 
    Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    Route::get('admin/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
    Route::get('admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('admin/faq/create-submit', [AdminFaqController::class, 'create_submit'])->name('admin_faq_create_submit');
    Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('admin/faq/edit-submit/{id}', [AdminFaqController::class, 'edit_submit'])->name('admin_faq_edit_submit');
    Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');


    Route::get('admin/settings/index', [AdminSettingController::class, 'index'])->name('admin_settings_index');
    Route::post('admin/settings/update', [AdminSettingController::class, 'update'])->name('admin_settings_update');

    Route::get('admin/other-pages/terms', [AdminOtherPageController::class, 'terms'])->name('admin_terms_page');
    Route::post('admin/other-pages/terms-update', [AdminOtherPageController::class, 'terms_update'])->name('admin_terms_page_update');

    Route::get('admin/other-pages/privacy', [AdminOtherPageController::class, 'privacy'])->name('admin_privacy_page');
    Route::post('admin/other-pages/privacy-update', [AdminOtherPageController::class, 'privacy_update'])->name('admin_privacy_page_update');


    Route::get('admin/slider/index', [AdminSliderController::class, 'index'])->name('admin_slider_index');
    Route::get('admin/slider/create', [AdminSliderController::class, 'create'])->name('admin_slider_create');
    Route::post('admin/slider/create-submit', [AdminSliderController::class, 'create_submit'])->name('admin_slider_create_submit');
    Route::get('admin/slider/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit');
    Route::post('admin/slider/edit-submit/{id}', [AdminSliderController::class, 'edit_submit'])->name('admin_slider_edit_submit');
    Route::get('admin/slider/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete');

    Route::get('admin/feature/index', [AdminFeatureController::class, 'index'])->name('admin_feature_index');
    Route::get('admin/feature/create', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('admin/feature/create-submit', [AdminFeatureController::class, 'create_submit'])->name('admin_feature_create_submit');
    Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('admin/feature/edit-submit/{id}', [AdminFeatureController::class, 'edit_submit'])->name('admin_feature_edit_submit');
    Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');
    Route::post('admin/feature/section-update', [AdminFeatureController::class, 'section_update'])->name('admin_feature_section_update');


    Route::get('admin/mission/edit', [AdminMissionController::class, 'edit'])->name('admin_mission_edit');
    Route::post('admin/mission/edit-submit', [AdminMissionController::class, 'edit_submit'])->name('admin_mission_edit_submit');


    Route::get('admin/event/index', [AdminEventController::class, 'index'])->name('admin_event_index');
    Route::get('admin/event/create', [AdminEventController::class, 'create'])->name('admin_event_create');
    Route::post('admin/event/create-submit', [AdminEventController::class, 'create_submit'])->name('admin_event_create_submit');
    Route::get('admin/event/edit/{id}', [AdminEventController::class, 'edit'])->name('admin_event_edit');
    Route::post('admin/event/edit-submit/{id}', [AdminEventController::class, 'edit_submit'])->name('admin_event_edit_submit');
    Route::get('admin/event/delete/{id}', [AdminEventController::class, 'delete'])->name('admin_event_delete');
    Route::get('admin/event/photo/{id}', [AdminEventController::class, 'photo'])->name('admin_event_photo');
    Route::post('admin/event/photo-submit/{id}', [AdminEventController::class, 'photo_submit'])->name('admin_event_photo_submit');
    Route::get('admin/event/photo-delete/{id}', [AdminEventController::class, 'photo_delete'])->name('admin_event_photo_delete');
    Route::get('admin/event/video/{id}', [AdminEventController::class, 'video'])->name('admin_event_video');
    Route::post('admin/event/video-submit/{id}', [AdminEventController::class, 'video_submit'])->name('admin_event_video_submit');
    Route::get('admin/event/video-delete/{id}', [AdminEventController::class, 'video_delete'])->name('admin_event_video_delete');



    Route::get('admin/campaign/index', [AdminCampaignController::class, 'index'])->name('admin_campaign_index');
    Route::get('admin/campaign/create', [AdminCampaignController::class, 'create'])->name('admin_campaign_create');
    Route::post('admin/campaign/create-submit', [AdminCampaignController::class, 'create_submit'])->name('admin_campaign_create_submit');
    Route::get('admin/campaign/edit/{id}', [AdminCampaignController::class, 'edit'])->name('admin_campaign_edit');
    Route::post('admin/campaign/edit-submit/{id}', [AdminCampaignController::class, 'edit_submit'])->name('admin_campaign_edit_submit');
    Route::get('admin/campaign/delete/{id}', [AdminCampaignController::class, 'delete'])->name('admin_campaign_delete');
    Route::get('admin/campaign/photo/{id}', [AdminCampaignController::class, 'photo'])->name('admin_campaign_photo');
    Route::post('admin/campaign/photo-submit/{id}', [AdminCampaignController::class, 'photo_submit'])->name('admin_campaign_photo_submit');
    Route::get('admin/campaign/photo-delete/{id}', [AdminCampaignController::class, 'photo_delete'])->name('admin_campaign_photo_delete');
    Route::get('admin/campaign/video/{id}', [AdminCampaignController::class, 'video'])->name('admin_campaign_video');
    Route::post('admin/campaign/video-submit/{id}', [AdminCampaignController::class, 'video_submit'])->name('admin_campaign_video_submit');
    Route::get('admin/campaign/video-delete/{id}', [AdminCampaignController::class, 'video_delete'])->name('admin_campaign_video_delete');

    

});




Route::get('/customer/login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::post('/customer/login-submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer_logout');
Route::get('/customer/signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('/customer/signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}', [CustomerAuthController::class, 'signup_verify'])->name('customer_verify');

Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');  


Route::group(['middleware' => 'customer:customer'], function () {
    Route::get('/customer/home', [CustomerHomeController::class, 'index'])->name('customer_home');

    Route::get('/customer/edit-profile', [CustomerProfileController::class, 'index'])->name('customer_profile');

    Route::post('/customer/edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('customer_profile_submit');
});
