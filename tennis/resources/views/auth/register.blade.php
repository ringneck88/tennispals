@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" oninput="amount.value=ranking.value">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
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
							<label class="col-md-4 control-label">Zip Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ranking</label>
							<div class="col-md-6">
								<input type="range" id="ranking" name="ranking" min="0" max="10" value="{{ old('ranking') }}" >
        						<output name="amount" for="ranking">0</output>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Gender</label>
							<div class="col-md-6">
								<input type="radio" name="gender" value="1" <?php if ( old('gender') == 1) echo 'checked'?> >Male <input type="radio" name="gender" value="0" <?php if (old('gender') == 0) echo 'checked'?>>Female
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Birth Date</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}">
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">About Me</label>
							<div class="col-md-6">
								<textarea name = "about" rows = "5" cols = "50">{{ old('about') }}</textarea>
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
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
