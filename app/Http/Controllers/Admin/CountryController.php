<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    // Show list of countries
    public function index()
    {
        $countries = Country::orderBy('id', 'desc')->paginate(10);
        return view('admin.country.country', compact('countries'));
    }

    // Store a new country
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        Country::create([
            'name' => $request->name,
            'code' => $request->code,
            'status'=> '1',
        ]);

        return redirect()->route('countries.index')->with('status', 'Country added successfully.');
    }
      // Edit country
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit', compact('country'));
    }

    // Update country
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        $country = Country::findOrFail($id);
        $country->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('countries.index')->with('status', 'Country updated successfully.');
    }

    // Delete country
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('countries.index')->with('statusDanger', 'Country deleted successfully.');
    }
}

