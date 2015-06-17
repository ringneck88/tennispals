@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Add Location</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/location/create') }}" oninput="amount.value=ranking.value">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Location Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">Comment</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ old('address') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" value="{{ old('city') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="st" value="{{ old('st') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Zip</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">Latitude</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lat" value="{{ old('lat') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Longitude</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="long" value="{{ old('long') }}">
							</div>
						</div>

						


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add Location
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
