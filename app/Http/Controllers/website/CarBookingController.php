<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Car;
use App\Models\CarLocation;
use App\Models\Review;
use Laravel\Ui\Presets\React;
use Surfsidemedia\Shoppingcart\CartItem;

class CarBookingController extends Controller
{
    public function carBookingView()
    {
        $cartItems = Cart::instance('cart')->content();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $totalPriceIncludingTax = Cart::total();
        $cartItemsCount = Cart::instance('cart')->content()->count();
        // reviews avg rating in stars
        $averageRating = 0;
        if ($cartItemsCount > 0 && $cartItems->first()?->id) {
            $vehicleId = $cartItems->first()->id;
            $reviews = Review::with('user')->where('vehicle_id', $vehicleId)->orderBy('created_at', 'desc')->get();
            if ($reviews->isNotEmpty()) {
                $averageRating = round($reviews->avg('rating'), 1);
            }
        }

        $vehicleLocation = CarLocation::all();
        return view('website.bookings.booking-checkout',compact('cartItems','vehicleLocation', 'subtotal', 'tax','totalPriceIncludingTax','cartItemsCount', 'averageRating')); 
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $vehicle = Car::findOrFail($id);

        // Get all cart items
        $cartItems = Cart::instance('cart')->content();

        // Check if the same car already exists in the cart
        $alreadyInCart = $cartItems->count();
        // print_r($alreadyInCart);die;

        if ($alreadyInCart > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Remove existing product from cart before adding a new one.'
            ]);
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
                'vehicle_city' => $vehicle->car_locations->city->name,
                'vehicle_pickup_location' => $vehicle->car_locations->area_name,
                'vehicle_latitude' => $vehicle->car_locations->latitude,
                'vehicle_longitude' => $vehicle->car_locations->longitude,
                'car_model_id' => $vehicle->car_model_id,
                'min_age' => $vehicle->min_age,
                'car_model' => $vehicle->car_models->name,
                'car_brand' => $vehicle->car_models->car_brands->name,
                'year' => $vehicle->year,
                'postal_code' => $vehicle->car_locations->postal_code,
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

        return response()->json([
            'status' => 'success',
            'message' => 'Car added to cart successfully.'
        ]);
    }




    public function clearCart(Request $request)
    {
        Cart::instance('cart')->destroy();
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

    public function removeItemFromCart(Request $request)
    {
        // Get the rowId from the request
        $rowId = $request->input('rowId');

        // Check if the rowId is valid
        if (!$rowId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Row ID is missing',
            ], 400);
        }

        // Remove the item from the cart
        Cart::instance('cart')->remove($rowId);

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Item removed from cart',
        ]);
    }

    public function updatePrice(Request $request)
    {
        $validated = $request->validate([
            'rowId' => 'required|string',
            'price' => 'required|numeric|min:0',
            'days' => 'required|numeric|min:0',
        ]);

        $rowId = $validated['rowId'];
        $newPrice = $validated['price'];
        $qty = $validated['days'];
        
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId, $qty);
    
        if (!$item) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found.'], 404);
        }

        // extra details for total cart price
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $totalPriceIncludingTax = Cart::total();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Item Updated Successfully From Cart',
            'qty'=> $qty,
            'price'=> convertPrice($newPrice,0),
            'price_input'=> convertPrice($newPrice,0,0),
            'rowId'=> $rowId,
            'subtotal'=> convertPrice($subtotal,0),
            'subtotal_input'=> convertPrice($subtotal,0,0),
            'tax'=> convertPrice($tax,0),
            'tax_input'=> convertPrice($tax,0,0),
            'total'=> convertPrice($totalPriceIncludingTax,0),
            'total_input'=> convertPrice($totalPriceIncludingTax,0,0),
        ]);
    }
  
        
}
