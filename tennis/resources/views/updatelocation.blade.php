@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Update Location</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/location/{{ $location->id }}/update" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Location Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $location->name }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">Comment</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="comment" value="{{ $location->comment }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ $location->address }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" value="{{ $location->city }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="st" value="{{ $location->st }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Zip</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="zip" value="{{ $location->zip }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">Latitude</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lat" value="{{ $location->lat }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Longitude</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="long" value="{{ $location->long }}">
							</div>
						</div>

						


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									update Location
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
