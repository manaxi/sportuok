@extends('layouts.app')
@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Pagrindinis</a>
            </li>
            <li class="breadcrumb-item">
            <a href="{{ url('/clients') }}">Vartotojai</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/clients/{{$workout1->user_email}}">{{$user_info->name}}</a>
            </li>
            <li class="breadcrumb-item active">{{$workout1->workout_name}}</li>
          </ol>
          
          <!-- Page Content -->
          <h1>Vartotojo</h1>
          <p>Treniruotės</p>
          <hr>
          <p class="btn btn-primary mt-1">{{$workout1->workout_name}}</p>
          @if(count($workout) > 0)
          @foreach($workout as $workout)
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Pratimo pavadinimas</label>
            <div class="col-2">
              <input class="form-control" readonly="readonly" value="{{$workout->exercise_name}}" id="example-text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Pratimo kiekis</label>
            <div class="col-2">
              <input class="form-control" readonly="readonly" value="{{$workout->exercise_amount}}" id="example-text-input">
            </div>
          </div>
          <hr>
          @endforeach
          @else 
              Nėra treniruočių
          @endif

@endsection