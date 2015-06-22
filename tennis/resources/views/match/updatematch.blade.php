@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Update Match Oppertunity</div>
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

					<form class="form-horizontal" role="form" method="POST" action="/match/{{$match->id}}/update"  onsubmit="window.close();">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						

						<div class="form-group">
							<label class="col-md-4 control-label">Open for Matches From:</label>
							<div class="col-md-6">
								<input type="datetime-local" class="form-control" name="open_date_time" value="{{ $match->prettydate($match->open_date_time) }}">
							</div>
						</div>
						
						<div class="form-group">	
							<label class="col-md-4 control-label">To:</label>
							<div class="col-md-6">
								<input type="datetime-local" class="form-control" name="close_date_time" value="{{ $match->prettydate($match->close_date_time)  }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Loction</label>
							<div class="col-md-6">
								<select class="form-control" name="location_id">
								@foreach( $locations as $location )
								  <option value="{{ $location->id }}" <?php if ($match->location_id == $location->id) echo ' selected ';?> >{{$location->name}}</option>
								@endforeach
								</select>
							</div>
						</div>

						{{-- <div class="form-group">	
							<label class="col-md-4 control-label">Ranking</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="ranking" value="{{ $match->ranking }}">
							</div>
						</div> --}}

						<div class="form-group">	
							<label class="col-md-4 control-label">Gender</label>
							<div class="col-md-6">
								<input type="radio" name="gender" value="m" <?php if ( $match->gender == 1) echo 'checked'?> >Male <input type="radio" name="gender" value="f" <?php if ($match->gender == 0) echo 'checked'?>>Female <input type="radio" name="gender" value="n" <?php if ( $match->gender == 3) echo 'checked'?> >Any
							</div>
						</div>

						<div class="form-group">	
							<label class="col-md-4 control-label">Comment</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="comment" value="{{ $match->comment }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update Match Request
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
