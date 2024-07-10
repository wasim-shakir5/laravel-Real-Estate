<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        return view('home', compact('properties'));
    }

    public function single($id)
    {
        $property = Property::find($id);
        return view('property.single', compact('property'));
    }
}
