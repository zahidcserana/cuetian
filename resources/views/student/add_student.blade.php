@extends('layouts.app')
<?php
    $publicUrl = asset("/");
?>
@section('include_js_files')
@parent
<script>
    $(document).ready(function(){
        $( "#country" ).change(function()
        { 
            var country = $( "#country" ).val();
            if (country!='Bangladesh') {
                $("#city").hide();
            }
            else
                $("#city").show();
        });
    });
</script>
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><h3>Please insert correct information</h3></div>
                <div class="panel-body">
                    <div class="f_section">
                        <form id="profile" method="post" action="{{route('student_add')}}" role="form" class="form-horizontal">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="added_by" value="{{ Auth::user()->id }}">
                          
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Batch</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                               <select name="batch">
                                    <option selected disabled>Select One</option>
                                    @for($i='1968'; $i<=date('Y');$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    <option value="others">others</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Hall</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <select name="hall">
                                <option selected disabled>Select One</option>
                                @foreach(\Config::get('profile.hall') as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                 <option value="others">others</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Department</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <select name="department">
                                <option selected disabled>Select One</option>
                                @foreach(\Config::get('profile.department') as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                <option value="others">others</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Current Address</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">Country:
                                <select id="country" name="country">
                                     @foreach(\Config::get('country.country_list') as $key => $value)
                                        <option {{$value=='Bangladesh'?'selected="selected"':""}} value="{{$value}}">{{$value}}</option>
                                     @endforeach 
                                    <option value="others">others</option>
                                 </select>
                            </div>
                            <div id="city" class="col-md-5 col-sm-6 col-xs-8" >City:
                                <select name="city">
                                    <option selected disabled>Select One</option>
                                     @foreach(\Config::get('bd_district.districts') as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                     @endforeach 
                                    <option value="others">others</option>
                                 </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Mobile No</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <input type="text" name="mobile" class="form-control p" placeholder="Mobile No" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Three Chillah</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="three_chillah" name="three_chillah" value="{{ old('three_chillah') }}">
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Marital status</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="marital_status" name="marital_status" value="{{ old('marital_status') }}">
                                  <option value="0">Single</option>
                                  <option value="1">Married</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Foreign Safar</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="foreign_safar" name="foreign_safar" value="{{ old('foreign_safar') }}">
                                  <option value="0">No</option>
                                  <option value="1">Yes</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <button class="btn btn-save-continue" type="submit">Save</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection
