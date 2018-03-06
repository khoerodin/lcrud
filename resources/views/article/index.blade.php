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
                <div class="panel-heading">Articles <a href="{{ route('article.create') }}"  class="btn btn-default btn-sm">NEW</a></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="8%">NO</th>
                            <th>TITLE</th>
                            <th>CONTENT</th>
                            <th>UPDATED</th>
                            <th width="15%">ACTION</th>
                        </tr>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{ (($articles->currentPage() - 1 ) * $articles->perPage() ) + $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ str_limit($article->content, 50, '...') }}</td>
                            {{-- <td>{{ $article->created_at instanceof \Carbon\Carbon }}</td> --}}
                            <td>{{ $article->created_at->addMonths(2)->addDays(5)->format('j F Y h:i:s') }}</td>
                            <td><a href="{{ route('article.show', ['id' => $article->id]) }}">VIEW</a> | 
                            <a href="{{ route('article.destroy', ['id' => $article->id]) }}" onclick="return confirm('Yakin akan menghapus data ini?')">DELETE</a></td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
