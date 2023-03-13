@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

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
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Lastname*') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    <span id="err-lastname"></span>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="restaurant_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant name*') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                        autocomplete="restaurant_name" autofocus>
                                    <span id="err-rest"></span>
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right custom-file-label">{{ __('photo') }}</label>
    
                                <div class="col-md-6">
                                    <input  id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="restaurant_name" autofocus>
    
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>
                                    <span id="err-address"></span>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('VAT*') }}</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" required autocomplete="vat" autofocus>
                                    <span id="err-vat"></span>
                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    <span id="err-email"></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    <span id="err-password"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <span id="err-conf"></span>
                                </div>
                            </div>

                            <div class="text-center my-3">Choose categories*</div>

                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline @error('id_category') is-invalid @enderror">
                                    {{-- Il name dell'input ha come suffisso le quadre [] che indicheranno al server,
                            di creare un array con i vari tag che stiamo inviando --}}
                                    <input class="form-check-input @error('id_category') is-invalid @enderror"
                                        type="checkbox" id="categoriesCheckbox_{{ $loop->index }}"
                                        value="{{ $category->id }}" name="id_category[]"
                                        {{ in_array($category->id, old('id_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="categoriesCheckbox_{{ $loop->index }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                            <div  id="err-k"></div>
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // let errorS= [
            //     errorSubmit1 = false,
            // errorSubmit2 = false,
            // errorSubmit3 = false,
            // errorSubmit4 = false,
            // errorSubmit5 = false,
            // errorSubmit6 = false,
            // errorSubmit7 = false,
            // errorSubmit8 = false,
            // ]
            let errorSubmit1 = false;
            let errorSubmit2 = false;
            let errorSubmit4 = false;


            const password = document.getElementById('password');
            const err = document.getElementById('err-password')
            password.addEventListener('input', () => {
                if (password.value.length < 8) {
                    err.innerHTML = 'at least 8 character'
                    return(errorSubmit1 = true);
                } else {
                    err.innerHTML = ''
                    return(errorSubmit1 = false);
                }
            })

            const conf = document.getElementById('password-confirm');
            const errC = document.getElementById('err-conf')
            conf.addEventListener('input', () => {
                if (conf.value != password.value) {
                    errC.innerHTML = 'Passwords do not match'
                    return(errorSubmit2 = true);
                } else {
                    errC.innerHTML = ''
                    return(errorSubmit2 = false);
                }
            })

            // const email = document.getElementById('email');
            // const errP = document.getElementById('err-email')
            // email.addEventListener('input', () => {
            //     if (email.value.length < 1) {
            //         errP.innerHTML = 'Required'
            //         return(errorS.errorSubmit3 = true);
            //     } else {
            //         errP.innerHTML = ''
            //         return(errorS.errorSubmit3 = false);
            //     }
            // })

            const vat = document.getElementById('vat');
            const errV = document.getElementById('err-vat')
            vat.addEventListener('input', () => {
                if (!vat.value) {
                    errV.innerHTML = 'Required'
                    return(errorSubmit4 = true);
                } else if (vat.value.length != 11 || isNaN(vat.value)) {
                    errV.innerHTML = 'Insert a valid VAT'
                    return(errorSubmit4 = true);
                } else {
                    errV.innerHTML = ''
                    return(errorSubmit4 = false);
                }
            })

            // const name = document.getElementById('name');
            // const errN = document.getElementById('err-name')
            // name.addEventListener('input', () => {
            //     if (name.value.length < 1) {
            //         errN.innerHTML = 'Required'
            //         console.log(errorSubmit4);
            //         return(errorS.errorSubmit5 = true);
            //     } else {
            //         errN.innerHTML = ''
            //         return(errorS.errorSubmit5 = false);
            //     }
                
            // })

            // const lastname = document.getElementById('lastname');
            // const errL = document.getElementById('err-lastname')
            // lastname.addEventListener('input', () => {
            //     if (lastname.value.length < 1) {
            //         errL.innerHTML = 'Required'
            //         return(errorS.errorSubmit6 = true);
            //     } else {
            //         errL.innerHTML = ''
            //         return(errorS.errorSubmit6 = false);
            //     }
            // })

            // const rest = document.getElementById('restaurant_name');
            // const errR = document.getElementById('err-rest')
            // rest.addEventListener('input', () => {
            //     if (rest.value.length < 1) {
            //         errR.innerHTML = 'Required'
            //         return(errorS.errorSubmit8 = true);
            //     } else {
            //         errR.innerHTML = ''
            //         return(errorS.errorSubmit8 = false);
            //     }
            // })

            // const address = document.getElementById('address');
            // const errA = document.getElementById('err-address')
            // address.addEventListener('input', () => {
            //     if (address.value.length < 1) {
            //         errA.innerHTML = 'Required'
            //         return(errorS.errorSubmit7 = true);
            //     } else {
            //         errA.innerHTML = ''
            //         return(errorS.errorSubmit7 = false);
            //     }
            // })

            const form = document.querySelector('form');
            const checkboxes = form.querySelectorAll('input[type="checkbox"]');
            const errK = document.getElementById('err-k')

            form.addEventListener('submit', (event) => { 
                let isOneChecked = false;

                checkboxes.forEach((checkbox) => { 
                    if (checkbox.checked) { 
                        isOneChecked = true; 
                    }
                });


                // errorS.forEach(errorSubmit => {
                //     console.log(errorSubmit);
                //     console.log('errorSubmit');
                //     if(errorSubmit){
                //         event.preventDefault(); 
                //         alert("Inserisci tutti i campi correttamente")
                //     }
                // });
                if(errorSubmit1 || errorSubmit2  || errorSubmit4 ){
                    event.preventDefault(); 
                    alert("Inserisci tutti i campi correttamente")
                }


                if (!isOneChecked) { 
                    event.preventDefault(); 
                    errK.innerHTML = 'Seleziona almeno una checkbox'; 
                }

            });
        </script>
    </div>
@endsection
