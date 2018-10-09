<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Authorinvite;
use App\Notifications\authorRegisterNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AuthorinviteController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public $user = null;
    
    public function formValidation(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'schoolname' => 'required',

            ],[
                'name.required' => 'Enter name',
                'email.required' => 'Enter email',
                'schoolname.required'=>'Enter your school'
            ]);

    }
    public function index($slug)
    {
        $userId = \Auth::user()->id;
       // $bk = $slug;
         $bk = Book::where('slug','=',$slug)->first();
        // count nr for user
        $overview = new \App\Overview;
        $book = $overview->mybooksCounter();
        
        // find all books user is coauthor
        $coauthor = Authorinvite::where('coauthorId',$userId)->get();
        
        
      //  SELECT * FROM `authorinvites`, books WHERE authorinvites.bookId = books.id AND books.userId=1
        $bff = User::select("b.name", "books.title",  "authorinvites.coauthorId",  "authorinvites.status")
            ->join("books","books.userId","=","users.id")
            ->join("authorinvites","authorinvites.bookId","=","books.id")
            ->join("users as b","authorinvites.coauthorId","=","b.id")
                    ->where("users.id","=",$userId)
            ->get();
 
        return view('coauthors.index', ['book'=>$book,'bk'=>$bk,'overview'=> $overview,'coauthor'=>$coauthor, 'bff'=>$bff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data, $bookId)
    { 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $bookId)
    {
        $this->formValidation($request);
        $user = User::where('email','=',$request->email)->first();
        if (!$user) {
        $activation_code = str_random(30).time(); // some logic to decide user's plan
        $request->request->add(['activation_code' => $activation_code]);
        $request->request->add(['password' => bcrypt('secret')]);
        User::create($request->all());
        $user = User::where('email','=',$request->email)->first();
        $user->notify(new authorRegisterNotification($user));
       }

        Authorinvite::create([
            'bookId' => $bookId,
            'coauthorId' => $user->id,
            
       ]);
         return redirect()->to('/mybooks');
         
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Authorinvite  $authorinvite
     * @return \Illuminate\Http\Response
     */
    public function show(Authorinvite $authorinvite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Authorinvite  $authorinvite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       $userId = \Auth::user()->id;
       $bffauthor = Authorinvite::find($id);
      //return response ($bffauthor, 200);
 
        $bk = Book::where('slug','=',$bffauthor->coauthorbook->slug)->first();
        // count nr for user
        $book = Book::where('userId',$userId)->get();
        // count all BFF books online
        $bkonline = Book::all();
        // count all registered users
        $bffonline = User::all();
        // find all books user is coauthor
        $coauthor = Authorinvite::where('coauthorId',$userId)->get();
   
        
      //  SELECT * FROM `authorinvites`, books WHERE authorinvites.bookId = books.id AND books.userId=1
        $bff = User::select("b.name", "books.title",  "authorinvites.coauthorId")
            ->join("books","books.userId","=","users.id")
            ->join("authorinvites","authorinvites.bookId","=","books.id")
            ->join("users as b","authorinvites.coauthorId","=","b.id")
                    ->where("users.id","=",$userId)
            ->get();
               return view('coauthors.edit', ['bffauthor'=>$bffauthor,'book'=>$book,'bk'=>$bk,'bffonline'=> $bffonline,'bkonline'=> $bkonline,'coauthor'=>$coauthor, 'bff'=>$bff]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Authorinvite  $authorinvite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $bffinvite = Authorinvite::find($id); 
        $bffinvite->status = "1";
        $bffinvite->save();
        \Session::flash('success', 'Invitation Accepted');
            return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Authorinvite  $authorinvite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authorinvite $authorinvite)
    {
        //
    }
}
