@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add Customer') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">

                       <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group flex-column text-left row">
                                    <label for="fname" class="col-md-4 col-form-label text-md-left">{{ __('First Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="fname" type="text" style="width: 100%" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="lname" class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="lname" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Phone Number') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number">

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="phone2" class="col-md-4 col-form-label text-md-left">{{ __('Other Phone Number') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone2" type="tel" class="form-control @error('phone_number2') is-invalid @enderror" name="phone_number2">

                                        @error('phone_number2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="address" class="col-md-4 col-form-label text-md-left">{{ __('Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="address2" class="col-md-4 col-form-label text-md-left">{{ __('Other Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2">

                                        @error('address2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('City') }}</label>

                                    <div class="col-md-12">
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city">

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group flex-column row">
                                    <label for="status" class="col-md-4 col-form-label text-md-left">{{ __('Status') }}</label>

                                    <div class="col-md-12">
                                        <select class="form-control" name="status" id="status">
                                            <option value=1>Active</option>
                                            <option value=0>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row mt-5 mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save Item') }}
                                        </button>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
