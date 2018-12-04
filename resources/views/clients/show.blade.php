@extends('layouts.app')
@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Pagrindinis</a>
            </li>
            <li class="breadcrumb-item">
            <a href="{{ url('/requests') }}">Vartotojai</a>
            </li>
            <li class="breadcrumb-item active">{{$client->name}}</li>
          </ol>
          
          <!-- Page Content -->
          <h1>Vartotojo {{$client->name}}</h1>
          <p>Treniruotės</p>
          <hr>
          
@if(count($workouts) > 0)
@foreach($workouts as $workout)
        <label class="pt-1">Treniruotės pavadinimas: </label>
        <a class="btn btn-primary mt-1"href="/workouts/{{$workout->workout_id}}">{{$workout->workout_name}}</a><br>
@endforeach
@else 
    Nėra treniruočių
@endif


@endsection