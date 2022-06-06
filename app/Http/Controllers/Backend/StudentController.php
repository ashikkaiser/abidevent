<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Statics;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $students = Students::quary();
        $students = Students::query();
        if ($request->has('filter')) {
            if ($request->desc) {
                $students = Students::with(['statics' => function ($q) use ($request) {
                    $q->orderBy($request->desc, 'desc');
                }]);

                // $students->sortByDesc("statics.$request->desc");
            }

            if ($request->state) {
                $students->whereRaw('LOWER(`state`) LIKE ? ', [trim(strtolower($request->state)) . '%']);
            }
            if ($request->school_level) {
                $students->where('school_level', $request->school_level);
            }
        }
        $students = $students->paginate(10);

        return view('backend.athlete.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.athlete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $stu = new Students();
        $stu->name      = $request['name'];
        $stu->age       = $request['age'];
        $stu->height    = $request['height'];
        $stu->weight    = $request['weight'];
        $stu->gender    = $request['gender'];
        $stu->school_level = $request['school_level'];
        $stu->school_name = $request['school_name'];
        $stu->state     = strtoupper($request['state']);
        $stu->position  = $request['position'];
        $stu->description = $request['description'];
        if ($request->hasFile('image')) {
            $stu->image      = $request->image->store('assets/upload/player');
        }

        if ($stu->save()) {
            $statics = new Statics();
            $statics->student_id =  $stu->id;
            $statics->top_pitch_velocity = $request->top_pitch_velocity;
            $statics->fb_range = $request->fb_range;
            $statics->top_spin = $request->top_spin;
            $statics->top_ch_velocity = $request->top_ch_velocity;
            $statics->top_ch_spin = $request->top_ch_spin;
            $statics->top_cb_velocity = $request->top_cb_velocity;
            $statics->top_cb_spin = $request->top_cb_spin;
            $statics->top_sl_velocity = $request->top_sl_velocity;
            $statics->top_sl_spin = $request->top_sl_spin;
            $statics->top_ct_velocity = $request->top_ct_velocity;
            $statics->top_ct_spin = $request->top_ct_spin;
            $statics->top_kn_velocity = $request->top_kn_velocity;
            $statics->top_kn_spin = $request->top_kn_spin;
            $statics->top_exit_velocity = $request->top_exit_velocity;
            $statics->max_distance = $request->max_distance;
            $statics->avarage_distance = $request->avarage_distance;
            $statics->inf_velocity = $request->inf_velocity;
            $statics->of_velocity = $request->of_velocity;
            $statics->c_pop = $request->c_pop;
            $statics->vertical_jump = $request->vertical_jump;
            $statics['40yd_sprint_time'] = $request['40yd_sprint_time'];
            $statics['3d_resistance_score'] = $request['3d_resistance_score'];
            $statics->velocity_video = $request->velocity_video;
            $statics->valo_video_date = $request->valo_video_date;
            $statics->velocity_video2 = $request->velocity_video2;
            $statics->valo_video_date2 = $request->valo_video_date2;
            $statics->sprint_video = $request->sprint_video;
            $statics->sprint_video_date = $request->sprint_video_date;
            $statics->jump_video_link = $request->jump_video_link;
            $statics->jump_video_link_date = $request->jump_video_link_date;
            $statics->hitting_video = $request->hitting_video;
            $statics->hitting_video_date = $request->hitting_video_date;
            $statics->resistance_video = $request->resistance_video;
            $statics->resistance_video_date = $request->resistance_video_date;
            $statics->save();
        }

        return redirect()->route('athlete.index')->with('message', 'Player Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Students::find($id);
        return view('backend.athlete.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Students::find($id);

        return view('backend.athlete.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $stu = Students::find($id);
        $stu->name      = $request['name'];
        $stu->age       = $request['age'];
        $stu->height    = $request['height'];
        $stu->weight    = $request['weight'];
        $stu->gender    = $request['gender'];
        $stu->school_level = $request['school_level'];
        $stu->school_name = $request['school_name'];
        $stu->state     = strtoupper($request['state']);
        $stu->position  = $request['position'];
        $stu->description = $request['description'];
        if ($request->hasFile('image')) {
            $stu->image      = $request->image->store('assets/upload/player');
        }

        if ($stu->save()) {
            $statics = Statics::find($request->statics_id);
            $statics->student_id =  $stu->id;
            $statics->top_pitch_velocity = $request->top_pitch_velocity;
            $statics->fb_range = $request->fb_range;
            $statics->top_spin = $request->top_spin;
            $statics->top_ch_velocity = $request->top_ch_velocity;
            $statics->top_ch_spin = $request->top_ch_spin;
            $statics->top_cb_velocity = $request->top_cb_velocity;
            $statics->top_cb_spin = $request->top_cb_spin;
            $statics->top_sl_velocity = $request->top_sl_velocity;
            $statics->top_sl_spin = $request->top_sl_spin;
            $statics->top_ct_velocity = $request->top_ct_velocity;
            $statics->top_ct_spin = $request->top_ct_spin;
            $statics->top_kn_velocity = $request->top_kn_velocity;
            $statics->top_kn_spin = $request->top_kn_spin;
            $statics->top_exit_velocity = $request->top_exit_velocity;
            $statics->max_distance = $request->max_distance;
            $statics->avarage_distance = $request->avarage_distance;
            $statics->inf_velocity = $request->inf_velocity;
            $statics->of_velocity = $request->of_velocity;
            $statics->c_pop = $request->c_pop;
            $statics->vertical_jump = $request->vertical_jump;
            $statics['40yd_sprint_time'] = $request['40yd_sprint_time'];
            $statics['3d_resistance_score'] = $request['3d_resistance_score'];
            $statics->velocity_video = $request->velocity_video;
            $statics->valo_video_date = $request->valo_video_date;
            $statics->velocity_video2 = $request->velocity_video2;
            $statics->valo_video_date2 = $request->valo_video_date2;
            $statics->sprint_video = $request->sprint_video;
            $statics->sprint_video_date = $request->sprint_video_date;
            $statics->jump_video_link = $request->jump_video_link;
            $statics->jump_video_link_date = $request->jump_video_link_date;
            $statics->hitting_video = $request->hitting_video;
            $statics->hitting_video_date = $request->hitting_video_date;
            $statics->resistance_video = $request->resistance_video;
            $statics->resistance_video_date = $request->resistance_video_date;
            $statics->save();
        }
        return redirect()->route('athlete.index')->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Students::find($id);
        Statics::where('student_id', $s->id)->delete();
        $s->delete();
        return redirect()->route('athlete.index')->with('message', 'Player Deleted Successfully');
    }

    public function manageStatics(Request $request)
    {

        if ($request->statics_id) {
            $statics = Statics::find($request->statics_id);
        } else {
            $statics = new Statics();
        }

        $statics->student_id =  $request->student_id;
        $statics->top_pitch_velocity = $request->top_pitch_velocity;
        $statics->fb_range = $request->fb_range;
        $statics->top_spin = $request->top_spin;
        $statics->top_ch_velocity = $request->top_ch_velocity;
        $statics->top_ch_spin = $request->top_ch_spin;
        $statics->top_cb_velocity = $request->top_cb_velocity;
        $statics->top_cb_spin = $request->top_cb_spin;
        $statics->top_sl_velocity = $request->top_sl_velocity;
        $statics->top_sl_spin = $request->top_sl_spin;
        $statics->top_ct_velocity = $request->top_ct_velocity;
        $statics->top_ct_spin = $request->top_ct_spin;
        $statics->top_kn_velocity = $request->top_kn_velocity;
        $statics->top_kn_spin = $request->top_kn_spin;
        $statics->top_exit_velocity = $request->top_exit_velocity;
        $statics->max_distance = $request->max_distance;
        $statics->avarage_distance = $request->avarage_distance;
        $statics->inf_velocity = $request->inf_velocity;
        $statics->of_velocity = $request->of_velocity;
        $statics->c_pop = $request->c_pop;
        $statics->vertical_jump = $request->vertical_jump;
        $statics['40yd_sprint_time'] = $request['40yd_sprint_time'];
        $statics['3d_resistance_score'] = $request['3d_resistance_score'];
        $statics->velocity_video = $request->velocity_video;
        $statics->valo_video_date = $request->valo_video_date;
        $statics->velocity_video2 = $request->velocity_video2;
        $statics->valo_video_date2 = $request->valo_video_date2;
        $statics->sprint_video = $request->sprint_video;
        $statics->sprint_video_date = $request->sprint_video_date;
        $statics->jump_video_link = $request->jump_video_link;
        $statics->jump_video_link_date = $request->jump_video_link_date;
        $statics->hitting_video = $request->hitting_video;
        $statics->hitting_video_date = $request->hitting_video_date;
        $statics->resistance_video = $request->resistance_video;
        $statics->resistance_video_date = $request->resistance_video_date;
        $statics->save();
        if ($request->statics_id) {
            // dd($request->all());
            return redirect()->back()->with('message', ' Statics Updated Successfully');
        }

        return redirect()->back()->with('message', 'New Statics Added Successfully');
    }


    public function destroyStatics($id)
    {
        $statics = Statics::find($id)->delete();
        return redirect()->back()->with('message', 'Statics Deleted Successfully');
    }
}
