<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Authorinvite;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formValidation(Request $request)
    {
        $this->validate($request,[
                'title' => 'required',
                'brief' => 'required',

            ],[
                'brief.required' => 'Brief for book is required',
                'title.required' => 'Add Book Title',
              
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->status == '1')
        {
            $overview = new \App\Overview;
            $book = $overview->mybooksCounter();
            // $bffonline = User::all();
            $id = \Auth::user()->id;
            $coauthor = Authorinvite::where('coauthorId',$id)->get();
            return view('books.index', ['overview'=> $overview, 'book'=>$book, 'coauthor'=>$coauthor]);     
        }
        else
        {      
            \Auth::logout(\Auth::user());
            \Session::flash('error', 'Your gabsPad account is not active. Please goto your email and activate your account');
            return redirect()->to('/');
        }       
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bffbooks()
    {
        if(\Auth::user()->status == '1')
        {        
            $overview = new \App\Overview;
            $book = $overview->mybooksCounter();
            $id = \Auth::user()->id;
            $coauthor = Authorinvite::where('coauthorId',$id)->get();
            return view('books.bffbooks', ['overview'=> $overview,'book'=>$book, 'coauthor'=>$coauthor]);     
        }
        else
        {      
            \Auth::logout(\Auth::user());
            \Session::flash('error', 'Your gabsPad account is not active. Please activate your account');
            return redirect()->to('/');
        }       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if(\Auth::user()->status == '1')
        {
         
            $overview = new \App\Overview;
            $book = $overview->mybooksCounter();
           
            $id = \Auth::user()->id;
            $coauthor = Authorinvite::where('coauthorId',$id)->get();
            return view('books.create', ['overview'=> $overview,'book'=>$book, 'coauthor'=>$coauthor]);     
        }
        else
        {      
            \Auth::logout(\Auth::user());
            \Session::flash('error', 'Your gabsPad account is not active. Please activate your account');
            return redirect()->to('/');
        }        
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
        $books = new \App\Book;
        $books->userId = \Auth::user()->id;
        $books->title = $request->title;
        $books->slug = str_slug($request->title, '-');
        $books->brief = $request->brief;
        $books->save();
        $request->session()->flash('success', 'Book successfully added');
        return redirect()->to('/chapters/'.$books->slug);    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bffbooks= Book::find($id);
        $userId = \Auth::user()->id;
        $overview = new \App\Overview;
        $book = $overview->mybooksCounter();
        $coauthor = Authorinvite::where('coauthorId',$userId)->get();
        if($userId == $bffbooks->userId)
        {
        return view('books.edit', ['overview'=>$overview,'coauthor'=>$coauthor,'book'=>$book, 'bffbooks' => $bffbooks]);
        }
        else
        {
            \Session::flash('error', 'Not Authorised. Please edit your own books');
           return redirect()->to('\books\nopage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->formValidation($request);
        $book = Book::findOrFail($id);
        
        $book->update($request->all());
        $request->session()->flash('success', 'Book successfully updated');

        return redirect()->route('mybooks.index');                  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
