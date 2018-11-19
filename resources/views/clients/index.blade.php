@extends('layouts.app')

@section('title', 'Clients list')
    
@section('content')
<div class="row">
         @foreach ($clients as $client)
            <div class="col-sm">
                 <div class="card text-center">
                 <img class="card-img-top rounded-circle mx-auto d-block" style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" src="images/{{$client->avatar}}" alt="">
                  <div class="card-body text-centre">
                      <h5 class="card-title">{{$client->name}}</h5>
                  <p class="card-text">Name: {{$client->name}} <br> Last Name: {{$client->surname}}</p>
                  <a href="/clients/{{$client->id}}" class="btn btn-primary">profile</a>
                  <p class="card-text"><small class="text-muted">Last updated {{$client->updated_at}}</small></p>
                  </div>
                </div> 
            </div>
        @endforeach
</div>
    

@endsection