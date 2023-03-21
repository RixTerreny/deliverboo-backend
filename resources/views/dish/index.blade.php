@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="text-white bg-danger  mt-4 p-0 text-center fs-5" id="gg"></div>
            
            @foreach ($dishes as $dish)
                <div class="col-lg-4 col-sm-12 pb-5 pt-3" >
                    <div class="card text-center p-3 " style="min-height:552px">
                        @if ($dish->image)
                            <img src="{{ asset('/storage/' . $dish->image) }}" alt=""
                                class="card-img-top img-fluid" style="">
                        @endif
                        <div class="card-tile"><h4>{{ $dish->name }}</h4></div>
                        <div class="card-body">Description: {{ $dish->description }}</div>
                        <div class="card-body">Price: ${{ $dish->price }}</div>
                        <div class="card-body">Visible:
                            @if ($dish->visible)
                                yes
                            @else
                                no
                            @endif
                        </div>

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
            @endforeach
        </div>
        <script>
            const forms = document.querySelectorAll('form');
            const err = document.getElementById('gg');
        
           
            sure = 0;
            forms.forEach(form => {
                form.addEventListener('submit', (event) => {
                    if (sure==0) {
                        event.preventDefault();
                        err.innerHTML="If you are sure you want to delete this item, press delete again?"
                        sure =1;
                    }
                });
            });
        </script>
    </div>
@endsection
