@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Customers') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="table-header">
                            <a href="{{ url('customers/create') }}" type="button" class="btn btn-primary">
                                {{ __('Add Customers') }}
                            </a>
                            <form method="POST" action="#">
                                @csrf

                                <div class="form-group row">
                                    <label for="search" class="col-md-4 col-form-label text-md-right">{{ __('Search Item') }}</label>

                                    <div class="col-md-6">
                                        <input id="search" type="text" class="form-control @error('search_item') is-invalid @enderror" name="search_item" value="{{ old('search_item') }}" autofocus>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <td>#</td>
                                        <td>Full Name</td>
                                        <td>Email</td>
                                        {{-- <td>Address</td>
                                        <td>Phone</td>
                                        <td>City</td>
                                        <td>Status</td> --}}
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $item)
                                            <tr>
                                                <th scope="row">{{$item->id}}</th>
                                                <td colspan="1" class="table-active">{{$item->name}}</td>
                                                <th scope="row">{{$item->email}}</th>
                                                {{-- <th scope="row">{{$item->address}}</th>
                                                <th scope="row">{{$item->phone}}</th>
                                                <th scope="row">{{$item->city}}</th>
                                                <th scope="row">{{$item->status ? 'Active' : 'Disabled'}}</th> --}}
                                                <td class="display">
                                                    <a class="btn btn-sm btn-success">Edit</a>

                                                    {{-- action="{{ action('ItemsControllers@destroy', ['id' => $item->id]) }}" --}}
                                                    <form style="display:inline-block" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{-- {!! $customers->links() !!} --}}
                                  {!! $customer->appends(\Request::except('page'))->render() !!}
                                  <p>
                                    Displaying {{$customer->count()}} of {{ $customer->total() }} Item(s).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
