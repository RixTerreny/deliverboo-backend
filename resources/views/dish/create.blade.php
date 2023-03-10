@extends('dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Dish') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('dish.store') }}">
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
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <span id="err-name"></span>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description*') }}</label>

                                <div class="col-md-6">
                                    {{-- <input  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> --}}
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        value="{{ old('description') }}" rows="3"></textarea>
                                    <span id="err-descr"></span>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price" autofocus>
                                    <span id="err-price"></span>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="mb-4 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right custom-file-label">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input  id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="restaurant_name" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}
                            <div class="mb-4 row">
                                <label for="visible"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Visible*') }}</label>

                                <div class="col-md-6">
                                    {{-- <input  id="visible" type="text" class="form-control @error('visible') is-invalid @enderror" name="visible" value="{{ old('visible') }}" required autocomplete="visible" autofocus> --}}
                                    <div class="form-check form-switch">
                                        <input checked value="1" name="visible" class="form-check-input"
                                            type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    </div>
                                    @error('visible')
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
