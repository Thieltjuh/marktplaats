<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class EditAdvertisementController extends Controller
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
     * Show the create edit page
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id): Renderable
    {
        $advertisement = DB::table('advertisements')->where('id', $id)->get();

        $data = array(
            'title'       => $advertisement[0]->title,
            'description' => $advertisement[0]->description,
            'price'       => $advertisement[0]->price,
            'pageTitle'   => 'Edit Advertisement',
            'actionRoute' => "/advertisements/update/{$id}",
            'buttonText'  => 'Edit advertisement'
        );

        return view('advertisements.create_edit', ['data' => $data]);
    }

    /**
     * Edit advertisement
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'       => 'required',
                'description' => 'required',
                'price'       => 'required'
            ]
        );

        DB::table('advertisements')
            ->where('id', $request->id)
            ->update(['title' => $request->title, 'description' => $request->description, 'price' => $request->price]);

        return redirect('/profile')->with(['successful_message' => 'successfully updated record']);
    }
}
