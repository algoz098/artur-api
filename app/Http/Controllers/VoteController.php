<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function save(request $request)
    {
        $requestValid = app('App\Http\Requests\VoteRequest');
        $user = $request->user;
        
        $vote = new Vote;
        $vote->user_id = $user->id;
        $vote->origin = $request->origin;
        $vote->stars = $request->stars;
        $vote->comment = $request->comment;
        $vote->save();

        return;
    }
}
