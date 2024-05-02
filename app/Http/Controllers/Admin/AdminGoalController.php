<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;

class AdminGoalController extends Controller
{
    public function edit()
    {
        $goal= Goal::where('id', 1)->first();
        return view('admin.goals.edit', compact('goal'));
    }

    public function edit_submit(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
        ]);

        $goal = Goal::where('id', 1)->first();

        $goal->heading=$request->heading;
        $goal->sub_heading=$request->sub_heading;
        $goal->text=$request->text;
        $goal->update();

        return redirect()->back()->with('success', 'goal updated successfully');
    }

    public function edit_photo_submit(Request $request)
    {

        $goal = Goal::where('id', 1)->first();

        if ($request->photo!=null) {
           $request->validate([
               'photo' => 'image|mimes:jpeg,png,jpg',
           ]);
           unlink('uploads/'.$goal->photo);

           $final_name=time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $goal->photo=$final_name;
        }
        $goal->status=$request->status;
        $goal->update();

        return redirect()->back()->with('success', 'goal updated successfully');
    }
}
