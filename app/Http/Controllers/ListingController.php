<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=> ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::OrderBy('created_at','dec')->get()  ;
        return view('index')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createListing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);

        $listing = new Listing;   

        $listing->name = $request->input('name'); 
        $listing->website = $request->input('website'); 
        $listing->email = $request->input('email'); 
        $listing->phone = $request->input('phone'); 
        $listing->address = $request->input('address'); 
        $listing->bio = $request->input('bio'); 
        $listing->user_id = auth()->user()->id;
        
        $listing->save();

        return redirect('/dashboard')->with('success','Your List Added!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listings = Listing::find($id);
        return view('showlisting')->with('listings',$listings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('editing')->with('listing',$listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);

        $listing = Listing::find($id);   

        $listing->name = $request->input('name'); 
        $listing->website = $request->input('website'); 
        $listing->email = $request->input('email'); 
        $listing->phone = $request->input('phone'); 
        $listing->address = $request->input('address'); 
        $listing->bio = $request->input('bio'); 
        $listing->user_id = auth()->user()->id;
        
        $listing->save();

        return redirect('/dashboard')->with('success','Your List Updated!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();
        return redirect('/dashboard')->with('success','Listing Removed');
    }
}
