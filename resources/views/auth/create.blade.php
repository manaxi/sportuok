@extends('layouts.app')

@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Pagrindinis</a>
                </li>
                <li class="breadcrumb-item active">Pridėti trenerį</li>
              </ol>
    
              <!-- Page Content -->
              <h1>Pridėti trenerį</h1>
              <hr>
    {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Trenerio vardas')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Vardas'])}}
        </div>
        <div class="form-group">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
          {{Form::label('email', 'El.Paštas')}}
          {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'El.Paštas'])}}
        </div>
        <div class="form-group">
          {{Form::label('password', 'Slaptažodis')}}
          {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Slaptažodis'])}}
        </div>        
        {{Form::submit('Išsaugoti', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
