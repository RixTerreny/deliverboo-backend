@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Welcome {{ Auth::user()->name }}

        </h2>
        

        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"> <a class="text-decoration-none">Your Dishes</a></div>

                    <div class="card-body">
                        <a href="{{ route('dish.create') }}"><button class="btn btn-primary">Add Plate</button></a>
                        <a class="text-decoration-none" href="{{ route('dish.index') }}"><button class="btn btn-primary">Your Dishes</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-2 ">
            <div class="col">
                <div class="card">
                    <div class="card-header"> <a class="text-decoration-none" href="#">Orders Received</a></div>

                    <div class="card-body">
                        <a href=""><button class="btn btn-primary">Order Statistics</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
