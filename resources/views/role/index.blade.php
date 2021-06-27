@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Role Management') }}</div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                        {{-- @can('role-create') --}}
                            <a class="btn btn-success" href="{{ route('role.create') }}"> Create New Role</a>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>

                <div class="card-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="container">
                    <div class="row">
                        <div class="col">
                          <table class="table table-bordered">
                    <thead>
                        <td>No</td>
                        <td>Name</td>
                        <th width="280px">Action</th>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <tH>{{ ++$i }}</th>
                        <th>{{ $role->name }}</th>
                        <th>
                            <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                            {{-- @can('role-edit') --}}
                                <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                            {{-- @endcan --}}
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>



{!! $roles->render() !!}

@endsection
