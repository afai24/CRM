@extends('layouts.app')
	@section('content')
	<div class="container">

		{!! Form::model($transaction, ['route' => ['transaction.update',$transaction], 'method' => 'PUT']) !!}
		
			@include('transaction.form')

			{!! Form::submit('save',['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
	@endsection