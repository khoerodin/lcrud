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
                <div class="panel-heading">Permissions <a href="{{ route('permissions.create') }}"  class="btn btn-default btn-sm">NEW</a></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="8%">NO</th>
                            <th width="20%">NAME</th>
                            <th>DESCRIPTION</th>
                            <th width="15%">ACTION</th>
                        </tr>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ (($permissions->currentPage() - 1 ) * $permissions->perPage() ) + $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td><a href="{{ route('permissions.show', ['id' => $permission->id]) }}">VIEW</a></td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
