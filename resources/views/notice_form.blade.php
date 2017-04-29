@extends('layouts.app')
@section('include_js_files')
@parent
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">

$.noConflict();
jQuery( document ).ready(function( $ ) {
   $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
  });
});

</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><h3>Please insert correct information</h3></div>
                <div class="panel-body">
                    <div class="f_section">
                        <form id="profile" method="post" action="{{route('add_notice')}}" role="form" class="form-horizontal">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="added_by" value="{{ Auth::user()->id }}">
                          
                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Body</label>
                            <div class="col-md-6">
                                <textarea  class="ckeditor" name="body" rows="2"> </textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-4 f_label">Expire Date</label>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <input name="expired" class="datepicker" data-date-format="mm/dd/yyyy">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-5 col-sm-6 col-xs-8">
                              <button class="btn btn-save-continue" type="submit">Save</button>
                              <button type="button" class="btn" onClick="window.location='{{route('notice_view')}}';"><i class=" icon-remove"></i>Cancel</button>
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
