@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">I'm open for matches @</div>

				<div class="panel-body">
					<a  class="btn btn-default btn-xs"role="button" data-toggle="collapse" href="#matchrequests" aria-expanded="false" aria-controls="collapseExample">Events>></a>
					<div id="matchrequests" class ="table-responsive collapse"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Available Matches</div>

				<div class="panel-body">
					<div id="amatches" class ="table-responsive"></div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- The handlebar template -->
<script id="matchreq-template" type="text/x-handlebars-template">

<table class="table table-striped table-hover">

						<tr class="text-center">
							<th>Find Match</th>
							<th>Location</th>
							<th>Gender</th>
							<th>Ranking</th>
							<th>Comment</th>
							<th>Open Date Time</th>
							<th>Close Date Time</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>

					@{{#each response}}
					<tr class="text-center">
						<td><a href="/json/match/@{{id}}/findmatchesfor" id ="blah" class="find" ><i class="fa fa-search"></i></a></td>
						<td><a href="/location/@{{ location_id }}">@{{ location.name }}</a></td>
						<td>@{{gender}}</td>
						<td>@{{ ranking }}</td>
						<td>@{{ comment }}</td>
						<td>@{{ open_date_time }}</td>
						<td>@{{ close_date_time }}</td>
						<td>
							<a href="#" onClick="window.open('/match/@{{id}}/update','pagename','resizable,height=500,width=370,location=no'); return false;"><i class="fa fa-pencil"></i></a>

						</td>
						<td>
							<a href="/ajax/match/@{{id}}/delete" id = "mtrqdelete" class="trash"; ><i class="fa fa-trash-o"></i></a> 
							
						</td>

						</tr>
					
					@{{/each}}
				</table>
			<a href="#" onClick="window.open('/match/create','pagename','resizable,height=500,width=370,location=no'); return false;">New</a>
</script>



<!-- The handlebar template -->
<script id="amatches-template" type="text/x-handlebars-template">

<table class="table table-striped table-hover">

						<tr class="text-center">
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

					@{{#each response}}
					<tr class="text-center">
						<td><a href="/match/@{{id}}/findmatchesfor">find matches</a></td>
						<td><a href="/users/@{{user_id}}">@{{user_id}}</a></td>
						<td>@{{match_date }}</td>
						<td>@{{time }}</td>
						<td>@{{location_id }}</td>
						<td>@{{opponent_id }}</td>
						<td>@{{gender }}</td>
						<td>@{{ranking }}</td>
						<td>@{{comment }}</td>
						<td>@{{open_date_time }}</td>
						<td>@{{close_date_time }}</td>
						<td><a href="/match/@{{id}}/update">Edit</a></td>
						<td><a href="/match/@{{id}}/delete">Remove</a></td>

						</tr>
					@{{/each}}
				</table>
			<a href="#" onClick="window.open('/match/create','pagename','resizable,height=500,width=370,location=no'); return false;">New</a>
</script>
@endsection