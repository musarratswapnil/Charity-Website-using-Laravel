<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;

class AdminMissionController extends Controller
{
    public function edit()
    {
        $mission= Mission::where('id', 1)->first();
        return view('admin.mission.edit', compact('mission'));
    }

    public function edit_submit(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'video_id' => 'required',
        ]);

        $mission = Mission::where('id', 1)->first();

        if ($request->photo!=null) {
           $request->validate([
               'photo' => 'image|mimes:jpeg,png,jpg',
           ]);
           unlink('uploads/'.$mission->photo);

           $final_name=time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $mission->photo=$final_name;
        }
        $mission->heading=$request->heading;
        $mission->sub_heading=$request->sub_heading;
        $mission->text=$request->text;
        $mission->button_text=$request->button_text;
        $mission->button_link=$request->button_link;
        $mission->video_id=$request->video_id;
        $mission->status=$request->status;
        $mission->update();

        return redirect()->back()->with('success', 'Mission updated successfully');
    }
}
