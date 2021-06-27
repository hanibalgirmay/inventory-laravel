@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Vendor') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <a href="{{ route('vendors.create') }}" type="submit" class="btn btn-primary">
                            {{ __('Add Vendor') }}
                        </a>
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Mobile</td>
                                        <td>Address</td>
                                        <td>City</td>
                                        <td>Status</td>
                                        <td width="230px">Action</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendors as $item)
                                            <tr>
                                                <th scope="row">{{$item->vendorID}}</th>
                                                <td class="table-active">{{$item->name}}</td>
                                                <td class="table-active">{{$item->email}}</td>
                                                <td class="table-active">{{$item->mobile}}</td>
                                                <td class="table-active">{{$item->address}}</td>
                                                <td class="table-active">{{$item->city}}</td>
                                                <td class="table-active">{{$item->status ? 'Active' : 'Disabled'}}</td>
                                                <td class="display">
                                                    <a class="btn btn-sm btn-success" href="{{ route('vendors.edit', $item->vendorID) }}">Edit</a>
                                                    <a class="btn btn-info" href="{{ route('vendors.show', $item->vendorID) }}">Show</a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['vendors.destroy', $item->vendorID],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{-- {!! $vendors->links() !!} --}}
                                  {!! $vendors->appends(\Request::except('page'))->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
