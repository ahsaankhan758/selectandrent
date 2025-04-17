<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\website\FaqsController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\companyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\SigninController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\website\CarRegController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\Admin\IP_AddressController;
use App\Http\Controllers\website\CategoryController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\website\carDetailController;
use App\Http\Controllers\website\CarSearchController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\website\CarBookingController;
use App\Http\Controllers\website\CarListingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\website\CarRegisterController;
use App\Http\Controllers\website\JoinProgramController;
use App\Http\Controllers\website\WebsiteBlogController;
use App\Http\Controllers\website\WebsiteHomeController;
use App\Http\Controllers\website\ConfirmBookingController;


Route::middleware('LanguageMiddleware')->group(function(){
    Route::get('/change-language/{lang}', function ($lang) {
        Session::put('lang',$lang);
        return redirect()->back();
    })->name('change.language');
    
    
    // Admin Login Routes
    Route::get('admin', [DashboardController::class, 'index']);
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('IsAdmin:adminForm');
    Route::post('admin/login', [LoginController::class, 'login'])->middleware('IsAdmin:admin');
    Route::post('logout', [userController::class, 'logout'])->name('logout')->middleware('auth');

    //Company Login
    Route::get('company',[companyController::class, 'redirectToCompanyLogin']);
    Route::get('company/login',[companyController::class, 'showLoginForm'])->middleware('IsAdmin:company');
    Route::post('company/login', [LoginController::class, 'login'])->name('companyLogin')->middleware('IsAdmin:company');

    //User Login
    //Route::get('user/signin', [SigninController::class, 'login'])->name('userLogin')->middleware('IsAdmin:user');
    Route::post('user/signin', [SigninController::class, 'signin'])->name('user.signin')->middleware('IsUser');
    
    // To Get Current Prefix of URL
    $currentPrefix = request()->segment(1);
   
    if($currentPrefix == 'company'){
        Route::prefix('company')->middleware(['auth','IsAdmin:company'])->group(function(){
            //Dashboard
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::get('bookingDashboard', [DashboardController::class, 'bookingDashboard'])->name('bookingDashboard');
             //Calendar Routes
             Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
             Route::get('/getEvents', [EventController::class, 'index'])->name('getEvents'); // Fetch events
             Route::post('/storeEvents', [EventController::class, 'store'])->name('storeEvents'); // Add new event
             // Route::put('/events/{id}', [EventController::class, 'update']); // Update event
             // Route::delete('/events/{id}', [EventController::class, 'destroy']); // Delete event
             //Car Bookings Routes
            Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
            // Financial History
            Route::get('earningSummary',[FinancialController::class, 'earningSummary'])->name('earningSummary');
            Route::get('transactionHistory',[FinancialController::class, 'transactionHistory'])->name('transactionHistory');
            // Client Routes
            Route::get('client',[ClientController::class, 'index'])->name('client');
            //Activity Logs
            Route::get('activityLogs', [ActivityLogController::class, 'index'])->name('activityLogs');
            Route::delete('deleteAcvtivityLogs',[ActivityLogController::class, 'destroy'])->name('deleteAcvtivityLogs');
        });
    }

    if($currentPrefix == 'admin'){
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
            Route::get('/getEvents', [EventController::class, 'index'])->name('getEvents'); // Fetch events
            Route::post('/storeEvents', [EventController::class, 'store'])->name('storeEvents'); // Add new event
            // Route::put('/events/{id}', [EventController::class, 'update']); // Update event
            // Route::delete('/events/{id}', [EventController::class, 'destroy']); // Delete event
            //Car Bookings Routes
            Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
            // Client Routes
            Route::get('client',[ClientController::class, 'index'])->name('client');
            // Blogs added by farhan
            Route::get('blog/create', [AdminBlogController::class, 'createBlog'])->name('blogs.createBlog');
            Route::post('blog/store', [AdminBlogController::class, 'store'])->name('blogs.store');   
            Route::get('blog/detail', [AdminBlogController::class, 'getBlogDetail'])->name('blogs.blogDetail');
            Route::get('blog/edit/{id}', [AdminBlogController::class, 'edit'])->name('blogs.edit');
            Route::put('blog/update/{id}', [AdminBlogController::class, 'update'])->name('blogs.update');
            Route::get('blog/{id}', [AdminBlogController::class, 'delete'])->name('blogs.destroy');
            // end blog
            // Financial History
            Route::get('earningSummary',[FinancialController::class, 'earningSummary'])->name('earningSummary');
            Route::get('transactionHistory',[FinancialController::class, 'transactionHistory'])->name('transactionHistory');
        });
    }

    // add routes of website by Farhan & Salman
Route::get('/', [WebsiteHomeController::class, 'showView']);
Route::get('/join-our-program', [JoinProgramController::class, 'joinView']);
Route::get('/faqs', [FaqsController::class, 'faqView']);
Route::get('/about-us', [AboutController::class, 'aboutView']);
Route::get('/contact', [ContactController::class, 'contactView']);
Route::get('/carbooking', [CarBookingController::class, 'carBookingView'])->name('car.booking');
// by ak
Route::post('/addToCart', [CarBookingController::class, 'addToCart'])->name('cart.carAdd');
Route::get('/clear-cart', [CarBookingController::class, 'clearCart'])->name('clear.cart');
Route::post('/cart/remove', [CarBookingController::class, 'removeItemFromCart'])->name('cart.remove');
Route::any('/update-cart-price', [CarBookingController::class, 'updatePrice']);

// 
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
Route::get('/get-car-models', [CarListingController::class, 'getCarModels'])->name('get.car.models');
Route::get('/search-locations', [CarListingController::class, 'searchLocations'])->name('search.locations');
// end car listing routes
// added by farhan
Route::get('/blog', [WebsiteBlogController::class, 'blogView']);
Route::get('/load-more-blogs', [WebsiteBlogController::class, 'loadMoreBlogs'])->name('load.more.blogs');
Route::get('/blog-detail/{id}', [WebsiteBlogController::class, 'blogDetail'])->name('blog.detail');
// car register by farhan
Route::get('/register-car-rental', [CarRegisterController::class, 'CarRegisterView']);
Route::post('/register-car-rental', [CarRegisterController::class, 'carRegStore'])->name('website.register');
// car search page by farhan
Route::get('/carsearch', [CarSearchController::class, 'CarSearchView']);
Route::get('/fetch-models', [CarSearchController::class, 'fetchModels'])->name('fetch.models');

// email template
// Route::get('/email-template', function () {
//     return view('website.emailtemplate');
// });
Route::get('/verify/{id}/{hash}', [CarRegisterController::class, 'carRegStore'])->name('verification.verify');
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





