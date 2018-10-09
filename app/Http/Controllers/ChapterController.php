<?php

namespace App\Http\Controllers;

use App\User;
use App\Chapter;
use App\Book;
use App\Authorinvite;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  public function formValidation(Request $request)
    {
        $this->validate($request,[
                'title' => 'required',
                'chapterNr' => 'required',
                'page' => 'required',

            ],[
                'page.required' => 'Write something',
                'title.required' => 'Add Chapter Title',
                'chapterNr.required' => 'Chapter Nr',
            ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        $mybook = Book::where('slug','=',$slug)->first();  
        $overview = new \App\Overview;
        $book = $overview->mybooksCounter();
        $coauthor = Authorinvite::where('coauthorId',$book[0]->userId)->get();
        $chapter = Chapter::where('bookId',$mybook->id)->orderBy('chapterNr','asc')->get();
        return view('chapters.index',['overview'=> $overview,'book'=>$book,'mybook'=>$mybook,'chapter'=>$chapter, 'coauthor'=>$coauthor]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);
        $chapters = new \App\Chapter;
        $chapters->userId = \Auth::user()->id;
        $chapters->bookId = $request->bookId;
        $chapters->title = $request->title;
        $chapters->page = $request->page;
        $chapters->slug = str_slug($request->title, '-');
        $chapters->chapterNr = $request->chapterNr;
        $chapters->save();
        $request->session()->flash('success', 'Chapter successfully added');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mychapter= Chapter::find($id);
        $overview = new \App\Overview;
        $book = $overview->mybooksCounter();
        $coauthor = Authorinvite::where('coauthorId',$book[0]->userId)->get();
        $chapter = Chapter::where('bookId',$mychapter->bookchapter->id)->orderBy('chapterNr','asc')->get();
        return view('chapters.edit',['overview'=> $overview,'book'=>$book,'mychapter'=>$mychapter,'chapter'=>$chapter, 'coauthor'=>$coauthor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->formValidation($request);
        $chapter = Chapter::findOrFail($id);      
        $chapter->update($request->all());
        $request->session()->flash('success', 'Chapter successfully updated');
        return back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
}
