<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\website\BlogController;
use App\Http\Controllers\website\FaqsController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\companyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\Admin\CalendarController;

use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\Admin\IP_AddressController;
use App\Http\Controllers\website\CategoryController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\website\CarBookingController;
use App\Http\Controllers\website\CarListingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\website\JoinProgramController;
use App\Http\Controllers\website\WebsiteHomeController;
use App\Http\Controllers\website\ConfirmBookingController;
use App\Http\Controllers\website\carDetailController;

Route::middleware('LanguageMiddleware')->group(function(){
    Route::get('/change-language/{lang}', function ($lang) {
        Session::put('lang',$lang);
        return redirect()->back();
    })->name('change.language');
    
    // User Login Routes
    Route::get('admin', [DashboardController::class, 'index']);
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('IsAdmin:adminForm');
    Route::post('admin/login', [LoginController::class, 'login'])->middleware('IsAdmin:admin');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    Route::prefix('admin')->middleware(['auth','IsAdmin:admin'])->group(function(){
        //Dashborad
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('bookingDashboard', [DashboardController::class, 'bookingDashboard'])->name('bookingDashboard');
        //Users Routes
        Route::get('users', [userController::class, 'index'])->name('users');
        Route::get('createuser', [userController::class,'create'])->name('createUser');
        Route::post('storeuser', [userController::class,'store'])->name('storeUser');
        Route::get('edituser/{id}',[userController::class,'edit'])->name('editUser');
        Route::put('updateuser/{id}',[userController::class,'update'])->name('updateUser');
        Route::get('deleteuser/{id}',[userController::class,'destroy'])->name('deleteUser'); 
        //Companies Routes
        Route::get('companies', [companyController::class, 'index'])->name('companies');
        Route::get('createCompany', [companyController::class,'create'])->name('createCompany');
        Route::post('storeCompany', [companyController::class,'store'])->name('storeCompany');
        Route::get('editCompany/{id}',[companyController::class,'edit'])->name('editCompany');
        Route::put('updateCompany/{id}',[companyController::class,'update'])->name('updateCompany');
        Route::get('deleteCompany/{id}',[companyController::class,'destroy'])->name('deleteCompany');
        Route::get('pending',[companyController::class , 'pending'])->name('pending');
        Route::get('aprovePendingCompany/{id}',[companyController::class , 'aprovePending'])->name('aprovePendingCompany');
        //IP Routes
        Route::get('ipAddresses', [IP_AddressController::class , 'index'])->name('ipAddresses');
        Route::get('createIpAddress', [IP_AddressController::class, 'create'])->name('createIpAddress');
        Route::post('storeIpAddress', [IP_AddressController::class, 'store'])->name('storeIpAddress');
        Route::get('editIpAddress/{id}', [IP_AddressController::class , 'edit'])->name('editIpAddresses');
        Route::put('updateIpAddress/{id}', [IP_AddressController::class , 'update'])->name('updateIpAddresses');
        Route::get('deleteIpAddress/{id}', [IP_AddressController::class , 'destroy'])->name('deleteIpAddresses');
        //Settings
        Route::get('settings', [SettingsController::class , 'index'])->name('settings');
        //Activity Logs
        Route::get('activityLogs', [ActivityLogController::class, 'index'])->name('activityLogs');
        Route::delete('deleteAcvtivityLogs',[ActivityLogController::class, 'destroy'])->name('deleteAcvtivityLogs');
        //Calendar Routes
        Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
        //Route::get('/events', [EventController::class, 'index']); // Fetch events
        //Route::post('/events', [EventController::class, 'store']); // Add new event
       // Route::put('/events/{id}', [EventController::class, 'update']); // Update event
       // Route::delete('/events/{id}', [EventController::class, 'destroy']); // Delete event
       //Car Bookings Routes
       Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
       // Client Routes
       Route::get('client',[ClientController::class, 'index'])->name('client');
        // Financial History
        Route::get('earningSummary',[FinancialController::class, 'earningSummary'])->name('earningSummary');
        Route::get('transactionHistory',[FinancialController::class, 'transactionHistory'])->name('transactionHistory');
    });
});

//Auth Routes
// Auth::routes();
// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->middleware('guest');
// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request')->middleware('guest');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('guest');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset')->middleware('guest');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update')->middleware('guest');
// Email Verification Routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice')->middleware('auth');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('auth');








// Load carsRoutes
require base_path('routes/carsRoutes.php');    

//Lock Screen
Route::post('/lock-screen', function () {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        // Windows command to lock screen
        exec('rundll32.exe user32.dll,LockWorkStation');
    } elseif (PHP_OS === 'Darwin') {
        // macOS command to lock screen
        exec('osascript -e \'tell application "System Events" to start screen saver\'');
    } elseif (PHP_OS === 'Linux') {
        // Linux command to lock screen
        exec('gnome-screensaver-command -l');
    }
    return response()->json(['message' => 'Screen locked!']);
})->name('lock-screen');





// Route::get('/change-language/{lang}', function ($lang) {
//     if (in_array($lang, ['en', 'fr', 'ar','nl'])) {
//         // Set locale in session
//         Session::put('locale', $lang);
//         App::setLocale($lang);

//         // Update the .env file
//         setEnvironmentValue('APP_LOCALE', $lang);
        
//         // Reload configuration
//         config(['app.locale' => $lang]);

        
//     }
//     return redirect()->back();
// })->name('change.language');


// add routes of website by Farhan & Salman
Route::get('/', [WebsiteHomeController::class, 'showView']);
Route::get('/join-our-program', [JoinProgramController::class, 'joinView']);
Route::get('/blog', [BlogController::class, 'blogView']);
Route::get('/faqs', [FaqsController::class, 'faqView']);
Route::get('/about-us', [AboutController::class, 'aboutView']);
Route::get('/contact', [ContactController::class, 'contactView']);
Route::get('/carbooking', [CarBookingController::class, 'carBookingView']);
Route::get('/confirmation', [ConfirmBookingController::class, 'confirmBookingView']);
Route::get('/checkout', [CheckoutController::class, 'checkoutView']);

Route::get('/cardetail/{id}', [CarDetailController::class, 'cardetailView'])->name('car.detail');

// categories routes
Route::get('/categories', [CategoryController::class, 'categoryView']);
Route::get('/load-more-category-cars', [CategoryController::class, 'loadMoreCategoryCars'])->name('load.more.category.cars');
// end categories

// car listing routes
Route::get('/carlisting', [CarListingController::class, 'carListingView'])->name('car.listing');
Route::get('/load-more-cars', [CarListingController::class, 'loadMoreCars'])->name('load.more.cars');

// end car listing routes