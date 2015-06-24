@extends('app')

@section('content')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Location</div>
				<div class="panel-body">
				<div id="matchrequests" class ="table-responsive">
				<table class="table table-striped table-hover">

						<tr class="text-center">
							<th>Name</th>
							<th>Comment</th>
							<th>Address</th>
							<th>City</th>
							<th>State</th>
							<th>Zip</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>

				
					<tr>
						<td>{{ $location->name }}</td>
						<td>{{ $location->comment }}</td>
						<td>{{ $location->address }}</td>
						<td>{{ $location->city }}</td>
						<td>{{ $location->st }}</td>
						<td>{{ $location->zip }}</td>
						<td>
								<a href="/location/{{$location->id}}/update">Edit</a>
						</td>
						<td>
							
								<form action="location/{{$location->id}}/delete" method="GET">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button>Delete</button>
								</form>
						
						</td>
					</tr>
					
				</table>
				</div>
				<div id="map"></div>
				<a href="/location/create">Add Location</a><br>
				<a href="/locations">List All Locations</a><br>
				
				</div>
			</div>
			</div>
		</div>
	</div>
</div>



 <script type="text/javascript">
    var map;
    $(function(){
      map = new GMaps({
        div: '#map',
        lat: {{$location->lat}},
  		lng: {{$location->long}},
  		width: '500px',
        height: '500px'
         });
       map.addMarker({
        lat: {{$location->lat}},
  		lng: {{$location->long}},
        title: '{{$location->name}}',
        infoWindow: {
          content: '<p>{{$location->comment}}</p>'
        }
      });
    });
  </script>
@endsection