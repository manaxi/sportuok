<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Workout;
use DB;
class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('name', 'desc')->paginate(10);
        return view('clients.index')->with('clients', $clients);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = DB::table('users')->where('email', $id)->first();
        $email=$client->email;
        $workouts=Workout::where('user_email',$email)
        ->select('workout_name','workout_id')
        ->groupBy('workout_id')
        ->get();
        
        return view('clients.show')->with('client', $client)->with('workouts',$workouts);
    }
    public function showWorkout($id)
    {
        $workout1=DB::table('workouts')->where('workout_id', $id)->first();
        $workout=DB::table('workouts')->where('workout_id', $id)->get();

        $email=$workout1->user_email;
        $user_info=DB::table('users')->where('email', $email)->first();
        return view('clients.show_workout')->with('workout', $workout)->with('workout1',$workout1)->with('user_info',$user_info);
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
