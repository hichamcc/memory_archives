<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memory;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {




        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $memos_active = Memory::where('status', 'active')
            ->orderBy('id', 'desc')
            ->get();
        $memos_refused = Memory::where('status', 'refused')
            ->orderBy('id', 'desc')
            ->get();
        $memos_pending = Memory::where('status', 'pending')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin/home', compact('memos_active', 'memos_refused', 'memos_pending'));
    }

    public function logout(Request $request)
    {

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
