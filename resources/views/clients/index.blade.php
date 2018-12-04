@extends('layouts.app')

@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Pagrindinis</a>
                </li>
                <li class="breadcrumb-item active">Vartotojai</li>
              </ol>
    
              <!-- Page Content -->
              <h1>Vartotojai</h1>
              <hr>
              <p></p>
          <!-- DataTables Example -->
          <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                  Vartotojų duomenys</div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if(count($clients) > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Vardas</th>
                          <th>Pavardė</th>
                          <th>El.Paštas</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>El.Paštas</th>
                        </tr>
                      </tfoot>
                      <tbody>
                            @foreach($clients as $client)
                            <tr>
                            <td><a href="/clients/{{$client->email}}">{{$client->name}}</a></td>
                                <td>{{$client->surname}}</td>
                                <td>{{$client->email}}</td>
                            </tr>
                        @endforeach     
                      </tbody>
                    </table>
                    {{$clients->links("pagination::bootstrap-4")}}
                    @else
                    <p>Registruotų vartotojų nėra</p>
                @endif
                  </div>
                </div>
              </div>

@endsection
