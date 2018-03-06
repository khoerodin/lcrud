@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        
            <div class="panel panel-default">
                <div class="panel-heading">New Permission</div>

                <div class="panel-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control" id="name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="display_name">Display Name</label>
                        <input type="name" name="display_name" class="form-control" id="display_name">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="name" name="description" class="form-control" id="description">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
