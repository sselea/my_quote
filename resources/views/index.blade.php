@extends('app')

@section('title')
@endsection

@section('styles')
	<link rel="stylsheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')
		@if(!empty(Request::segment(1)))
			<section class="filter">
				A filter has been set <a href="{{ route('index' )}}">Show all Quotes</a>
			</section>
		@endif
		@if(count($errors) > 0)
			<section class="info-box-fail text-center">
				<ul>
					@foreach($errors->all() as $error)
						<li> {{$error}} </li>
					@endforeach
				</ul>
			</section>
		@endif
		@if(Session::has('success'))
			<section class="info-box-success text-center">
				{{ Session::get('success')}}
			</section>
		@endif
		<div class="quote-list text-center">
			<h3> Latest Quotes </h3>
			<?php $grid = "col-md-4" ;?>
			<?php $rows = floor(count($quotes)/ 3); ?>
			@if (count($quotes) == 1)
				<?php $grid = "col-md-12" ;?>
			@endif
			@if (count($quotes) == 2)
				<?php $grid = "col-md-6" ;?>
			@endif
			@if (count($quotes) == 3)
				<?php $grid = "col-md-4" ;?>
			@endif
			
					@for($i = 0; $i < count($quotes); $i++)
						<?php 
							if(($i) / 3 == $rows) {
								if(count($quotes) - ($i) == 2 ) {
									$grid = "col-md-6";
								}
								if(count($quotes) - ($i) == 1) {
									$grid= "col-md-12";
								}
							}
						?>
						<div class=<?php echo $grid ?>>
							<article class="quote"> 
								<div class="delete_quote"><a href ="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}">x</a></div>
									<p>	{{ $quotes[$i]->quote }} </p>
								<div class="info">Created by <a href="{{ route('index', ['author' => $quotes[$i]->author->name]) }}"> {{$quotes[$i]->author->name}} </a> on {{ $quotes[$i]->created_at }} </div>
							</article>
						</div>
					@endfor
			<br>
		</div>
		<div class="text-center pagination-centered">
				{!! $quotes->render() !!}
		</div>
		<hr>


		<div class="row text-center quote-creation">
			<h3> Add a Quote </h3>
			<form method="post" action="{{ route('create')}}">
				<div class="input_group">
					<label for="author"> Your Name </label>
				</div>
				<div>
					<input type="text" id="author" name="author" placeholder="Your Name" />
				</div>
				<div class="input_group">
					<label for="email"> Your E-Mail </label>
				</div>
				<div>
					<input type="text" id="email" name="email" placeholder="Your E-Mail" />
				</div>
				<div class="input_group">
					<label for="quote"> Your Quote </label>
				</div>
				<div>
					<textarea name="quote" id="quote" rows=5 placeholder="Your Quote goes here..."></textarea>
				</div>
				<button type="submit" class="btn"> Submit Quote </button>
				<input type="hidden" name="_token" value="{{ Session::token() }}" />
			</form>
		</div>


@endsection

