@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">{{ __('Show Item') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p></p>
                        </div>
                    @endif


                    <div class="container">
                        <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                        <div class="table-header">

                            <div class="row">
                                <div class="col-md-6">
                                    <img height="400px" src="/images/{{$item->image_url}}" alt="">
                                </div>
                                <div class="col-md-6">
                                    <div>Item Name: {{ $item->item_name }}</div>
                                    <div>Discount: {{ $item->discount }}</div>
                                    <div>Stock: {{ $item->stock }}</div>
                                    <div>Unit Price: {{ $item->unit_price }}</div>
                                    <div>Description: {{ $item->desccription }}</div>

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
