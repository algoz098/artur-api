<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GasTrack;
use App\User;
use App\Vote;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $date_30 = Carbon::today()->subDays(30);
        $date_15 = Carbon::today()->subDays(15);
        $date_7 = Carbon::today()->subDays(7);

        $gt_30 = GasTrack::where('created_at', '>=', $date_30)->count();
        $gt_15 = GasTrack::where('created_at', '>=', $date_15)->count();
        $gt_7 = GasTrack::where('created_at', '>=', $date_7)->count();

        $u_30 = User::where('created_at', '>=', $date_30)->count();
        $u_15 = User::where('created_at', '>=', $date_15)->count();
        $u_7 = User::where('created_at', '>=', $date_7)->count();

        $lastVotes = Vote::orderBy('created_at')->paginate(7);

        $data = [
            'gasTrack30Days'    => $gt_30,
            'gasTrack15Days'    => $gt_15,
            'gasTrack7Days'     => $gt_7,
            'user30Days'        => $u_30,
            'user15Days'        => $u_15,
            'user7Days'         => $u_7,
            'lastVotes'         => $lastVotes
        ];

        return view('admin/index')->with($data);
    }
}
