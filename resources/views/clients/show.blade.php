@extends('layouts.app')

@section('title', 'Client')
    
@section('content')

@include('common.success')
<img class="card-img-top rounded-circle mx-auto d-block" style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" src="/images/{{$client->avatar}}" alt="">
<div class="text-center">
    <h5>{{$client->name}}</h5>
    <a href="/clients/{{$client->id}}/edit" class="btn btn-primary">edit</a>
    <!--form using laravel collective just to show you that i also can use it-->
    <div class="content m-3">
            <a href="/transactions/index" class="btn btn-secondary">transactions</a>
        </div>
    <div class="content m-3">
        {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('delete', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
