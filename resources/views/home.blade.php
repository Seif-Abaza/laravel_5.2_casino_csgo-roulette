@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						You are logged in!
						{{ $name }} </br>
						<hr>
						<h3>Users List</h3>
						<hr>
						@foreach($users as $user)
							{{ $user['name']}} {{ $user['ip'] }}</br>

						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
