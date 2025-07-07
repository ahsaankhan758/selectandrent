<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Auth;

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
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created Country [ Country Name : '.$request->name.' ] Successfully.';
        $action = 'Create';
        $module = 'Country';
        activityLog($userId, $desciption,$action,$module);
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
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated Country [ Country Name : '.$request->name.' ] Successfully.';
        $action = 'Update';
        $module = 'Country';
        activityLog($userId, $desciption,$action,$module);

        return redirect()->route('countries.index')->with('status', 'Country updated successfully.');
    }

    // Delete country
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted Country [ Country Name : '.$country->name.' ] Successfully.';
        $action = 'Delete';
        $module = 'Country';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('countries.index')->with('statusDanger', 'Country deleted successfully.');
    }
}

