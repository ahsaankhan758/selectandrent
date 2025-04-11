<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Car;
use App\Models\CarLocation;

class CarBookingController extends Controller
{
    public function carBookingView()
    {
        $cartItems = Cart::instance('cart')->content();
        // echo "<pre>";
        // print_r($cartItems);die;
        $vehicleLocation = CarLocation::all();
        return view('website.car-booking',compact('cartItems','vehicleLocation')); 
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $vehicle = Car::findOrFail($id);

        // Get existing cart content
        $cartItems = Cart::instance('cart')->content();

        // Check if cart has any item
        if ($cartItems->isNotEmpty()) {
            // Get the first cart item
            $existingItem = $cartItems->first();

            // If the same car is already in the cart, do nothing
            if ($existingItem->id == $vehicle->id) {
                return redirect('/carbooking')->with('message', 'This car is already exist in your cart.');; // silently redirect, no message
            }

            // If different car is in cart, clear the cart
            Cart::instance('cart')->destroy();
        }

        // Add new car to cart
        Cart::instance('cart')->add(
            $vehicle->id,
            $vehicle->car_models->name,
            1,
            $vehicle->rent,
            [
                'user_id' => $vehicle->user_id,
                'car_category' => $vehicle->car_categories->name,
                'car_location_id' => $vehicle->car_location_id,
                'car_location' => $vehicle->car_locations->city,
                'car_model_id' => $vehicle->car_model_id,
                'car_model' => $vehicle->car_models->name,
                'car_brand' => $vehicle->car_models->car_brands->name,
                'year' => $vehicle->year,
                'postal_code' => $vehicle->car_locations->postal_code,
                'beam' => $vehicle->beam,
                'transmission' => $vehicle->transmission,
                'seats' => $vehicle->seats,
                'weight' => $vehicle->weight,
                'doors' => $vehicle->doors,
                'mileage' => $vehicle->mileage,
                'engine_size' => $vehicle->engine_size,
                'detail' => $vehicle->detail,
                'luggage' => $vehicle->luggage,
                'drive' => $vehicle->drive,
                'fuel_economy' => $vehicle->fuel_economy,
                'fuel_type' => $vehicle->fuel_type,
                'exterior_color' => $vehicle->exterior_color,
                'interior_color' => $vehicle->interior_color,
                'lisence_plate' => $vehicle->lisence_plate,
                'thumbnail' => $vehicle->thumbnail,
                'images' => $vehicle->images,
                'features' => $vehicle->features,
                'created_at' => $vehicle->created_at,
                'updated_at' => $vehicle->updated_at
            ]
        )->associate('App\Models\Car');

        return redirect('/carbooking')->with('success', 'Car added to cart successfully.');
    }


    public function clearCart(Request $request)
    {
        Cart::instance('cart')->destroy();
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

        
}
