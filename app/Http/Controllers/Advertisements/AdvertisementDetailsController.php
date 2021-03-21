<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class AdvertisementDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the advertisement details
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id): Renderable
    {
        $advertisement = DB::table('advertisements')->where('id', $id)->get();
        $placeBid = false;

        if (Auth::check() && Auth::user()->hasVerifiedEmail() && $advertisement) {
            $placeBid = Auth::user()->id !== $advertisement[0]->user_id;
        }

        $data = array(
            'advertisement' => $advertisement,
            'placeBid'      => $placeBid
        );

        return view('advertisements.advertisement_details', ['data' => $data]);
    }
}
