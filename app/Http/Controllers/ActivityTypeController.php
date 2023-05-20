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

    public function store(Request $request)
    {
        $success = false;
        $activityType = new ActivityType();
        $activityType->name = $request->name;
        $activityType->description = $request->filled($request->description) ? $request->description : null;
        
        if($activityType->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $activityType
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $success = false;
        $activityType = ActivityType::findOrFail($id);

        if (!$request->filled($request->name)) {
            $activityType->name = $request->name;
        }

        if (!$request->filled($request->description)) {
            $activityType->description = $request->description;
        }
        
        if($activityType->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $activityType
                        ]
                    );
    }

    public function destroy($id)
    {
        $success = false;
        
        if(ActivityType::destroy($id)) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success
                        ]
                    );
    }
}
