<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityType;

class ActivityTypeController extends Controller
{

    public function index() 
    {
        $search = request('search');

        if($search) {
            $types = ActivityType::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $types;
        }

        $types = ActivityType::all();
        return $types;
    }

    public function show($id)
    {
        return ActivityType::findOrFail($id);
    }
}
