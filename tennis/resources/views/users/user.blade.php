@extends('app')

@section('content')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $user->first_name }} {{ $user->last_name }}</div>
					<div class="panel-body">
						<div>
							{{ $user->first_name }} {{ $user->last_name }}
						</div>

					</div>
			
			</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
