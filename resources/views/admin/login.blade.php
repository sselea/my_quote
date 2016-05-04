@extends('app')
@section('content')
	<div class="login text-center">
		@if(count($errors) > 0)
			<section class="info-box-fail text-center">
				<ul>
					@foreach($errors->all() as $error)
						<li> {{$error}} </li>
					@endforeach
				</ul>
			</section>
		@endif
		@if(Session::has('fail'))
			<section class="info-box-fail text-center">
				<ul>
					{{ Session::get('fail') }}
				</ul>
			</section>
		@endif
		<h3> Log In </h3>
		<form method="post" action="{{ route('admin.login') }}">
						<div class="input_group">
							<label for="name">Username</label>
						</div>
						<div>
							<input type="text" id="name" name="name" placeholder="Username" />
						</div>
						<div class="input_group">
							<label for="password"> Pasword </label>
						</div>
						<div>
							<input type="password" id="password" name="password" placeholder="Password" />
						</div>
						<br>
						<button type="submit" class="btn"> Login </button>
						<input type="hidden" name="_token" value="{{ Session::token() }}" />
		</form>
	</div>
@endsection