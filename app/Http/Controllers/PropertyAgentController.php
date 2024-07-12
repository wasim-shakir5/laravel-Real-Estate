<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactAgent;

class PropertyAgentController extends Controller
{
    public function submit(Request $request)
    {
        $values = $request->validate([
            'property_id'       => 'required|integer|exists:properties,id',
            'user_id'           => 'required|integer|exists:users,id',
            'agent_name'        => 'required|string|exists:properties,agent_name',
            'name'              => 'required|string|min:2|max:20',
            'email'             => 'required|string|email|max:50',
            'phone'             => 'string|max:15',
            'message'           => 'string|max:400',
        ]);
        ContactAgent::create($values);

        return back()->with('request_success', 'Successfully Sent Your Message');
    }
}
