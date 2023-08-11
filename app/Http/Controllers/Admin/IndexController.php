<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.index');
    }
}
