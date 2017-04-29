@extends('layouts.app')
<?php
    $publicUrl = asset("/");
?>
@section('include_js_files')
@parent
    <script src="{{$publicUrl}}cropper/cropper.min.js"></script>
    <link rel="stylesheet" href="{{$publicUrl}}cropper/cropper.css">
    <style>
        img {
            max-width: 100%;
        }
    </style>
    <script>
        $(document).ready(function(){
            var cropper;
            var div2Width;
            var imageWidth;
            $("#change_picture").click(function()
            { 
                $( "#imageFile" ).click();
            });
            $("#picture_change").click(function()
            { 
                $( "#imageFile" ).click();
            });
            $( "#imageFile" ).change(function()
            {
                console.log('cropper created');
                var _URL = window.URL || window.webkitURL;
                img = new Image();
                img.onerror = function() { alert('Please chose an image file!'); };
                img.onload = function () {
                    var imageWidth = this.width;
                    $("#imageCropped").hide();
                    $('#image_upload').attr('src',this.src);
                    $("#image-div1").show();
                    $("#change_picture").hide();
                    $("#back").hide();
                    $("#save").hide();
                    $("#discard").show();
                    $("#getCroppedImage").show();
                    $('#modalChangePicture').modal('show');
                };
                img.src = _URL.createObjectURL(this.files[0]);
            });

            $("#getCroppedImage").click(function(){
                var imageSrc = cropper.getCroppedCanvas().toDataURL('image/jpeg');
                $("#image-div1").hide();
                $("#imageCropped").show();
                $("#imageCropped").attr('src', imageSrc );
                $("#save").show();
                $("#discard").show();
                $("#back").show();
                $("#change_picture").hide();
                $("#getCroppedImage").hide();
                
            });

            $( "#save" ).click(function()
            {
                $(".progress").show();
                var img = document.getElementById('imageFile');
                var cropedImg = $('#imageCropped').attr('src');
                $('#base_image').attr('src',cropedImg);
                var CSRF_TOKEN = "{{ csrf_token() }}";
                var studentId = "{{ $studentDetails->id }}";
                var data = new FormData();
                data.append('file', img.files[0]);
                data.append('cropedImageContent', cropedImg);
                data.append('student_id', studentId);
                data.append('_token', CSRF_TOKEN);
                var Url = "{{route('student_image')}}";

                var xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('progress',function(ev){
                    var progress = parseInt(ev.loaded / ev.total * 100);
                    $('#progressBar').css('width', progress + '%');
                    $('#progressBar').html(progress + '%');
                }, false);
                xhr.onreadystatechange = function(ev)
                {
                    console.log(xhr.readyState);
                    if(xhr.readyState == 4){
                        if(xhr.status = '200')
                        {
                            $("#imageCropped").hide();
                            $(".progress").hide();
                            $("#save").hide();
                            $("#back").hide();
                            $("#discard").hide();
                            $("#getCroppedImage").hide();
                            $('#progressBar').css('width','0' + '%');
                            $('#progressBar').html('0' + '%');
                            $('#modalChangePicture').modal('hide');
                        }
                        
                    }
                };
                xhr.open('POST', Url , true);
                xhr.send(data);
                return false;
            });

            $( "#back" ).click(function()
            {   
                $("#image-div1").show();
                $("#imageCropped").hide();
                $("#discard").show();
                $("#getCroppedImage").show();
                $("#save").hide();
                $("#back").hide();
                $("#change_picture").hide();
                
            });

            $( "#discard" ).click(function()
            {   
                $('#modalChangePicture').modal('hide');
            });

            $("#modalChangePicture").on('hidden.bs.modal', function () {
                console.log('hide modal');
                cropper.destroy();
                $("#imageFile").val("");
            });

            $('#modalChangePicture').on('shown.bs.modal', function() {
                var div2Width = $("#upImage").width();
                if (this.width<div2Width) 
                {
                    document.getElementById('image-div1').style.width = this.width;
                }
                var image = document.getElementById('image_upload');
                
                cropper = new Cropper(image, {
                  aspectRatio: 1,
                  crop: function(e) {
                    console.log(e.detail.x);
                    console.log(e.detail.y);
                    console.log(e.detail.width);
                    console.log(e.detail.height);
                    console.log(e.detail.rotate);
                    console.log(e.detail.scaleX);
                    console.log(e.detail.scaleY);
                  }
                });
            });
        });

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
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <div class="f_section">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-4 f_label">Upload Image</label>
                                <div class="col-md-5 col-sm-5 col-xs-8">
                                    <img src="{{strlen($studentDetails->image)>0?$publicUrl.'images/students/'.$studentDetails->image:$publicUrl. 'images/avator.png' }}" id="base_image" alt="..." style="max-width: 150px; max-height: 150px">
                                    <div class="btn-group-vertical">
                                        <a href="javascript:void(0)" id="picture_change" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="f_section">
                        <form id="profile" method="post" action="{{route('student_update')}}" role="form" class="form-horizontal">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="added_by" value="{{ Auth::user()->id }}">
                          <input type="hidden" name="id" value="{{ $studentDetails->id }}">
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$studentDetails->name}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{$studentDetails->email}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Batch</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                               <select name="batch">
                                    <option selected disabled>Select One</option>
                                    @for($i='1968'; $i<=date('Y');$i++)
                                    <option {{$studentDetails->batch==$i?'selected="selected"':''}}  value="{{$i}}">{{$i}}</option>
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
                                    <option {{$studentDetails->hall==$key?'selected="selected"':''}} value="{{$key}}">{{$value}}</option>
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
                                    <option {{$studentDetails->department==$key?'selected="selected"':''}} value="{{$key}}">{{$value}}</option>
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
                                        <option {{$studentDetails->country==$value?'selected="selected"':""}} value="{{$value}}">{{$value}}</option>
                                     @endforeach 
                                    <option value="others">others</option>
                                 </select>
                            </div>
                            <div id="city" class="col-md-5 col-sm-6 col-xs-8" {!!$studentDetails->country!='Bangladesh'?'style="display: none;"':''!!}>City:
                                <select name="city">
                                    <option selected disabled>Select One</option>
                                     @foreach(\Config::get('bd_district.districts') as $value)
                                        <option {{$studentDetails->city==$value?'selected="selected"':''}} value="{{$value}}">{{$value}}</option>
                                     @endforeach 
                                    <option value="others">others</option>
                                 </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Mobile No</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <input type="text" name="mobile" value="{{ $studentDetails->mobile or '' }}" class="form-control p" placeholder="Mobile No" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Three Chillah</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="three_chillah" name="three_chillah" value="{{ old('three_chillah') }}">
                                  <option {{$studentDetails->three_chillah=='1'?'selected="selected"':''}} value="1">Yes</option>
                                  <option {{$studentDetails->three_chillah=='0'?'selected="selected"':''}} value="0">No</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Marital status</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="marital_status" name="marital_status" value="{{ old('marital_status') }}">
                                  <option {{$studentDetails->marital_status=='1'?'selected="selected"':''}} value="1">Single</option>
                                  <option {{$studentDetails->marital_status=='2'?'selected="selected"':''}} value="2">Married</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Foreign Safar</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <select class="form-control" id="foreign_safar" name="foreign_safar" value="{{ old('foreign_safar') }}">
                                  <option {{$studentDetails->foreign_safar=='1'?'selected="selected"':''}} value="1">Yes</option>
                                  <option {{$studentDetails->foreign_safar=='0'?'selected="selected"':''}} value="0">No</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <button class="btn btn-save-continue" type="submit">Update</button>
                              <button type="button" class="btn" onClick="window.location='{{route('student_view')}}';"><i class=" icon-remove"></i>Cancel</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<!-- crop image -->
<div class="modal fade" id="modalChangePicture" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <button id="modal_close" type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Upload image</h4>
            </div>-->
            <div class="modal-body">
                <div class="f_section">
                    <div align="center">
                        <h4>Upload image</h4>
                    </div>
                    <div class="col-md-12" id="upImage" style="text-align: center;">
                      <div id="image-div1">
                        <img id="image_upload" src="" style="width: 100%;" alt="..." style='display: none;'>
                      </div>
                      <img id="imageCropped" src="" style="display: none; width:100%;">
                        <br>
                        <br>
                        <a href="javascript:void(0)" id="change_picture" class="btn btn-primary" style="display: none;">Change</a>
                        <div class="btn-group-horizontal">
                            <a href="javascript:void(0)" id="back" class="btn btn-primary" style="display: none;">Back</a>
                            <a href="javascript:void(0)" id="save" class="btn btn-primary" style="display: none;">Save</a>
                            <a href="javascript:void(0)" id="discard" class="btn btn-primary" style="display: none;">Cancel</a>
                            <input type='button' id='getCroppedImage' class="btn btn-primary" value='Get Cropped Area' >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="file" id="imageFile" name="photo" style="display: none;">
                        <br>
                        <div class="progress" style="display: none;">
                            <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
