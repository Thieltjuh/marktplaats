<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;

class CreateAdvertisementController extends Controller
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
     * Show the create/edit page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $data = array(
            'title'       => '',
            'description' => '',
            'price'       => '',
            'pageTitle'   => 'Create Advertisement',
            'actionRoute' => '/advertisements/create/post',
            'buttonText'  => 'Place advertisement'
        );

        return view('advertisements.create_edit', ['data' => $data]);
    }

    /**
     * Create advertisement
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'       => 'required',
                'description' => 'required',
                'price'       => 'required'
            ]
        );

        DB::table('advertisements')->insert(
            [
                'user_id'     => Auth::user()->id,
                'title'       => $request->input('title'),
                'description' => $request->input('description'),
                'price'       => $request->input('price'),
                'created_at'  => Carbon::now()->toDateTimeString()
            ]
        );

        return redirect('/profile');
    }
}
