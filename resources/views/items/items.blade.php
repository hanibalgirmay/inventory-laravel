@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">{{ __('Items') }} {{ $allItems->count()}}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p></p>
                        </div>
                    @endif


                    <div class="container">
                        <div class="table-header">
                            <a href="{{ url('items/create') }}" type="button" class="btn btn-primary">
                                {{ __('Add Item') }}
                            </a>
                            <form method="POST" action="#">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Search Item') }}</label>

                                    <div class="col-md-6">
                                        <input id="item_name" type="text" class="form-control" name="filter" value="{{ $filter }}">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <td>#</td>
                                        <td>@sortablelink('Item Name')</td>
                                        <td>@sortablelink('Stock')</td>
                                        <td>@sortablelink('Unit Price')</td>
                                        <td>@sortablelink('discount')</td>
                                        <td>Description</td>
                                        <td>Image</td>
                                        <td>Status</td>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($allItems as $item)
                                            <tr>
                                                <th scope="row">{{$item->id}}</th>
                                                <td colspan="1" class="table-active">{{$item->item_name}}</td>
                                                <th scope="row">{{$item->stock}}</th>
                                                <th scope="row">{{$item->unit_price}}</th>
                                                <th scope="row">{{$item->discount}}</th>
                                                <th scope="row">{{$item->description}}</th>
                                                <th scope="row"><img src="images/{{$item->image_url}}" width='60' height='40' alt=""></th>
                                                <th scope="row">{{$item->status ? 'Active' : 'Disabled'}}</th>
                                                <td class="display">
                                                <a class="btn btn-sm btn-success" href="{{action('ItemController@edit', ['id' => $item->id])}}">Edit</a>

                                                    {{-- action="{{ action('ItemsControllers@destroy', ['id' => $item->id]) }}" --}}
                                                    <form style="display:inline-block" action="{{action('ItemController@destroy',['id' => $item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{-- {!! $allItems->links() !!} --}}
                                  {!! $allItems->appends(\Request::except('page'))->render() !!}
                                  <p>
                                    Displaying {{$allItems->count()}} of {{ $allItems->total() }} Item(s).
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
