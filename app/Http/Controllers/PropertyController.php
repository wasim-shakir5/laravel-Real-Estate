<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\ContactAgent;
use App\Models\UserProperty;
use Illuminate\Http\Request;
use App\Models\PropertyImages;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        return view('home', compact('properties'));
    }

    public function single($id)
    {
        $property = Property::with('images')->find($id);
        if (!$property) {
            return redirect()->route('home')->with('error_id_not_found', 'You dont have the id');
        }

        // Related property
        $related_properties = Property::where('type', $property->type)
            ->where('id', '!=', $id)->take(3)->orderBy('created_at')->get();

        $gallery = $property->images->where('image_type', 'gallery');
        $others = $property->images->where('image_type', 'others');

        // Generate the full URL for the property
        $property_url = route('single.prop', ['id' => $property->id]);

        // count to 3 and then stop user to give request
        $submission_count = ContactAgent::where('property_id', $id)->where('user_id', Auth::user()->id)
            ->count();

        return view('property.single', compact('property', 'gallery', 'others', 'related_properties', 'property_url', 'submission_count'));
    }

    public function saveProperty(Request $request)
    {
        $propertyId = $request->property_id;
        $userId = Auth::id();

        // Check if the property is already saved
        $savedProperty = UserProperty::where('user_id', $userId)->where('property_id', $propertyId)->first();

        if (!$savedProperty) {
            UserProperty::create([
                'user_id' => $userId,
                'property_id' => $propertyId,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Property saved successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Property already saved']);
        }
    }

    public function unsaveProperty(Request $request)
    {
        $propertyId = $request->property_id;
        $userId = Auth::id();

        UserProperty::where('user_id', $userId)->where('property_id', $propertyId)->delete();

        return response()->json(['status' => 'success', 'message' => 'Property removed successfully']);
    }
}
