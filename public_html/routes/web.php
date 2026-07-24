<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\HeaderController;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\PortfolioController;

use App\Http\Controllers\CareerController;

use App\Http\Controllers\CaptchaController;

use App\Http\Controllers\MembersController;

use App\Http\Controllers\IntegrationController;

use App\Http\Controllers\NewsController;

use App\Http\Controllers\SoftwareUpdateController;

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

Route::get('/', function () {
    return view('welcome');
});
/*Route::resource('contact', ContactController::class);*/

//contatus
//pagination
//Route::get('viewclient',[MembersController::class,'show']);
Route::match(['get', 'post'], 'viewclient', 'Auth\MembersController@viewclient')->name('show');


//Login
Route::match(['get', 'post'], 'login', 'Auth\LoginController@login')->name('login');

//Forgot Password 
Route::match(['get', 'post'], 'forgot_password', 'Auth\ForgotPasswordController@forgot_password')->name('forgot_password');


//captcha
Route::match(['get', 'post'], 'captcha', 'CaptchaController@captcha')->name('captcha');

//home

Route::match(['get', 'post'], 'welcome', 'HomeController@welcome')->name('welcome');

//header

Route::match(['get', 'post'], 'header_one', 'HeaderController@header_one')->name('header_one');
Route::match(['get', 'post'], 'header_two', 'HeaderController@header_two')->name('header_two');
Route::match(['get', 'post'], 'header_three', 'HeaderController@header_three')->name('header_three');
Route::match(['get', 'post'], 'header_four', 'HeaderController@header_four')->name('header_four');
//company

Route::match(['get', 'post'], 'overview', 'OverviewController@overview')->name('overview');
Route::match(['get', 'post'], 'career', 'CareerController@career')->name('career');
Route::match(['get', 'post'], 'career-jd', 'CareerController@careerjd')->name('career-jd');
Route::match(['get', 'post'], 'team', 'TeamController@team')->name('team');
/*Route::match(['get','post'],'certificate', 'CertificateController@certificate')->name('certificate');*/
Route::match(['get', 'post'], 'gallery', 'GalleryController@gallery')->name('gallery');
Route::match(['get', 'post'], 'events_expo/{slug?}', 'EventExpoController@eventsExpo')->name('events_expo');
Route::match(['get', 'post'], 'faq', 'ContactController@faq')->name('faq');
Route::match(['get', 'post'], 'faq-details', 'ContactController@faqDetails')->name('faq-details');
Route::match(['get', 'post'], 'book-appointment', 'ContactController@bookAppointment')->name('book-appointment');
Route::match(['get', 'post'], 'diagnostic-report', 'ContactController@diagnosticReport')->name('diagnostic-report');
Route::match(['get', 'post'], 'patient-portal', 'ContactController@patientPortal')->name('patient-portal');
/*Route::match(['get','post'],'culture', 'CultureController@culture')->name('culture');*/

//products
Route::match(['get', 'post'], 'product', 'ProductController@product')->name('product');

Route::match(['get', 'post'], 'ultimatehms', 'UltimatehmsController@ultimatehms')->name('ultimatehms');
Route::match(['get', 'post'], 'hms', 'HmsController@hms')->name('hms');
Route::match(['get', 'post'], 'lab', 'LabController@lab')->name('lab');

Route::match(['get', 'post'], 'radiology', 'RadiologyController@radiology')->name('radiology');
Route::match(['get', 'post'], 'pharmacy', 'PharamcyController@pharmacy')->name('pharmacy');
Route::match(['get', 'post'], 'bloodbank', 'BloodbankController@bloodbank')->name('bloodbank');
Route::match(['get', 'post'], 'doctor', 'DoctorController@doctor')->name('doctor');

//services

Route::match(['get', 'post'], 'appointment', 'AppointmentController@appointment')->name('appointment');
Route::match(['get', 'post'], 'patlogin', 'PatloginContoller@patlogin')->name('patlogin');
//Route::match(['get','post'],'labrep', 'LabrepController@labrep')->name('labrep');
Route::match(['get', 'post'], 'labrep', 'LabrepController@labrep');
Route::match(['get', 'post'], 'radio', 'RadioController@radio');

//clients

Route::match(['get', 'post'], 'clientreview', 'ClientreviewController@clientreview')->name('clientreview');
Route::match(['get', 'post'], 'viewclient', 'ViewclientController@viewclient')->name('viewclient');
Route::match(['get', 'post'], 'viewquotation', 'ViewquotationController@viewquotation')->name('viewquotation');
//pages

Route::match(['get', 'post'], 'abouts', 'PagesController@about')->name('abouts');
//Route::match(['get','post'],'about', 'PagesController@about')->name('about');

Route::match(['get', 'post'], 'web_form', 'PagesController@email_form')->name('web_form');
//privacy policy
Route::match(['get', 'post'], 'privacy_policy', 'Privacy_policyController@privacy_policy')->name('privacy_policy');
Route::match(['get', 'post'], 'terms', 'TermsController@terms')->name('terms');
Route::match(['get', 'post'], 'refund', 'RefundController@refund')->name('refund');
Route::match(['get', 'post'], 'shipping', 'RefundController@shipping')->name('shipping');

//contact

Route::match(['get', 'post'], 'contact', 'ContactController@contact')->name('contact');
Route::match(['get', 'post'], 'enquiry', 'ContactController@contact')->name('enquiry');
Route::match(['get', 'post'], 'countryData/{id}', 'ContactController@countryData');
Route::match(['get', 'post'], 'stateData/{id}', 'ContactController@stateData');
Route::match(['get', 'post'], 'payNow', 'ContactController@payNow')->name('payNow');
Route::post('/check-mobile', [ContactController::class, 'checkMobile'])->name('check.mobile');
Route::post('/check-phone', [ContactController::class, 'checkPhone'])->name('check.phone');

Route::match(['get', 'post'], 'googleReview', 'ContactController@googleReview')->name('googleReview');
//portfolio
Route::match(['get', 'post'], 'portfolio', 'PortfolioController@portfolio')->name('portfolio');

//search
//Route::get('/viewclient', 'SearchController@viewclient')->name('search');

//integration
Route::match(['get', 'post'], 'integration', 'IntegrationController@integration')->name('integration');
Route::match(['get', 'post'], 'integrationDetail', 'IntegrationController@show')->name('show');

//integration
Route::match(['get', 'post'], 'news_and_updates', 'NewsController@news')->name('news');
Route::match(['get', 'post'], 'newsDetail', 'NewsController@show')->name('show');

//software updates
Route::get('software_updates', [SoftwareUpdateController::class, 'index']);


