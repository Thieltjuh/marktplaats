<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use App\Mail\BidPlacedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Contracts\Support\Renderable;

class CreateBidsController extends Controller
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
     * Show the create bids
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id): Renderable
    {
        Session::put("advertisementId", $id);
        return view('advertisements.create_bids');
    }

    /**
     * Create bids
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'amount' => 'required',
            ]
        );

        DB::table('advertisement_bids')->insert(
            [
                'advertisement_id' => Session::get("advertisementId"),
                'user_id'          => Auth::user()->id,
                'amount'           => $request->input('amount'),
                'placed_at'        => Carbon::now()->toDateTimeString()
            ]
        );

        $advertisement = DB::table('advertisements')->where('advertisements.id', Session::get("advertisementId"))->leftJoin('users', 'user_id', '=', 'users.id')
            ->select('title', 'email')->get();

        $details = [
            'body' => "You have a new bid on your advertisement: '{$advertisement[0]->title}'"
        ];

        Mail::to($advertisement[0]->email)->send(new BidPlacedMail($details));

        return redirect()->back()->with(['successful_message' => 'successfully placed bid']);
    }
}
