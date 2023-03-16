@extends('dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Order') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    This data are not valid:

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-4 row">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('date*') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="text"
                                        class="form-control @error('date') is-invalid @enderror" date="date"
                                        value="{{ old('date') }}" required autocomplete="date" autofocus>
                                    <span id="err-date"></span>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="total"
                                    class="col-md-4 col-form-label text-md-right">{{ __('total*') }}</label>

                                <div class="col-md-6">
                                    {{-- <input  id="total" type="text" class="form-control @error('total') is-invalid @enderror" date="total" value="{{ old('total') }}" required autocomplete="total" autofocus> --}}
                                    <textarea id="total" name="total" class="form-control @error('total') is-invalid @enderror"
                                        value="" rows="3">{{ old('total') }}</textarea>
                                    <span id="err-descr"></span>
                                    @error('total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="customer_delivery_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_delivery_address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="customer_delivery_address"
                                        value="{{ old('customer_delivery_address') }}" required autocomplete="customer_delivery_address" autofocus>
                                    <span id="err-customer_delivery_address"></span>
                                    @error('customer_delivery_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="customer_phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_phone" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="customer_phone"
                                        value="{{ old('customer_phone') }}" required autocomplete="customer_phone" autofocus>
                                    <span id="err-customer_phone"></span>
                                    @error('customer_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="customer_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_name" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="customer_name"
                                        value="{{ old('customer_name') }}" required autocomplete="customer_name" autofocus>
                                    <span id="err-customer_name"></span>
                                    @error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="customer_lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_lastname" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="customer_lastname"
                                        value="{{ old('customer_lastname') }}" required autocomplete="customer_lastname" autofocus>
                                    <span id="err-customer_lastname"></span>
                                    @error('customer_lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="id_dish"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="id_dish" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="id_dish"
                                        value="{{ old('id_dish') }}" required autocomplete="id_dish" autofocus>
                                    <span id="err-id_dish"></span>
                                    @error('id_dish')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="quantity"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="quantity"
                                        value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                    <span id="err-quantity"></span>
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let errorSubmit1 = false;
            let errorSubmit2 = false;
            let errorSubmit3 = false;
            const name = document.getElementById('name');
            const errN = document.getElementById('err-name');
            const description = document.getElementById('description');
            const errD = document.getElementById('err-descr');
            const price = document.getElementById('price');
            const errP = document.getElementById('err-price');

            description.addEventListener('input', () => {
                if (description.value.length < 1) {
                    errD.innerHTML = 'Required';
                    errorSubmit1 = true;
                } else {
                    errD.innerHTML = '';
                    errorSubmit1 = false;
                }
            })

            name.addEventListener('input', () => {
                if (name.value.length < 1) {
                    errN.innerHTML = 'Required'
                    errorSubmit2 = true;
                } else {
                    errN.innerHTML = '';
                    errorSubmit2 = false;
                }
            })

            price.addEventListener('input', () => {
                if (isNaN(price.value) || parseFloat(price.value) <= 0) {
                    errP.innerHTML = 'insert a valid input';
                    errorSubmit3 = true;
                } else if (!price.value) {
                    errP.innerHTML = 'Required';
                    errorSubmit3 = true;
                } else {
                    errP.innerHTML = '';
                    errorSubmit3 = false;
                }
                console.log(errorSubmit3);
            });

            const form = document.querySelector('form');

            form.addEventListener('submit', (event) => {
                if (errorSubmit3) {
                    event.preventDefault();
                    alert("Inserisci tutti i campi correttamente")
                }
            });
        </script>
    </div>
@endsection
