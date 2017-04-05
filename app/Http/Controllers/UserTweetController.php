<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class UserTweetController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.tweet.create')->with('user', \Auth::User());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['content' => 'required|min:6|max:140']);

        $request->user()->tweets()->create($request->only(['content']));
        return redirect()->route('home');
    }
}
