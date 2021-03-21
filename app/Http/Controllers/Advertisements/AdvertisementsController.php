<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Support\Renderable;

class AdvertisementsController extends Controller
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
     * Show advertisements
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $advertisements = DB::table('advertisements')->paginate(3);
        return view('advertisements.advertisements', ['advertisements' => $advertisements]);
    }

    /**
     * Show filtered advertisements
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexFiltered(): Renderable
    {
        $searchString = Session::get("searchString");
        $filteredAdvertisements = DB::table('advertisements')
            ->where('title', 'like', "%{$searchString}%")
            ->orWhere('description', 'like', "%{$searchString}%")
            ->orWhere('price', 'like', "%{$searchString}%")
            ->paginate(3);
        return view('advertisements.advertisements', ['advertisements' => $filteredAdvertisements]);
    }

    /**
     * Filter advertisements
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function filter(Request $request)
    {
        Session::put("searchString", $request->input('search'));
        return redirect('/search');
    }
}
