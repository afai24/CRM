@extends('layouts.app')

@section('content')
	<div class="container">

		{!! Form::open(['route' => 'transaction.store', 'method' => 'POST']) !!}
		
			@include('transactions.form')

			{!! Form::submit('save',['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
@endsection