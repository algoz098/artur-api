<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GasTrack;

class GasTrackController extends Controller
{
    public function index(request $request){
        return $request->user->gasTracks;
    }

    public function save(request $request){
        $inputs = $request->except(['api_token']);

        foreach ($inputs as $key => $input) {
            if(!isset($input['saved'])){
                if(isset($input['id'])){
                    $track = GasTrack::findOrFail($input['id']);
                } else {
                    $track = new GasTrack;
                    $track->user_id     = $request->user->id;
                }

                $track->saved       = 'true';
                $track->km_actual   = $input['km_actual'];
                $track->lts_add     = $input['lts_add'];
                $track->date        = $input['date'];
                $track->price       = $input['price'];
                $track->total       = $input['total'];
                $track->km_lt       = $input['km_lt'];
                $track->wheeled     = $input['wheeled'];

                if (isset($input['total_wheeled'])) $track->total_wheeled     = $input['total_wheeled'];
                $track->save();
            }
        }
    }

    public function delete($id){
        $track = GasTrack::findOrFail($id);

        $track->delete();
    }
}
