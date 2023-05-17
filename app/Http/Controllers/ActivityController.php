<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $activities = Activity::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $activities;
        }

        $activities = Activity::all();
        return $activities;
    }

    public function show($id)
    {
        return Activity::findOrFail($id);
    }

    public function store(Request $request)
    {
        $success = false;
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->activity_types_id = $request->activitytype;

        if($activity->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $activity
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $success = false;
        $activityType = Activity::findOrFail($id);
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        
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
        
        if(Activity::destroy($id)) {
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
