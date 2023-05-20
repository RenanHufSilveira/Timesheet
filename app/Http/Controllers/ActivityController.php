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
        $activity->description = $request->filled($request->description) ? $request->description : null;
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
        $activity = Activity::findOrFail($id);

        if (!$request->filled($request->name)) {
            $activity->name = $request->name;
        }
        
        if (!$request->filled($request->description)) {
            $activity->description = $request->description;
        }

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
