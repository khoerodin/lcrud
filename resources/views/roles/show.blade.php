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
                <div class="panel-heading">View Roles</div>

                <div class="panel-body">
                    <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST">
                    {!! csrf_field() !!}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="display_name">Display Name</label>
                        <input type="name" name="display_name" value="{{ $role->display_name }}" class="form-control" id="display_name">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="name" name="description" value="{{ $role->description }}" class="form-control" id="description">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <select name="permissions[]" multiple class="form-control" id="permissions">
                            @foreach ( $options as $permission )
                                <option value="{{ $permission['id'] }}" @if($permission['selected'] == true) selected @endif>{{ $permission['value'] }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
