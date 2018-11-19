@extends('layouts.app')

@section('title', 'Clients Create')
    
@section('content')
    
    @include('common.errors')
    
    <form class="form-group" method="POST" action="/clients" enctype="multipart/form-data">
        
        @include('clients.form')
        <button type="submit" class="btn btn-primary">save</button>
    </form>
    

@endsection