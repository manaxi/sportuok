<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reques;
use App\Workout;
Use DB;
class RequestsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Reques::orderBy('id', 'desc')->paginate(5);
        return view('requests.index')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_email' => 'required',
            'workout_name' => 'required',
            'workout_id' => 'required',
            'exercise_name' => 'required',
            'exercise_amount' => 'required',
            'video_link' => 'required'
        ]);
        $exercise_name=$request->input('exercise_name');
        $exercise_amount=$request->input('exercise_amount');
        $video_link=$request->input('video_link');
        
        // Create Post
        for($i=0; $i<count($exercise_name);$i++){
        $workout = new Workout;
        $workout->user_email = $request->input('user_email');
        $workout->workout_id = $request->input('workout_id');
        $workout->workout_name = $request->input('workout_name');
        $workout->exercise_name = $exercise_name[$i];
        $workout->exercise_amount =$exercise_amount[$i];
        $workout->video_link = $video_link[$i];
        $workout->timestamps = false;
        $workout->save();
        }
        return redirect('/requests')->with('success', 'Treniruote sudaryta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = DB::table('requests')->where('id', $id)->first();
        //$booking_info = DB::table('booking')->where('train_id',$id)->where('status',1)->get();
        $email=$request->user_email;
        $user_info=DB::table('users')->where('email', $email)->first();
        return view('requests.show')->with('request', $request)->with('user_info',$user_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
