@extends('app')

@section('content')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Available Open Matches</div>
				<div class="panel-body">
				<table>

						<tr>
							<th>Match ID</th>
							<th>User ID</th>
							<th>Confirmed Date</th>
							<th>Confirmed Time</th>
							<th>Location ID</th>
							<th>Opponent Id</th>
							<th>Gender</th>
							<th>Ranking</th>
							<th>Comment</th>
							<th>Open Date Time</th>
							<th>Close Date Time</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>

					@foreach($matches as $match)
					<tr>
						<td><a href="match/{{$match->id}}">{{ $match->id }}</a></td>
						<td><a href="users/{{$match->user_id}}">{{ $match->user_id}}</a></td>
						<td>{{ $match->match_date }}</td>
						<td>{{ $match->time }}</td>
						<td>{{ $match->location_id }}</td>
						<td>{{ $match->opponent_id }}</td>
						<td>{{ $match->gender }}</td>
						<td>{{ $match->ranking }}</td>
						<td>{{ $match->comment }}</td>
						<td>{{ $match->open_date_time }}</td>
						<td>{{ $match->close_date_time }}</td>
						<td><a href="/match/{{$match->id}}/update">Edit</a></td>
						<td>
							
								<form action="match/{{$match->id}}/delete" method="GET">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" value="{{$match->id}}">
									<button>Delete</button>
								</form>
						
						</td>
					</tr>
					@endforeach
				</table>
				<a href="/match/create">add match</a>
				</div>
				<div id="map"></div>
			</div>
			</div>
		</div>
	</div>
</div>

@endsection
