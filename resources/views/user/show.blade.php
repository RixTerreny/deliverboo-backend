@extends("dashboard")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-2 py-5">
            <div class="card text-center bg-dark text-danger">
                <div class="card-tile fw-bolder">{{ $user->name }} {{ $user->lastname }}</div> 
                <div class="card-body">{{ $user->email }}</div>
            </div>
        </div>
    </div>

</div>
@endsection

{{-- <div>{{ $user->name }}</div>
<div>{{ $user->lastname }}</div>
<div>{{ $user->email }}</div> --}}