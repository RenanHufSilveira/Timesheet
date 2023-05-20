<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheetItem;
use App\Exceptions\StartDateTimeException;

class TimeSheetItemController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $items = TimeSheetItem::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return $items;
        }

        $items = TimeSheetItem::all();
        return $items;
    }

    public function show($id)
    {
        return TimeSheetItem::findOrFail($id);
    }

    public function store(Request $request)
    {
        $sucess = false;
        $finished = null;
        $item = new TimeSheetItem();
        
        if(!$request->filled($request->finished)) {
            $item->timeValidation($request->started, $request->finished);
            $finished = date("Y-m-d H:i:s", $request->finished);
        }

        $item->name = $request->name;
        $item->description = $request->filled($request->description) ? $request->description : null;
        $item->started_in = date("Y-m-d H:i:s", $request->started);
        $item->finished_in = $finished;
        $item->activities_id = $request->activityid;
        $item->time_sheets_id = $request->timesheetid;

        if($item->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $item
                        ]
                    );
    }

    public function update(Request $request, $id)
    {
        $success = false;
        $item = TimeSheetItem::findOrFail($id);

        if (!$request->filled($request->name)) {
            $item->name = $request->name;
        }

        if (!$request->filled($request->description)) {
            $item->description = $request->description;
        }

        if (!$request->filled($request->started)) {
            $item->started_in = date("Y-m-d H:i:s", $request->started);
        }

        if (!$request->filled($request->finished)) {
            $item->timeValidation(strtotime($item->started_in), $request->finished);
            $item->finished_in = date("Y-m-d H:i:s", $request->finished);
        }
        
        if (!$request->filled($request->activityid)) {
            $item->activities_id = $request->activityid;
        }
        
        if($item->save()) {
            $success = true;
        }

        return response()
                    ->json(
                        [
                            'success' => $success, 
                            'object' => $item
                        ]
                    );
    }

    public function destroy($id)
    {
        $success = false;
        
        if(TimeSheetItem::destroy($id)) {
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
