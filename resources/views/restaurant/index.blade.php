@extends("dashboard")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        @foreach ($restaurants as $restaurant )
        <div class="col-2 py-5">
            <div class="card text-center bg-dark text-danger">
                <div class="card-tile fw-bolder">{{ $restaurant->name }}</div> 
                <div class="card-body">{{ $restaurant->address }}</div>
            </div>
        </div>
            
        @endforeach
    </div>

</div>
@endsection
