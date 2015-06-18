@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Match Oppertunity</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/match/create') }}" oninput="amount.value=ranking.value">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						

						<div class="form-group">
							<label class="col-md-4 control-label">Open for Matches From:</label>
							<div class="col-md-6">
								<input type="datetime-local" class="form-control" name="open_date_time" value="{{ old('open_date_time') }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">To:</label>
							<div class="col-md-6">
								<input type="datetime-local" class="form-control" name="close_date_time" value="{{ old('open_date_time') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Loction</label>
							<div class="col-md-6">
								<select class="form-control" name="location_id">
								@foreach( $locations as $location )
								  <option value="{{ $location->id }}">{{$location->name}}</option>
								@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">	
							<label class="col-md-4 control-label">Ranking</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="ranking" value="{{ old('ranking') }}">
							</div>
						</div>

						<div class="form-group">	
							<label class="col-md-4 control-label">Gender</label>
							<div class="col-md-6">
								<input type="radio" name="gender" value="1" <?php if ( old('gender') == 1) echo 'checked'?> >Male <input type="radio" name="gender" value="0" <?php if (old('gender') == 0) echo 'checked'?>>Female <input type="radio" name="gender" value="3" <?php if ( old('gender') == 3) echo 'checked'?> >Any
							</div>
						</div>

						<div class="form-group">	
							<label class="col-md-4 control-label">Comment</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add Match Request
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
