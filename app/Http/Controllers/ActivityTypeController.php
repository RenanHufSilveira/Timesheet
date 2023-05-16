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
        $sucess = false;
        $activityType = new ActivityType();
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        
        if($activityType->save()) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'sucess' => $sucess, 
                            'object' => $activityType
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $sucess = false;
        $activityType = ActivityType::findOrFail($id);
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        
        if($activityType->save()) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'sucess' => $sucess, 
                            'object' => $activityType
                        ]
                    );
    }

    public function destroy($id)
    {
        $sucess = false;
        
        if(ActivityType::destroy($id)) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'sucess' => $sucess
                        ]
                    );
    }
}
