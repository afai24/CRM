@extends('layouts.app')

@section('title', 'Clients Edit')
    
@section('content')

<form class="form-group" method="POST" action="/clients/{{$client->id}}" enctype="multipart/form-data">
        @method('PUT') <!--hide put to update the table-->
        @csrf
            <div class="form-group">
                <label for="">Name</label>
            <input type="text" name="name" value="{{$client->name}}" class="form-control">
            </div>
            <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="surname" value="{{$client->surname}}" class="form-control">
            </div>
            <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="avatar" accept="image/*" class="form-control-file">
            </div>
            <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{$client->email}}" class="form-control">
            </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
    

@endsection