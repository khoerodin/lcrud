@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (session('status'))
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('status') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Roles <a href="{{ route('roles.create') }}"  class="btn btn-default btn-sm">NEW</a></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="8%">NO</th>
                            <th width="20%">NAME</th>
                            <th>DESCRIPTION</th>
                            <th width="15%">ACTION</th>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ (($roles->currentPage() - 1 ) * $roles->perPage() ) + $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td><a href="{{ route('roles.show', ['id' => $role->id]) }}">VIEW</a></td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
