<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheet;

class TimeSheetController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $types = TimeSheet::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $types;
        }

        $types = TimeSheet::all();
        return $types;
    }

    public function show($id)
    {
        return TimeSheet::findOrFail($id);
    }

    public function store(Request $request)
    {
        $sucess = false;
        $activityType = new TimeSheet();
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

    public function update(Request $request, $id)
    {
        $sucess = false;
        $activityType = TimeSheet::findOrFail($id);
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
        
        if(TimeSheet::destroy($id)) {
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
