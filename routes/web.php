<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use App\Models\Multipic;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->first();
    $services = DB::table('home_services')->get();
    $portfolio = Multipic::all();
    return view('home', compact('brands', 'about', 'services', 'portfolio'));
});

Route::get('/about', function () {
    return view('about');
});

//Category Controller
Route::get('/category/all', [CategoryController::class, 'All'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'Add'])->name('store.category');
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

//Brand Controller
Route::get('/brand/all', [BrandController::class, 'All'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multi Image
Route::get('/multi/image', [BrandController::class, 'MultiImage'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImage'])->name('store.image');

//Admin Route
Route::get('/admin', [AdminController::class, 'HomeSlider'])->name('admin');

Route::get('/admin/slider', [AdminController::class, 'HomeSlider'])->name('admin.slider');
Route::get('/admin/slider/add', [AdminController::class, 'AddSlider'])->name('add.slider');
Route::get('/admin/slider/edit/{id}', [AdminController::class, 'EditSlider'])->name('slider.edit');
Route::post('/admin/slider/store', [AdminController::class, 'StoreSlider'])->name('store.slider');
Route::post('/admin/slider/update/{id}', [AdminController::class, 'UpdateSlider']);
Route::get('/admin/slider/delete/{id}', [AdminController::class, 'DeleteSlider']);

//HomeAbout Route
Route::get('/admin/about', [AdminController::class, 'HomeAbout'])->name('admin.about');
Route::get('/admin/about/add', [AdminController::class, 'AddAbout'])->name('admin.about.add');
Route::post('/admin/about/store', [AdminController::class, 'StoreAbout'])->name('store.about');
Route::get('/admin/about/edit/{id}', [AdminController::class, 'EditAbout'])->name('about.edit');
Route::post('/admin/about/update/{id}', [AdminController::class, 'UpdateAbout']);
Route::get('/admin/about/delete/{id}', [AdminController::class, 'DeleteAbout']);

//HomeServices Route
Route::get('/admin/services', [AdminController::class, 'HomeServices'])->name('admin.services');
Route::get('/admin/services/add', [AdminController::class, 'AddServices'])->name('admin.services.add');
Route::post('/admin/services/store', [AdminController::class, 'StoreServices'])->name('store.services');
Route::get('/admin/services/edit/{id}', [AdminController::class, 'EditServices'])->name('services.edit');
Route::post('/admin/services/update/{id}', [AdminController::class, 'UpdateServices']);
Route::get('/admin/services/delete/{id}', [AdminController::class, 'DeleteServices']);

//HomePortfolio Route
Route::get('/admin/portfolio', [AdminController::class, 'HomePortfolio'])->name('admin.portfolio');
Route::get('/admin/portfolio/add', [AdminController::class, 'AddPortfolio'])->name('admin.portfolio.add');
Route::post('/admin/portfolio/store', [AdminController::class, 'StorePortfolio'])->name('store.portfolio');
Route::get('/admin/portfolio/edit/{id}', [AdminController::class, 'EditPortfolio'])->name('portfolio.edit');
Route::post('/admin/portfolio/update/{id}', [AdminController::class, 'UpdatePortfolio']);
Route::get('/admin/portfolio/delete/{id}', [AdminController::class, 'DeletePortfolio']);

//AdminContact Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/contact/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/admin/contact/add', [ContactController::class, 'AddContact'])->name('admin.contact.add');
Route::post('/admin/contact/store', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/admin/contact/edit/{id}', [ContactController::class, 'Edit'])->name('contact.edit');
Route::post('/admin/contact/update/{id}', [ContactController::class, 'Update']);
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'Delete']);
Route::get('/admin/message/delete/{id}', [ContactController::class, 'DeleteMessage']);

//AdminProfile Route
Route::get('/admin/profile_form', [AdminController::class, 'Profile'])->name('form.my_profile');
Route::get('/admin/password_form', [AdminController::class, 'PasswordForm'])->name('form.change_password');
Route::post('/admin/update_profile', [AdminController::class, 'UpdateProfile'])->name('update_profile');
Route::post('/admin/change_password', [AdminController::class, 'ChangePassword'])->name('change_password');

//Header Page Route
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
Route::post('/weather/input', [WeatherController::class, 'input'])->name('weather.input');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'form'])->name('contact.form');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // $users = User::all();

        // $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
