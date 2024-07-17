<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Property; // Assuming you have a Property model

class UsersController extends Controller
{
    public function requested_property()
    {
        $user_id = Auth::id(); 

        // Fetch properties where the user has contacted the agent
        $properties = Property::whereHas('contactAgents', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $current_page = "Requested Properties";

        return view('pages.users-custom', compact('properties', 'current_page'));
    }

    public function liked_property()
    {
        $user_id = Auth::id(); 

        // Fetch properties the user has liked or saved
        $properties = Property::whereHas('userProperties', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $current_page = "Liked Properties";

        return view('pages.users-custom', compact('properties', 'current_page'));
    }
}
