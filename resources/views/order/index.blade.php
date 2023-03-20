@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach ($orders as $order)
                <div class="col-sm-8 col-md-6 col-lg-2  my-5">
                    <div class="card text-center bg-dark p-3 text-danger">
                        <div class="card-tile fw-bolder">{{ $order->customer_name . ' ' . $order->customer_lastname }}</div>
                        <div class="mt-3 text-white">address: </div>
                        <div class="">{{ $order->customer_delivery_address }}</div>
                        <div class="mt-3 text-white">phone number: </div>
                        <div class="">{{ $order->customer_phone }}</div>
                        <div class="mt-3 text-white">order date: </div>
                        <div class="">{{ $order->date }}</div>
                        <div class="mt-3 text-white">total: </div>
                        <div class="mb-3">$ {{ $order->total }}</div>
                        {{-- @foreach ($order->dishes as $dish)
                            <li>{{ $dish->name }}</li>
                        @endforeach --}}
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            const forms = document.querySelectorAll('form');


            sure = 0;
            forms.forEach(form => {
                form.addEventListener('submit', (event) => {
                    if (sure == 0) {
                        event.preventDefault();
                        alert("sicuro di voler eliminare questo elemento?")
                        sure = 1;
                    }
                });
            });
        </script>
    </div>
@endsection
