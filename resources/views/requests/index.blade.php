@extends('layouts.app')

@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Pagrindinis</a>
                </li>
                <li class="breadcrumb-item active">Prašymai</li>
              </ol>
    
              <!-- Page Content -->
              <h1>Prašymai</h1>
              <hr>
              <p></p>
          <!-- DataTables Example -->
          <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                  Prašymai</div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if(count($requests) > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                                <th>El.paštas</th>
                                <th>Grupė</th>
                                <th>Sūnkumas</th>
                                <th>Raumynys</th>
                                <th>Komentaras</th>
                                <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                                <th>El.paštas</th>
                                <th>Grupė</th>
                                <th>Sūnkumas</th>
                                <th>Raumynys</th>
                                <th>Komentaras</th>
                                <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td><a>{{$request->user_email}}</a></td>
                                    <td>{{$request->people_group}}</td>
                                    <td>{{$request->difficulty}}</td>
                                    <td>{{$request->muscle}}</td>
                                    <td>{{substr($request->comment, 0, 10)}}</td>
                                <td><a class="btn btn-primary"href="/requests/{{$request->id}}">Sudaryti treniruotę</a></td>
                                </tr>
                            @endforeach  
                        {{$requests->links()}}                  
                      </tbody>
                    </table>
                    @else
                    <p>Prašymų nėra</p>
                @endif
                  </div>
                </div>
              </div>

@endsection
