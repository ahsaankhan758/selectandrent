<?php



use App\Http\Controllers\Admin\CustomerReviewController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\website\FaqsController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\companyController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\Admin\AnalyticController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\Cars\CarController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ReminderController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\website\CarRegController;
use App\Http\Controllers\website\ReviewController;
use App\Http\Controllers\website\SigninController;
use App\Http\Controllers\website\SignupController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\Admin\AdminPaymentGateways;
use App\Http\Controllers\Admin\IP_AddressController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\usersignupController;
use App\Http\Controllers\website\CategoryController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\adminReviewController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\website\carDetailController;
use App\Http\Controllers\website\CarSearchController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\website\CarBookingController;
use App\Http\Controllers\website\CarListingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\website\CarRegisterController;
use App\Http\Controllers\Website\EditProfileController;
use App\Http\Controllers\website\JoinProgramController;
use App\Http\Controllers\website\WebsiteBlogController;
use App\Http\Controllers\website\WebsiteHomeController;
use App\Http\Controllers\website\ConfirmBookingController;
use App\Http\Controllers\website\WebsiteBookingController;
use App\Http\Controllers\website\PaymentGatewaysController;
use App\Http\Controllers\website\WebsiteCurrencyController;
use App\Http\Controllers\website\WebsiteDashboardController;
use App\Http\Controllers\admin\GeneralModuleController;


