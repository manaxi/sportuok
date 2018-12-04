@extends('layouts.app')

@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Pagrindinis</a>
            </li>
            <li class="breadcrumb-item active">Treneriai</li>
          </ol>

          <!-- Page Content -->
          <h1>Treneriai</h1>
          <hr>
          <p></p>
          @if(count($admins))
            @foreach($admins as $admin)
                <td>{{$admin->name}}</td>
                <td>
                {!!Form::open(['action' => ['UsersController@destroy', $admin->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Trinti', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
                </td>
            @endforeach
          @else 
          nera treneriu
          @endif

@endsection