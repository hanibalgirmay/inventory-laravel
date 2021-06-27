@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">{{ __('Show Vendor') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @endif


                    <div class="container">
                        <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
                        <div class="table-header">

                            <div class="row">
                                <div class="col-md-12">
                                    <div>Name: {{ $item->name }}</div>
                                    <div>Email: {{ $item->email }}</div>
                                    <div>Mobile: {{ $item->mobile }}</div>
                                    <div>Mobile alternative: {{ $item->mobile2 }}</div>
                                    <div>Address: {{ $item->address }}</div>
                                    <div>Address alternative: {{ $item->address2 }}</div>
                                    <div>City: {{ $item->city }}</div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
