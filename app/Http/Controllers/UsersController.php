<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Property; // Assuming you have a Property model

class UsersController extends Controller
{
    public function requested_property()
    {
        $user_id = Auth::id(); // Use Auth::id() to get the authenticated user's ID

        // Fetch properties where the user has contacted the agent
        $requested_properties = Property::whereHas('contact_agents', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('pages.users-custom', compact('requested_properties'));
    }

    public function liked_property()
    {
        $user_id = Auth::id(); // Use Auth::id() to get the authenticated user's ID

        // Fetch properties the user has liked or saved
        $liked_properties = Property::whereHas('userProperties', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('pages.users-custom', compact('liked_properties'));
    }
}
