<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GasTrackSetUserRequest;

use App\GasTrack;

use Session;
// use App\User;
// use App\Vote;
// use Carbon\Carbon;

class GasTrackController extends Controller
{
    public function index(){
        $tracks = GasTrack::paginate(10);

        $data = [
            'tracks'    => $tracks,
        ];

        return view('admin/gas-tracks/index')->with($data);
    }

    public function setUser(GasTrackSetUserRequest $request){
        foreach ($request->gas_track_ids as $key => $id) {
            $track = GasTrack::find($id);

            if(!$track) continue;

            $track->user_id = $request->user_id;
            $track->save();
        }

        Session::flash('success',  'Setting the user successfull');
        
        return redirect()->back();
    }
}
