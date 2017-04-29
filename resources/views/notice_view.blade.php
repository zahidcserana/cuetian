@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Notices <a href="{{route('add_notice')}}">Add new</a></div>
				<div class="panel-body">
					@if(count($notices)>0)
						<table class="table">
							<thead>
								<th>ID</th>
								<th>Title</th>
								<th>Text</th>
								<th>Date</th>
								<th>Action</th>
							</thead>
							<tbody>
						@foreach($notices as $notice)
							<tr>
								<td>{{$notice->id}}</td>
								<td>{{$notice->title}}</td>
								<td>{!!$notice->body!!}</td>
								<td>{{$notice->expired}}</td>
								<td>
								<a href="{{route('notice_remove',['id'=>$notice->id])}}">Remove</a>
								</td>
							</tr>
						@endforeach
							</tbody>
						</table>
					@else
					 No Entry
					@endIf
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
