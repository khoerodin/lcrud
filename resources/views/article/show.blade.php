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
                <div class="panel-heading">View Article</div>

                <div class="panel-body">
                    <form action="{{ route('article.update', ['id' => $article->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="title" name="title" value="{{ $article->title }}" class="form-control" id="title">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="10">{{ $article->content }}</textarea>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image">Image</label>
                            <div style="margin-bottom:10px;">
                                <img src="{{ url('/assets/img/500/' . $article->image) }}" class="img-thumbnail">                                
                                <img src="{{ url('/assets/img/400/' . $article->image) }}" class="img-thumbnail">                                
                                <img src="{{ url('/assets/img/300/' . $article->image) }}" class="img-thumbnail">                                
                            </div>
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
