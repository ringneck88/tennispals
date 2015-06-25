@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default shadow-outside">
				<div class="panel-heading">Confirmed Matches</div>
				<div class="panel-body">
					<div id="confirmed" class ="table-responsive"></div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default shadow-outside">
				<div class="panel-heading">I'm open for matches @</div>
				<div class="panel-body">
					<a href="#" onClick="window.open('/match/create','pagename','resizable,height=500,width=370,location=no'); return false;">New</a><br>
					<a  class="btn btn-default btn-xs"role="button" data-toggle="collapse" href="#matchrequests" aria-expanded="false" aria-controls="collapseExample">Matches <i class="fa fa-caret-square-o-right"></i></a>
					<div id="matchrequests" class ="table-responsive collapse"></div>
				</div>
			</div>
		</div>
					
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default shadow-outside">
				<div class="panel-heading">Available Matches</div>
				<div class="panel-body">
					<a  class="btn btn-default btn-xs"role="button" data-toggle="collapse" href="#amatches" aria-expanded="false" aria-controls="collapseExample">Matches <i class="fa fa-caret-square-o-right"></i></a>
					<div id="amatches" class ="table-responsive"></div>
				</div>
				</div>
			</div>
		</div>
	</div>s
</div>

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default shadow-outside">
				<div class="panel-heading">Challenges</div>
				<div class="panel-body">
					<a  class="btn btn-default btn-xs"role="button" data-toggle="collapse" href="#challenges" aria-expanded="false" aria-controls="collapseExample">Matches <i class="fa fa-caret-square-o-right"></i></a>
					<div id="challenges" class ="table-responsive "></div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-1">
			<div class="panel panel-default shadow-outside">
				<div class="panel-heading">Locations</div>
				<div class="panel-body">
					<a  class="btn btn-default btn-xs"role="button" data-toggle="collapse" href="#alllocations" aria-expanded="false" aria-controls="collapseExample">Locations <i class="fa fa-caret-square-o-right"></i></a>
					<div id="alllocations" class ="table-responsive collapse"></div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script id="confirmed-template" type="text/x-handlebars-template">

<table class="table table-striped table-hover">

	<tr class="text-center">
		<th>Match</th>
		<th>Opponent id</th>
		<th>Location</th>
		<th>Gender</th>
		<th>Ranking</th>
		<th>Comment</th>
		<th>Challenge Date/Time</th>
		
	</tr>

	@{{#each response}}
		<tr class="text-center">
			<td>@{{ id }}</td>
			<td>@{{ user.first_name }} vs @{{opponent_id}}</td>
			<td>@{{ location.name  }}</td>
			<td>@{{ gender }}</td>
			<td>@{{ ranking }}</td>
			<td>@{{ comment }}</td>
			<td>@{{ match_date }}</td>
			
		</tr>		
	@{{/each}}
</table>

</script>

<!-- The handlebar template -->
<script id="challenges-template" type="text/x-handlebars-template">

<table class="table table-striped table-hover">

	<tr class="text-center">
		<th>Match</th>
		<th>Opponent id</th>
		<th>Location</th>
		<th>Gender</th>
		<th>Ranking</th>
		<th>Comment</th>
		<th>Challenge Date/Time</th>
		<th>Accept Chanllenge</th>
	</tr>

	@{{#each response}}
		<tr class="text-center">
			<td>@{{ id }}</td>
			<td>@{{ opponent_id }}</td>
			<td>@{{ location.name }}</td>
			<td>@{{ gender }}</td>
			<td>@{{ ranking }}</td>
			<td>@{{ comment }}</td>
			<td>@{{ match_date }}</td>
			<td>
				<a href="/ajax/match/@{{id}}/acceptchallenge" id = "achallenge" class="acptchallenge" ><i class="fa fa-thumbs-up fa-2x"></i></a> 
			</td>
		</tr>		
	@{{/each}}
</table>

</script>

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
			<td>@{{ gender }}</td>
			<td>@{{ ranking }}</td>
			<td>@{{ comment }}</td>
			<td>@{{ open_date_time }}</td>
			<td>@{{ close_date_time }}</td>
			<td>
				<a href="#" onClick="window.open('/match/@{{id}}/update','pagename','resizable,height=500,width=370,location=no'); return false;"><i class="fa fa-pencil"></i></a>
			</td>
			<td>
				<a href="/ajax/match/@{{id}}/delete" id = "mtrqdelete" class="trash" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash-o"></i></a> 
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
			<th>Opponent Name</th>
			<th>Location</th>
			<th>Gender</th>
			<th>Ranking</th>
			<th>Comment</th>
			<th>Open Date Time</th>
			<th>Close Date Time</th>
			<th>Challenge at</th>
			
		</tr>

		@{{#each response}}
			<tr class="text-center">
				<td><a href="/users/@{{user_id}}">@{{user.first_name}} @{{user.last_name}}</a></td>
				<td>@{{ location.name }}</td>
				<td>@{{ gender }}</td>
				<td>@{{ ranking }}</td>
				<td>@{{ comment }}</td>
				<td>@{{ open_date_time }}</td>
				<td>@{{ close_date_time }}</td>
				<td>
					<form class="form-horizontal" role="form" method="POST" action="/match/@{{id}}/makechallenge" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="datetime-local" class="form-control" name="match_date_time" value="@{{ open_date_time }}">
					<button type="submit" class="btn btn-xs">
						Challenge
					</button>
					</form>
				</td>
			</tr>
		@{{/each}}
	</table>
	<a href="#" onClick="window.open('/match/create','pagename','resizable,height=500,width=370,location=no'); return false;">New</a>
</script>



<!-- The handlebar template -->
<script id="alllocations-template" type="text/x-handlebars-template">
	<div class="panel-body">
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

			@{{#each response}}
				<tr class="text-center">
					<td><a href="location/@{{id}}">@{{ name }}</a></td>
					<td>@{{ comment }}</td>
					<td>@{{ address }}</td>
					<td>@{{ city }}</td>
					<td>@{{ st }}</td>
					<td>@{{ zip }}</td>
					<td>@{{ lat }}</td>
					<td>@{{ long }}</td>
					<td><a href="/location/@{{id}}/update">Edit</a></td>
					<td>
						
						<form action="location/@{{id}}/delete" method="GET">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id" value="@{{id}}">
							<button>Delete</button>
						</form>
					
					</td>
				</tr>
			@{{/each}}
		</table>
		<a href="/location/create">add location</a>
		<div id="map"></div>
	</div>
</script>
 
@endsection