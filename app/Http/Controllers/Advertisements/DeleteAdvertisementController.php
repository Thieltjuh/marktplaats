<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DeleteAdvertisementController extends Controller
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
     * Delete advertisement
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        DB::table('advertisements')->where('id', $id)->delete();
        return redirect()->back()->with(['successful_message' => 'successfully deleted record']);
    }
}
