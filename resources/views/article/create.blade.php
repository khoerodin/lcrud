@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        
            <div class="panel panel-default">
                <div class="panel-heading">New Article</div>

                <div class="panel-body">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Title</label>
                        <input type="title" name="title" class="form-control" id="title">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="10"></textarea>
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                     <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
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
