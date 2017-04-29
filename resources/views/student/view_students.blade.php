@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Students</div>

				<div class="panel-body">
					@if(count($students)>0)
						<table class="table">
							<thead>
								<th>Batch</th>
								<th>Name</th>
								<th>Department</th>
								<th>Hall</th>
								<th>Action</th>
							</thead>
							<tbody>
						@foreach($students as $student)
							<tr>
								<td>{{$student->batch}}</td>
								<td>{{$student->name}}</td>
								<td>{{$student->department}}</td>
								<td>{{$student->hall}}</td>
								<td>
								<a href="{{route('student_details',['id'=>$student->id])}}">View</a>|
								<a href="{{route('student_remove',['id'=>$student->id])}}">Remove</a>
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
