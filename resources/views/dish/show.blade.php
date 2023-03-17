@extends("dashboard")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-6 py-5">
            <div class="card text-center p-3">
                @if ($dish->image)
                    <img src="{{ asset('/storage/' . $dish->image) }}" alt=""
                        class="card-img-top img-fluid" style="">
                @endif
                <div class="card-tile fw-bolder"><h4>{{ $dish->name }}</h4></div> 
                <div class="card-body">Description: {{ $dish->description }}</div>
                <div class="card-body">Price: ${{ $dish->price }}</div>
                <div class="d-flex justify-content-around">
                    <a href="{{ route('dish.edit', $dish->id) }}"><button class="btn rounded-5 btn-primary">Edit</button></a>
                    <form action="{{ route('dish.destroy', $dish->id) }}" method="POST">
                        @csrf()
                        @method('delete')
                        <button class="btn rounded-5 btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>
@endsection
