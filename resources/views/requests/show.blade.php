
@extends('layouts.app')

@section('content')
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Pagrindinis</a>
                </li>
                <li class="breadcrumb-item">
                <a href="{{ url('/requests') }}">Prašymai</a>
                </li>
                <li class="breadcrumb-item active">Sudaryti treniruotę</li>
              </ol>
              
              <!-- Page Content -->
              <h1>Treniruotės sudarymas</h1>
              <p>Vartotojo: {{$user_info->name}}</p>
              <hr>
              <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Grupė</label>
                    <div class="col-2">
                      <input class="form-control" readonly="readonly" value="{{$request->people_group}}" id="example-text-input">
                    </div>
              </div>
              <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Treniruotės sudėtingumas</label>
                    <div class="col-2">
                      <input class="form-control" readonly="readonly" value="{{$request->difficulty}}" id="example-text-input">
                    </div>
              </div>
              <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Raumenų grupė</label>
                    <div class="col-2">
                      <input class="form-control" readonly="readonly" value="{{$request->muscle}}" id="example-text-input">
                    </div>
              </div>  
              <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Papildome informacija</label>
                    <div class="col-2">
                        <textarea readonly="readonly" class="form-control" id="exampleTextarea" rows="3">"{{$request->comment}}</textarea>
                    </div>
              </div> 
              
              

              
              
              {!! Form::open(['action' => 'RequestsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <div class="form-group">
                  {{Form::label('workout_name', 'Treniruotės pavadinimas')}}
                  <div class="col-3">
                  {{Form::text('workout_name', '', ['class' => 'form-control', 'placeholder' => 'Treniruotės pavadinimas'])}}
                   {{Form::hidden('user_email',  $request->user_email, ['class' => 'form-control', 'placeholder' => ''])}}
                    {{Form::hidden('workout_id',  $request->id, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
              </div> 
                <div class="form-group">      
                        <div class="col-5">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>
                        <td><button type="button" name="add" id="add" class="btn btn-primary">Pridėti pratimą</button></td> 
                    </tr>
                 </table>  
                </div> 
            </div>                        
              {{Form::submit('Išsaugoti', ['class'=>'btn btn-primary'])}}
          {!! Form::close() !!}
       <script type="text/javascript">
           $(document).ready(function(){      
             var postURL = "<?php echo url('addmore'); ?>";
             var i=1;       
             $('#add').click(function(){         
                  i++;       
                  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="exercise_name[]" placeholder="Pratimo pavadinimas" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
                  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="number" name="exercise_amount[]" placeholder="Pratimo kiekis" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="video_link[]" placeholder="Pratimo vaizdo įrašas" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');      
             });   
             $(document).on('click', '.btn_remove', function(){  
                  var button_id = $(this).attr("id");   
                  $('#row'+button_id+'').remove();  
                  $('#row'+button_id+'').remove(); 
                  $('#row'+button_id+'').remove();
             });  
             $.ajaxSetup({
                 headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $('#Submit').click(function(){            
                  $.ajax({  
                       url:postURL,  
                       method:"POST",  
                       data:$('#add_name').serialize(),
                       type:'json',
                       success:function(data)  
                       {
                           if(data.error){ 
                               printErrorMsg(data.error);      
                           }else{
                               i=1;
                               $('.dynamic-added').remove();      
                               $('#add_name')[0].reset();
                               $(".print-success-msg").find("ul").html('');
                               $(".print-success-msg").css('display','block');
                               $(".print-error-msg").css('display','none');
                               $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                           }
                       }  
                  });  
             });  
             function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
             }
           });      
       </script>
@endsection
