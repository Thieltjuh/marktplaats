<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class MyAdvertisementsController extends Controller
{
    /**
     * List of my advertisements
     *
     * @var array
     */
    protected $myAdvertisements;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        if (Auth::check()) {
            $this->myAdvertisements = DB::table('advertisements')->where('user_id', Auth::user()->id)->paginate(3);
        }
    }

    /**
     * Show my advertisements
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        return view('advertisements.my_advertisements', ['myAdvertisements' => $this->myAdvertisements]);
    }
}
