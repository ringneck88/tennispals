@extends('app')

@section('content')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Available Open Matches</div>
				<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-striped table-hover">

						<tr>
							<th>Find Match</th>
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
						<td><a href="/match/{{ $match->id }}/findmatchesfor">find matches</a></td>
						<td><a href="/users/{{$match->user_id}}">{{ $match->user_id}}</a></td>
						<td>{{ $match->match_date }}</td>
						<td>{{ $match->time }}</td>
						<td>{{ $match->location_id }}</td>
						<td>{{ $match->opponent_id }}</td>
						<td>{{ $match->gender }}</td>
						<td>{{ $match->ranking }}</td>
						<td>{{ $match->comment }}</td>
						<td>{{ $match->open_date_time }}</td>
						<td>{{ $match->close_date_time }}</td>
						<td>@if ( Auth::user()->id == $match->user_id )
							<a href="/match/{{$match->id}}/update">Edit</a>
							@endif
						</td>
						<td>
							 @if ( Auth::user()->id == $match->user_id )
							 <a href="/match/{{$match->id}}/delete">Remove</a>

							@endif
						</td>

						</tr>
					@endforeach
				</table>
				</div>
				<a href="/match/create">add match</a>
				</div>
				<div id="map"></div>
			</div>
			</div>
		</div>
	</div>
</div>

@endsection
