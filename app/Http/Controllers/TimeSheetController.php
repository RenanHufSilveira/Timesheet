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
            $timesheets = TimeSheet::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $timesheets;
        }

        $timesheets = TimeSheet::all();
        return $timesheets;
    }

    public function show($id)
    {
        return TimeSheet::findOrFail($id);
    }

    public function store(Request $request)
    {
        $success = false;
        $timesheet = new TimeSheet();
        $timesheet->name = $request->name;
        $timesheet->description = $request->description;
        
        if($timesheet->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $timesheet
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $success = false;
        $timesheet = TimeSheet::findOrFail($id);
        $timesheet->name = $request->name;
        $timesheet->description = $request->description;
        
        if($timesheet->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $timesheet
                        ]
                    );
    }

    public function destroy($id)
    {
        $success = false;
        
        if(TimeSheet::destroy($id)) {
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
