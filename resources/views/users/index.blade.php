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
                <div class="panel-heading">Users <a href="{{ route('roles.create') }}"  class="btn btn-default btn-sm">NEW</a></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="8%">NO</th>
                            <th width="10%">NAME</th>
                            <th>EMAIL</th>
                            <th>ROLES</th>
                            <th>PERMISSSIONS</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ (($users->currentPage() - 1 ) * $users->perPage() ) + $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>                            
                            <td>
                                @foreach ( $user->roles as $role )
                                    <a href="/roles/{{ $role->id }}">{{ $role->name }}</a>
                                    @if(!$loop->last)
                                    ,
                                    @endif                                    
                                @endforeach
                            </td>
                            <td>
                                @foreach ( $user->permissions as $permission )
                                    <a href="/permissions/{{ $permission->id }}">{{ $permission->name }}</a>
                                    @if(!$loop->last)
                                    ,
                                    @endif                                    
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
