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
                            <p>{{ $message}}</p>
                        </div>
                    @endif


                    <div class="container">
                        <div class="table-header">
                            <a href="{{ url('items/create') }}" type="button" class="btn btn-primary">
                                {{ __('Add Item') }}
                            </a>
                            <form method="GET" action="#">
                                @csrf

                                <div class="form-group row">
                                    <label for="search" class="col-md-4 col-form-label text-md-right">{{ __('Search Item') }}</label>

                                    <div class="col-md-6">
                                        <input id="search" type="text" class="form-control" name="filter" >
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
                                        <th width="230px">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($allItems as $item)
                                            <tr>
                                                <th scope="row">{{$item->id}}</th>
                                                <td colspan="1" class="table-active">{{$item->item_name}}</td>
                                                <th scope="row">{{$item->stock}}</th>
                                                <th scope="row">{{$item->unit_price}}</th>
                                                <th scope="row">{{$item->discount}}</th>
                                                <th scope="row">{{Str::limit($item->description, 20, $end='.......')}}</th>
                                                <th scope="row"><img src="images/{{$item->image_url}}" width='60' height='40' alt=""></th>
                                                <th scope="row">{{$item->status ? 'Active' : 'Disabled'}}</th>
                                                <td class="display">
                                                    <a class="btn btn-sm btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a>
                                                    <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a>
                                                    {{-- action="{{ action('ItemsControllers@destroy', ['id' => $item->id]) }}" --}}
                                                    {!! Form::open(['method' => 'DELETE','route' => ['items.destroy', $item->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
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

{{-- <script>
    $(document).ready(function() {
        function fetch_item(query = ''){
            $.ajax({
                url:"{{ route('items') }}",
                method: "GET",
                data:{query:query},
                dataType:'json',
                success:function(data){
                    $('tbody').html(data.table_data),
                    $('#total_records').text(data.total_data),
                }
            })
        }
    })
</script> --}}
@endsection
