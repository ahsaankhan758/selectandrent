<?php
use App\Http\Controllers\Admin\Cars\CarFeatureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Cars\CarController;
use App\Http\Controllers\Admin\Cars\CarBrandController;
use App\Http\Controllers\Admin\Cars\CarCategoryController;
use App\Http\Controllers\Admin\Cars\CarLocationController;
use App\Http\Controllers\Admin\Cars\CarModelController;

Route::middleware('LanguageMiddleware')->group(function(){
    Route::get('/change-language/{lang}', function ($lang) {
        Session::put('lang',$lang);
        return redirect()->back();
    })->name('change.language');

    // To Get Current Prefix of URL
    $currentPrefix = request()->segment(1);
   
    if($currentPrefix == 'company'){
        Route::prefix('company')->middleware(['CompanyAuth','IsAdmin:company'])->group(function(){
            //Car Lisitng Routes
            Route::get('carListings',[CarController::class, 'Index'])->name('carListings');
            Route::get('createCar', [CarController::class,'create'])->name('createCar');
            Route::post('storeCar', [CarController::class,'store'])->name('storeCar');
            Route::get('editCar/{id}',[CarController::class,'edit'])->name('editCar');
            Route::put('updateCar/{id}',[CarController::class,'update'])->name('updateCar');
            Route::get('deleteCar/{id}',[CarController::class,'destroy'])->name('deleteCar');
            //Car Location Routes
            Route::get('carLocations',[CarLocationController::class, 'Index'])->name('carLocations');
            Route::post('addCarLocation',[CarLocationController::class,'store'])->name('addCarLocation');
            Route::get('deleteCarLocation/{id}',[CarLocationController::class, 'destroy'])->name('deleteCarLocation');
        
        });
    }
    if($currentPrefix == 'admin'){
    Route::prefix('admin')->middleware(['auth','IsAdmin:admin'])->group(function(){
        // Car Lisitng Routes
        Route::get('carListings',[CarController::class, 'Index'])->name('carListings');
        Route::get('createCar', [CarController::class,'create'])->name('createCar');
        Route::post('storeCar', [CarController::class,'store'])->name('storeCar');
        Route::get('editCar/{id}',[CarController::class,'edit'])->name('editCar');
        Route::put('updateCar/{id}',[CarController::class,'update'])->name('updateCar');
        Route::get('deleteCar/{id}',[CarController::class,'destroy'])->name('deleteCar');
        //Car Brand Routes
        Route::get('carBrands',[CarBrandController::class, 'Index'])->name('carBrands');
        Route::post('addCarBrand',[CarBrandController::class,'store'])->name('addCarBrand');
        Route::get('deleteCarBrand/{id}',[CarBrandController::class, 'destroy'])->name('deleteCarBrand');
        //Car Category Routes
        Route::get('carCategories',[CarCategoryController::class, 'Index'])->name('carCategories');
        Route::post('addCarCategory',[CarCategoryController::class,'store'])->name('addCarCategory');
        Route::get('deleteCarCategory/{id}',[CarCategoryController::class, 'destroy'])->name('deleteCarCategory');
        //Car Location Routes
        Route::get('carLocations',[CarLocationController::class, 'Index'])->name('carLocations');
        Route::post('addCarLocation',[CarLocationController::class,'store'])->name('addCarLocation');
        Route::get('deleteCarLocation/{id}',[CarLocationController::class, 'destroy'])->name('deleteCarLocation');
        //Car Modle Routes
        Route::get('carModels',[CarModelController::class, 'Index'])->name('carModels');
        Route::post('addCarModel',[CarModelController::class,'store'])->name('addCarModel');
        Route::get('deleteCarModel/{id}',[CarModelController::class, 'destroy'])->name('deleteCarModel');
        //Car Featres Routes
        Route::get('carFeatures',[CarFeatureController::class, 'index'])->name('carFeatures');
        Route::post('addCarFeature',[CarFeatureController::class,'store'])->name('addCarFeature');
        Route::get('deleteCarFeature/{id}',[CarFeatureController::class, 'destroy'])->name('deleteCarFeature');
    });
    }
});