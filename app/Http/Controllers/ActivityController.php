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
            $types = Activity::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $types;
        }

        $types = Activity::all();
        return $types;
    }

    public function show($id)
    {
        return Activity::findOrFail($id);
    }

    public function store(Request $request)
    {
        $sucess = false;
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->activity_type_id = $request->activitytype;

        if($activity->save()) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $sucess, 
                            'object' => $activity
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $sucess = false;
        $activityType = Activity::findOrFail($id);
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        
        if($activityType->save()) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $sucess, 
                            'object' => $activityType
                        ]
                    );
    }

    public function destroy($id)
    {
        $sucess = false;
        
        if(Activity::destroy($id)) {
            $sucess = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $sucess
                        ]
                    );
    }
}