Route::middleware('LanguageMiddleware')->group(function(){
    Route::get('/change-language/{lang}',[LanguageController::class, 'setLanguage'])->name('change.language');
    // Logout
    Route::any('logout', [userController::class, 'logout'])->name('logout')->middleware('auth');
    // Admin Login Routes
    Route::get('admin', [DashboardController::class, 'index']);
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('IsAdmin:adminForm');
    Route::post('admin/login', [LoginController::class, 'login'])->middleware('IsAdmin:admin');

   
    //Company Login
    Route::get('company',[companyController::class, 'redirectToCompanyLogin']);
    Route::get('company/login',[companyController::class, 'showLoginForm'])->name('companyLoginForm')->middleware('IsAdmin:company');
    Route::post('company/login', [LoginController::class, 'login'])->name('companyLogin')->middleware('IsAdmin:company');

    //Employee Login
    Route::get('employee',[EmployeeController::class, 'redirectToEmployeeLogin']);
    Route::get('employee/login',[EmployeeController::class, 'showLoginForm'])->name('employeeLoginForm')->middleware('IsAdmin:employeeForm');
    Route::post('employee/login', [LoginController::class, 'login'])->name('employeeLogin')->middleware('IsAdmin:employee');

    //User Login
    Route::post('user/signin', [SigninController::class, 'signin'])->name('user.signin')->middleware('IsUser');

    // User Register
    Route::post('user/signup', [SignupController::class, 'signup'])->name('user.signup');
    Route::get('/confirm-email/{token}', [SignupController::class, 'confirm'])->name('confirm.email');

    // To Get Current Prefix of URL
    $currentPrefix = request()->segment(1);
   
    if($currentPrefix == 'company'){
        Route::prefix('company')->middleware(['auth','IsAdmin:company'])->group(function(){
            Route::get('/edit-profile/{id}', [ProfileController::class, 'editProfile'])->name('admin.edit_profile');
            Route::post('/edit-profile/{id}', [ProfileController::class, 'updateProfile'])->name('admin.update_profile');
            //Dashboard
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::get('bookingDashboard', [DashboardController::class, 'bookingDashboard'])->name('bookingDashboard');
            Route::get('booking-overview', [DashboardController::class, 'BookingsOverview'])->name('bookingOverviewDataRoute');
            Route::get('/car-booking-detail/{id}', [BookingController::class, 'carBookingDetail'])->name('car.booking.detail');

        // reminder
            Route::get('/reminders', [ReminderController::class, 'show'])->name('reminder');
            Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
            Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
            Route::get('/reminders/{id}', [ReminderController::class, 'edit'])->name('reminders.edit');
            Route::put('/reminders/{id}', [ReminderController::class, 'update'])->name('reminders.update');
            Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');

            //Employees
            Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
            Route::get('create', [EmployeeController::class,'create'])->name('createEmployee');
            Route::post('storeEmployee', [EmployeeController::class,'store'])->name('storeEmployee');
            Route::get('edit/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
            Route::put('update/{id}',[EmployeeController::class,'update'])->name('updateEmployee');
            Route::get('delete/{id}',[EmployeeController::class,'destroy'])->name('deleteEmployee'); 
            // Companies Routes
            Route::get('companies', [companyController::class, 'index'])->name('companies');
            Route::get('createCompany', [companyController::class,'create'])->name('createCompany');
            Route::post('storeCompany', [companyController::class,'store'])->name('storeCompany');
            Route::get('editCompany/{id}',[companyController::class,'edit'])->name('editCompany');
            Route::put('updateCompany/{id}',[companyController::class,'update'])->name('updateCompany');
            Route::get('deleteCompany/{id}',[companyController::class,'destroy'])->name('deleteCompany');
             //Calendar Routes
            Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
            Route::get('/getVehicles', [CalendarController::class, 'getVehicles'])->name('getVehicles'); 
            Route::post('/storeVehicle', [CalendarController::class, 'store'])->name('storeVehicle');
            Route::put('/updateVehicle', [CalendarController::class, 'update'])->name('updateVehicle');
            Route::delete('/deleteVehicle', [CalendarController::class, 'delete'])->name('deleteVehicle');
            Route::post('/updateEventDate', [CalendarController::class, 'updateEventDate']);
            // review
            Route::get('/reviews/vehicle', [adminReviewController::class, 'vehicleReview'])->name('reviews.vehicle');
            
             //Car Bookings Routes
            Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
            // Financial History
            Route::get('financial',[FinancialController::class, 'earningSummary'])->name('earningSummary');
            Route::get('/orders-status-data', [FinancialController::class, 'getOrderStatusData'])->name('orders.status.data');
            Route::get('/bookings/chart-data', [FinancialController::class, 'getChartData'])->name('bookings.chart-data');
            Route::get('/earnings-data', [FinancialController::class, 'getEarningsData'])->name('earnings.data');
            Route::post('/booking/pickup/{id}', [FinancialController::class, 'markPickup'])->name('booking.pickup');
            Route::post('/booking/dropoff/{id}/{vehicle_id}', [FinancialController::class, 'markDropoff'])->name('booking.dropoff');

            Route::get('/reviews/vehicle', [adminReviewController::class, 'vehicleReview'])->name('reviews.vehicle');
            // Client Routes
            Route::get('client',[ClientController::class, 'index'])->name('client');
            //Activity Logs
            Route::get('activityLogs', [ActivityLogController::class, 'index'])->name('activityLogs');
            Route::delete('deleteAcvtivityLogs',[ActivityLogController::class, 'destroy'])->name('deleteAcvtivityLogs');
            // notifications by ak
            Route::get('/notifications/clear', [NotificationController::class, 'clear'])->name('notifications.clear');
            Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
            Route::get('/notifications/all', [NotificationController::class, 'notificationView'])->name('notifications.all');
            Route::get('/notifications/getNotifications', [NotificationController::class, 'getNotifications'])->name('notifications.get');
            // Permissions
            Route::get('permissions/{role}',[PermissionController::class, 'index'])->name('permissions');
            Route::get('getUsersList',[PermissionController::class, 'selectedUsersList'])->name('getUsersList');
            Route::put('storePermissions', [PermissionController::class, 'store'])->name('storePermissions');   
            Route::get('getUserPermissions',[PermissionController::class, 'getUserPermissions'])->name('getUserPermissions');

            //Invoice
            Route::get('/booking/invoice/{id}', [FinancialController::class, 'invoice'])->name('booking.invoice');

            //Customer Review
            Route::post('/store', [CustomerReviewController::class, 'store'])->name('storeCustomerReview');
            Route::get('/customerReviews', [CustomerReviewController::class, 'index'])->name('customerReview');
        });
    }

    if($currentPrefix == 'admin'){
        Route::prefix('admin')->middleware(['auth','IsAdmin:admin'])->group(function(){


            // general module
             Route::get('/general-module/create', [GeneralModuleController::class, 'create'])->name('general-module.create');
    Route::post('/general-module/store', [GeneralModuleController::class, 'store'])->name('general-module.store');

            Route::get('/edit-profile/{id}', [ProfileController::class, 'editProfile'])->name('admin.edit_profile');
            Route::post('/edit-profile/{id}', [ProfileController::class, 'updateProfile'])->name('admin.update_profile');
            // analytics page
            Route::get('/analytics', [AnalyticController::class, 'index'])->name('Analytics');
            //Dashborad
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
          
            Route::get('bookingDashboard', [DashboardController::class, 'bookingDashboard'])->name('bookingDashboard');
            Route::get('booking-overview', [DashboardController::class, 'BookingsOverview'])->name('bookingOverviewDataRoute');
            Route::get('/car-booking-detail/{id}', [BookingController::class, 'carBookingDetail'])->name('car.booking.detail');
            Route::get('/booking/invoice/{id}', [FinancialController::class, 'invoice'])->name('booking.invoice');
            //Users Routes
            Route::get('users', [userController::class, 'index'])->name('users');
            Route::get('createuser', [userController::class,'create'])->name('createUser');
            Route::post('storeuser', [userController::class,'store'])->name('storeUser');
            Route::get('edituser/{id}',[userController::class,'edit'])->name('editUser');
            Route::put('updateuser/{id}',[userController::class,'update'])->name('updateUser');
            Route::get('deleteuser/{id}',[userController::class,'destroy'])->name('deleteUser'); 
            //Employees
            Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
            Route::get('create', [EmployeeController::class,'create'])->name('createEmployee');
            Route::post('storeEmployee', [EmployeeController::class,'store'])->name('storeEmployee');
            Route::get('edit/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
            Route::put('update/{id}',[EmployeeController::class,'update'])->name('updateEmployee');
            Route::get('delete/{id}',[EmployeeController::class,'destroy'])->name('deleteEmployee'); 
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
            // Contact us 
            Route::get('/contact', [AdminContactController::class, 'received'])->name('contact.received');
            Route::delete('deleteContact',[AdminContactController::class, 'delete'])->name('deleteContact');
            //Calendar Routes
            Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
            Route::get('/getVehicles', [CalendarController::class, 'getVehicles'])->name('getVehicles'); 
            Route::post('/storeVehicle', [CalendarController::class, 'store'])->name('storeVehicle');
            Route::put('/updateVehicle', [CalendarController::class, 'update'])->name('updateVehicle');
            Route::delete('/deleteVehicle', [CalendarController::class, 'delete'])->name('deleteVehicle');
            Route::post('/updateEventDate', [CalendarController::class, 'updateEventDate']);
            //Car Bookings Routes
            Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
            // Client Routes
            Route::get('client',[ClientController::class, 'index'])->name('client');
            Route::get('usersignup', [usersignupController::class, 'showSignupForm'])->name('usersignup');
            // Blogs added by farhan
            Route::get('blog/create', [AdminBlogController::class, 'createBlog'])->name('blogs.createBlog');
            Route::post('blog/store', [AdminBlogController::class, 'store'])->name('blogs.store');   
            Route::get('blog/detail', [AdminBlogController::class, 'getBlogDetail'])->name('blogs.blogDetail');
            Route::get('blog/edit/{id}', [AdminBlogController::class, 'edit'])->name('blogs.edit');
            Route::put('blog/update/{id}', [AdminBlogController::class, 'update'])->name('blogs.update');
            Route::get('blog/{id}', [AdminBlogController::class, 'delete'])->name('blogs.destroy');
            // end blog
            // Financial History
            Route::get('financial',[FinancialController::class, 'earningSummary'])->name('earningSummary');
            Route::get('/orders-status-data', [FinancialController::class, 'getOrderStatusData'])->name('orders.status.data');
            Route::get('/bookings/chart-data', [FinancialController::class, 'getChartData'])->name('bookings.chart-data');
            Route::get('/earnings-data', [FinancialController::class, 'getEarningsData'])->name('earnings.data');
            Route::post('/booking/pickup/{bookingItemId}', [FinancialController::class, 'markPickup'])->name('booking.pickup');

            Route::post('/booking/dropoff/{id}/{vehicle_id}', [FinancialController::class, 'markDropoff'])->name('booking.dropoff');


            // reminder
            Route::get('/reminders', [ReminderController::class, 'show'])->name('reminder');
            Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
            Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
            Route::get('/reminders/{id}', [ReminderController::class, 'edit'])->name('reminders.edit');
            Route::put('/reminders/{id}', [ReminderController::class, 'update'])->name('reminders.update');
            Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');
            // review
            Route::get('/reviews/vehicle', [adminReviewController::class, 'vehicleReview'])->name('reviews.vehicle');

            
            // Permissions
            Route::get('permissions/{role}',[PermissionController::class, 'index'])->name('permissions');
            Route::get('getUsersList',[PermissionController::class, 'selectedUsersList'])->name('getUsersList');
            Route::put('storePermissions', [PermissionController::class, 'store'])->name('storePermissions');   
            Route::get('getUserPermissions',[PermissionController::class, 'getUserPermissions'])->name('getUserPermissions');
            // Admin payment gateways
            Route::get('paymentgateway',[AdminPaymentGateways::class, 'index'])->name('paymentGateway');
            Route::get('payment-gateways/{id}', [AdminPaymentGateways::class, 'getGateway'])->name('admin.payment-gateways.get');
            Route::post('payment-gateways/{id}', [AdminPaymentGateways::class, 'update'])->name('admin.payment-gateways.update');
            Route::post('/admin/payment-gateways/store', [AdminPaymentGateways::class, 'storeGatewayName'])->name('admin.payment-gateways.store');
            //Currencies
            Route::get('currencies',[CurrencyController::class, 'index'])->name('currencies');
            Route::get('createCurrency',[CurrencyController::class, 'create'])->name('createCurrency');
            Route::post('storeCurrency', [CurrencyController::class, 'store'])->name('storeCurrency');   
            Route::get('editCurrency/{id}', [CurrencyController::class, 'edit'])->name('editCurrency');
            Route::put('updateCurrency/{id}', [CurrencyController::class, 'update'])->name('updateCurrency');
            Route::get('deleteCurrency/{id}', [CurrencyController::class, 'delete'])->name('deleteCurrency');
             // notifications by ak
            Route::get('/notifications/clear', [NotificationController::class, 'clear'])->name('notifications.clear');
            Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
            Route::get('/notifications/all', [NotificationController::class, 'notificationView'])->name('notifications.all');
            Route::get('/notifications/getNotifications', [NotificationController::class, 'getNotifications'])->name('notifications.get');
            //Customer Review
            Route::post('/store', [CustomerReviewController::class, 'store'])->name('storeCustomerReview');
            Route::get('/customerReviews', [CustomerReviewController::class, 'index'])->name('customerReview');
        });
    }

    if($currentPrefix == 'employee'){
        Route::prefix('employee')->middleware(['auth','IsAdmin:employee'])->group(function(){
            Route::get('/edit-profile/{id}', [ProfileController::class, 'editProfile'])->name('admin.edit_profile');
            Route::post('/edit-profile/{id}', [ProfileController::class, 'updateProfile'])->name('admin.update_profile');
            // analytics page
            Route::get('/analytics', [AnalyticController::class, 'index'])->name('Analytics');
            //Dashborad
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
          

              // reminder
            Route::get('/reminders', [ReminderController::class, 'show'])->name('reminder');
            Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
            Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
            Route::get('/reminders/{id}', [ReminderController::class, 'edit'])->name('reminders.edit');
            Route::put('/reminders/{id}', [ReminderController::class, 'update'])->name('reminders.update');
            Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');

            Route::get('bookingDashboard', [DashboardController::class, 'bookingDashboard'])->name('bookingDashboard');
            Route::get('booking-overview', [DashboardController::class, 'BookingsOverview'])->name('bookingOverviewDataRoute');
            Route::get('/car-booking-detail/{id}', [BookingController::class, 'carBookingDetail'])->name('car.booking.detail');
            //Users Routes
            Route::get('users', [userController::class, 'index'])->name('users');
            Route::get('createuser', [userController::class,'create'])->name('createUser');
            Route::post('storeuser', [userController::class,'store'])->name('storeUser');
            Route::get('edituser/{id}',[userController::class,'edit'])->name('editUser');
            Route::put('updateuser/{id}',[userController::class,'update'])->name('updateUser');
            Route::get('deleteuser/{id}',[userController::class,'destroy'])->name('deleteUser'); 
            //Employees
            Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
            Route::get('create', [EmployeeController::class,'create'])->name('createEmployee');
            Route::post('store', [EmployeeController::class,'store'])->name('storeEmployee');
            Route::get('edit/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
            Route::put('update/{id}',[EmployeeController::class,'update'])->name('updateEmployee');
            Route::get('delete/{id}',[EmployeeController::class,'destroy'])->name('deleteEmployee'); 
            
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
            // Contact us 
            Route::get('/contact', [AdminContactController::class, 'received'])->name('contact.received');
            Route::delete('deleteContact',[AdminContactController::class, 'delete'])->name('deleteContact');
            //Calendar Routes
            Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
            Route::get('/getVehicles', [CalendarController::class, 'getVehicles'])->name('getVehicles'); 
            Route::post('/storeVehicle', [CalendarController::class, 'store'])->name('storeVehicle');
            Route::put('/updateVehicle', [CalendarController::class, 'update'])->name('updateVehicle');
            Route::delete('/deleteVehicle', [CalendarController::class, 'delete'])->name('deleteVehicle');
            Route::post('/updateEventDate', [CalendarController::class, 'updateEventDate']);
            //Car Bookings Routes
            Route::get('carBooking',[BookingController::class, 'index'])->name('carBooking');
            // Client Routes
            Route::get('client',[ClientController::class, 'index'])->name('client');
            Route::get('usersignup', [usersignupController::class, 'showSignupForm'])->name('usersignup');
            // Blogs added by farhan
            Route::get('blog/create', [AdminBlogController::class, 'createBlog'])->name('blogs.createBlog');
            Route::post('blog/store', [AdminBlogController::class, 'store'])->name('blogs.store');   
            Route::get('blog/detail', [AdminBlogController::class, 'getBlogDetail'])->name('blogs.blogDetail');
            Route::get('blog/edit/{id}', [AdminBlogController::class, 'edit'])->name('blogs.edit');
            Route::put('blog/update/{id}', [AdminBlogController::class, 'update'])->name('blogs.update');
            Route::get('blog/{id}', [AdminBlogController::class, 'delete'])->name('blogs.destroy');
            // end blog
            // Financial History
            Route::get('financial',[FinancialController::class, 'earningSummary'])->name('earningSummary');
            Route::get('/orders-status-data', [FinancialController::class, 'getOrderStatusData'])->name('orders.status.data');
            Route::get('/bookings/chart-data', [FinancialController::class, 'getChartData'])->name('bookings.chart-data');
            Route::get('/earnings-data', [FinancialController::class, 'getEarningsData'])->name('earnings.data');
            // Permissions
            Route::get('permissions/{role}',[PermissionController::class, 'index'])->name('permissions');
            Route::get('getUsersList',[PermissionController::class, 'selectedUsersList'])->name('getUsersList');
            Route::put('storePermissions', [PermissionController::class, 'store'])->name('storePermissions');   
            Route::get('getUserPermissions',[PermissionController::class, 'getUserPermissions'])->name('getUserPermissions');

            // Admin payment gateways
            Route::get('paymentgateway',[AdminPaymentGateways::class, 'index'])->name('paymentGateway');
            Route::get('payment-gateways/{id}', [AdminPaymentGateways::class, 'getGateway'])->name('admin.payment-gateways.get');
            Route::post('payment-gateways/{id}', [AdminPaymentGateways::class, 'update'])->name('admin.payment-gateways.update');
            Route::post('/admin/payment-gateways/store', [AdminPaymentGateways::class, 'storeGatewayName'])->name('admin.payment-gateways.store');

            //Currencies
            Route::get('currencies',[CurrencyController::class, 'index'])->name('currencies');
            Route::get('createCurrency',[CurrencyController::class, 'create'])->name('createCurrency');
            Route::post('storeCurrency', [CurrencyController::class, 'store'])->name('storeCurrency');   
            Route::get('editCurrency/{id}', [CurrencyController::class, 'edit'])->name('editCurrency');
            Route::put('updateCurrency/{id}', [CurrencyController::class, 'update'])->name('updateCurrency');
            Route::get('deleteCurrency/{id}', [CurrencyController::class, 'delete'])->name('deleteCurrency');

             // notifications by ak
            Route::get('/notifications/clear', [NotificationController::class, 'clear'])->name('notifications.clear');
            Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
            Route::get('/notifications/all', [NotificationController::class, 'notificationView'])->name('notifications.all');
            Route::get('/notifications/getNotifications', [NotificationController::class, 'getNotifications'])->name('notifications.get');

            //Customer Review
            Route::post('/store', [CustomerReviewController::class, 'store'])->name('storeCustomerReview');
            Route::get('/customerReviews', [CustomerReviewController::class, 'index'])->name('customerReview');

        });
    }
    // add routes of website by Farhan & Salman

    Route::get('/edit-profile/{id}', [EditProfileController::class, 'editProfile'])->name('website.edit_profile');
    Route::post('/edit-profile/{id}', [EditProfileController::class, 'updateProfile'])->name('website.update_profile');

    Route::get('/', [WebsiteHomeController::class, 'showView']);
    Route::post('/car-search', [WebsiteHomeController::class, 'search'])->name('car.search');
    Route::get('/car-brands', [WebsiteHomeController::class, 'getCarBrands'])->name('car.brands');
    Route::get('/join-our-program', [JoinProgramController::class, 'joinView']);
    Route::get('/faqs', [FaqsController::class, 'faqView']);
    Route::get('/about-us', [AboutController::class, 'aboutView']);
    Route::get('/contact', [ContactController::class, 'contactView'])->name('contact');
    Route::post('/contact-submit', [ContactController::class, 'submit'])->name('website.contact');
    Route::get('/carbooking', [CarBookingController::class, 'carBookingView'])->name('car.booking');
    // by ak
    Route::post('/addToCart', [CarBookingController::class, 'addToCart'])->name('cart.carAdd');
    Route::get('/clear-cart', [CarBookingController::class, 'clearCart'])->name('clear.cart');
    Route::post('/cart/remove', [CarBookingController::class, 'removeItemFromCart'])->name('cart.remove');
    Route::any('/update-cart-price', [CarBookingController::class, 'updatePrice']);


    Route::post('/payment/create-payment-checkout', [PaymentGatewaysController::class, 'redirectToPaymentCheckout'])->name('booking.payment');
    Route::get('/payment/booking-cancel', [PaymentGatewaysController::class, 'cancelPayment'])->name('booking.cancel');

    Route::get('/terms&conditions', function () {
        return view('website.terms&condition');
    });
     Route::get('/privacy-policy', function () {
        return view('website.privacypolicy');
    });
    // 
    Route::any('/confirmation', [ConfirmBookingController::class, 'confirmBookingView'])->name('booking.confirmation');
    Route::get('/payment/thankyou', [CheckoutController::class, 'checkoutView'])->name('booking.thankyou');
    Route::get('/cardetail/{id}', [CarDetailController::class, 'cardetailView'])->name('car.detail');
    // categories routes
    Route::get('/categories', [CategoryController::class, 'categoryView']);
    Route::get('/load-more-category-cars', [CategoryController::class, 'loadMoreCategoryCars'])->name('load.more.category.cars');
    // end categories
    // car listing routes
    Route::get('/carlisting', [CarListingController::class, 'carListingView'])->name('car.listing');
    Route::get('/load-more-cars', [CarListingController::class, 'loadMoreCars'])->name('load.more.cars');
    Route::get('/get-car-models', [CarListingController::class, 'getCarModels'])->name('get.car.models');
    Route::any('/search-locations', [CarListingController::class, 'searchLocations'])->name('search.locations');
    // end car listing routes
    Route::get('/get-locations/{city_id}', [CarController::class, 'getLocations']);
    // added by farhan
    Route::get('/blog', [WebsiteBlogController::class, 'blogView']);
    Route::get('/load-more-blogs', [WebsiteBlogController::class, 'loadMoreBlogs'])->name('load.more.blogs');
    Route::get('/blog-detail/{id}', [WebsiteBlogController::class, 'blogDetail'])->name('blog.detail');
    // car register by farhan
    Route::get('/register-with-car-rental', [CarRegisterController::class, 'CarRegisterView']);
    Route::post('/register-car-rental', [CarRegisterController::class, 'carRegStore'])->name('website.register');
    // car search page by farhan
    Route::get('/carsearch', [CarSearchController::class, 'CarSearchView'])->name('website.carsearch');
    Route::get('/fetch-models', [CarSearchController::class, 'fetchModels'])->name('fetch.models');

    // email template
    // Route::get('/email-template', function () {
    //     return view('website.emailtemplate');
    // });
    Route::get('/verify/{id}/{hash}', [CarRegisterController::class, 'carRegStore'])->name('verification.verify');

    //Currency
    Route::get('setDefaultCurreny/{id}', [WebsiteCurrencyController::class, 'setDefaultCurreny'])->name('setDefaultCurreny');


    // booking page website
    Route::get('/booking', [WebsiteBookingController::class, 'index'])->name('website.booking');
    Route::get('/booking-detail/{id}', [WebsiteBookingController::class, 'show'])->name('website.bookingdetail');
    // website review save
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');


    // dashboard page website
    Route::get('/dashboard', [WebsiteDashboardController::class, 'index'])->name('website.dashboard');


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

// for analytics
Route::post('/track-click', [ActivityController::class, 'trackClick']);

});
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
