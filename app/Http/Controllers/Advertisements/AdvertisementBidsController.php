<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class AdvertisementBidsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the advertisement bids.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id): Renderable
    {
        $bids = DB::table('advertisement_bids')->leftJoin('users', 'user_id', '=', 'users.id')->where('advertisement_id', $id)
            ->orderBy('placed_at', 'desc')->paginate(10);

        return view('advertisements.advertisement_bids', ['bids' => $bids]);
    }
}
