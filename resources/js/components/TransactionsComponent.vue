<template>
    <div class="col-sm">
        <div class="card">
          <img class="card-img-top" src="images/{{$client->avatar}}" alt="">
            <div class="card-body text-centre">
                   <h5 class="card-title">{{$client->name}}</h5>
               <p class="card-text">Name: {{$client->name}} <br> Surname: {{$client->surname}}</p>
               <a href="/clients/{{$client->id}}" class="btn btn-primary">transactions</a>
               <p class="card-text"><small class="text-muted">Last updated {{$client->updated_at}}</small></p>
            </div>
        </div> 
     </div>
</template>

<script>
</script>