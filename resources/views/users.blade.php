@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<th>Batch</th>
							<th>Name</th>
							<th>Department</th>
							<th>Mobile</th>
							<th>Details</th>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$user->batch}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->department}}</td>
								<td>{{$user->mobile}}</td>
								<td><a href="{{route('user_details',['id'=>$user->id])}}">click</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
