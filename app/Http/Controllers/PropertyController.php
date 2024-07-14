<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\ContactAgent;
use App\Models\UserProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        $saved_properties = UserProperty::where('user_id', $userId)->pluck('property_id')->toArray();
        return view('home', compact('properties', 'saved_properties'));
    }

    public function filterProperties(Request $request)
    {
        $query = Property::query();
        $userId = Auth::id();

        if ($request->filled('list_type')) {
            $query->where('home_type', $request->list_type);
        }

        if ($request->filled('offer_type')) {
            $query->where('type', $request->offer_type);
        }

        if ($request->filled('city')) {
            $bedsRange = explode('-', $request->city);
            if (count($bedsRange) == 1) {
                $query->where('beds', $bedsRange[0]);
            } else {
                $query->whereBetween('beds', [$bedsRange[0], $bedsRange[1]]);
            }
        }

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $properties = $query->get();
        $saved_properties = UserProperty::where('user_id', $userId)->pluck('property_id')->toArray();

        return response()->json([
            'html' => view('property.property_list', compact('properties', 'saved_properties'))->render()
        ]);
    }

    public function single($id)
    {
        $property = Property::with('images')->find($id);
        $user_id = Auth::check() ? Auth::id() : 0;

        if (!$property) {
            return redirect()->route('home')->with('error_id_not_found', 'Property Doesnt Exists!');
        }

        // Related property
        $related_properties = Property::where('type', $property->type)
            ->where('id', '!=', $id)->take(3)->orderBy('created_at')->get();

        $gallery = $property->images->where('image_type', 'gallery');
        $others = $property->images->where('image_type', 'others');

        // Generate the full URL for the property
        $property_url = route('single.prop', ['id' => $property->id]);

        // count to 3 and then stop user to give request
        $submission_count = ContactAgent::where('property_id', $id)->where('user_id', $user_id)
            ->count();

        $is_saved = UserProperty::where('property_id', $id)->where('user_id', $user_id)->exists();

        return view('property.single', compact('property', 'gallery', 'others', 'related_properties', 'property_url', 'submission_count', 'is_saved', 'user_id'));
    }

    public function saveProperty(Request $request)
    {
        $propertyId = $request->property_id;
        $userId = Auth::id();

        $savedProperty = UserProperty::where('user_id', $userId)->where('property_id', $propertyId)->first();

        if ($savedProperty) {
            $savedProperty->delete();
            return response()->json(['status' => 'success', 'action' => 'unsaved', 'message' => 'Property removed successfully']);
        } else {
            UserProperty::create([
                'user_id' => $userId,
                'property_id' => $propertyId,
            ]);
            return response()->json(['status' => 'success', 'action' => 'saved', 'message' => 'Property saved successfully']);
        }
    }

    public function showByType($type)
    {
        if (!in_array($type, ['Rent', 'Sale'])) {
            return redirect()->route('home')
            ->with('error_invalid_type', "We don't have the type, you're looking for or you might have mispelled it. Please Double Check it!");
        }
        $properties = Property::where('type', $type)->orderBy('created_at', 'desc')->take(9)->get();
        $saved_properties = UserProperty::where('user_id', Auth::user()->id)->pluck('property_id')->toArray();

        return view('home', compact('properties', 'saved_properties', 'type'));
    }

    public function showByHomeType($type)
    {
        if (!in_array($type, ['Palace', 'Mansion', 'Home'])) {
            return redirect()->route('home')
            ->with('error_invalid_hometype', "We don't have the type, you're looking for or you might have mispelled it. Please Double Check it!");
        }
        $properties = Property::where('home_type', $type)->orderBy('created_at', 'DESC')->take(9)->get();
        $saved_properties = UserProperty::where('user_id', Auth::user()->id)->pluck('property_id')->toArray();

        return view('home', compact('properties', 'saved_properties', 'type'));
    }
}
