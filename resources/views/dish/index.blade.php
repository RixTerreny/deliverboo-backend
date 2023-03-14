@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <script>
                const forms = document.querySelectorAll('form');
    
                forms.forEach(form => {
                    form.addEventListener('submit', (event) => {
                        sure = 0;
                        if (sure==0) {
                            event.preventDefault();
                            alert("sicuro di voler eliminare questo elemento?")
                            sure =1;
                        }
                    });
                });
            </script>
            @foreach ($dishes as $dish)
                <div class="col-2 py-5">
                    <div class="card text-center bg-dark p-3 text-danger">
                        @if ($dish->image)
                            <img src="{{ asset('/storage/' . $dish->image) }}" alt=""
                                class="card-img-top img-fluid" style="">
                        @endif
                        <div class="card-tile fw-bolder">{{ $dish->name }}</div>
                        <div class="card-body">{{ $dish->description }}</div>
                        <div class="card-body">$ {{ $dish->price }}</div>
                        <div class="card-body">Visible:
                            @if ($dish->visible)
                                yes
                            @else
                                no
                            @endif
                        </div>

                        <div class="d-flex flex-column gap-2 ">
                            <a href="{{ route('dish.edit', $dish->id) }}" class="btn rounded-5 btn-primary">Edit</a>
                            <a href="{{ route('dish.show', $dish->id) }}" class="btn rounded-5 btn-info">dettagli</a>
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
