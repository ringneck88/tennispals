@extends('app')

@section('content')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Add Location</div>
				<div class="panel-body">
				<div class ="table-responsive">
					<table class="table table-striped table-hover">

							<tr class="text-center">
								<th>Name</th>
								<th>Comment</th>
								<th>Address</th>
								<th>City</th>
								<th>State</th>
								<th>Zip</th>
								<th>Lat</th>
								<th>Long</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>

						@foreach($locations as $location)
						<tr>
							<td><a href="location/{{$location->id}}">{{ $location->name }}</a></td>
							<td>{{ $location->comment }}</td>
							<td>{{ $location->address }}</td>
							<td>{{ $location->city }}</td>
							<td>{{ $location->st }}</td>
							<td>{{ $location->zip }}</td>
							<td>{{ $location->lat }}</td>
							<td>{{ $location->long }}</td>
							<td><a href="location/{{$location->id}}/update">Edit</a></td>
							<td>
								
									<form action="location/{{$location->id}}/delete" method="GET">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" value="{{$location->id}}">
										<button>Delete</button>
									</form>
							
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<a href="location/create">add location</a>
				</div>
				<div id="map"></div>
			</div>
			</div>
		</div>
	</div>
</div>

@endsection
