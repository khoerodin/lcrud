<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->paginate();
        return view('article/index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('article/create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'title' => 'required|unique:articles,title|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        
        if( $request->hasFile('image') ){
            $article->image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $article->image);
        }
        
        $article->save();

    	return redirect('/articles')
    		->with('status','Article saved successfully.');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article/show', ['article' => $article]);
    }

    public function update(Request $request, $id)
   {
        $article = Article::find($id);  

        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        if( $request->hasFile('image') ){
            $article['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $article['image']);
        }
        
        $article->save();

        return redirect()->route('article.show', ['id' => $id])
    		->with('status','Article updated successfully.');
   }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('article')
                        ->with('status','Article deleted successfully');
    }
}
