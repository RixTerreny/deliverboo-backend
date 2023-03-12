@extends("dashboard")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        @foreach ($dishes as $dish )
        <div class="col-2 py-5">
            <div class="card text-center bg-dark p-3 text-danger">
                <div class="card-tile fw-bolder">{{ $dish->name }}</div> 
                <div class="card-body">{{ $dish->description }}</div>
                <div class="card-body">$  {{ $dish->price }}</div>
                
                <div class="d-flex flex-column gap-2 ">
                    <a href="{{ route('dish.edit', $dish->id) }}" class="btn rounded-5 btn-primary">Edit</a>
                    <a href="{{ route('dish.show', $dish->id)}}" class="btn rounded-5 btn-info">dettagli</a>
                    <form action="{{ route('dish.destroy', $dish->id) }}" method="POST">
                        @csrf()
                        @method('delete')
                        <button class="btn rounded-5 btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>

</div>
@endsection
