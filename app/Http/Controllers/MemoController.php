<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memory;
use Illuminate\Support\Facades\Mail;

class MemoController extends Controller
{
    public function index()
    {
        // Retrieve approuved memos
        $memos = Memory::where('status', 'active')
            ->orderBy('id', 'desc')
            ->get();

        return view('/welcome', compact('memos'));
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'memo' => 'required',
            'name' => 'required',
            'year' => 'required|numeric',
            'city' => 'required',
            'email' => 'required|email',
        ]);

        // Create a new memo
        Memory::create([
            'memo' => $request->memo,
            'name' => $request->name,
            'year' => $request->year,
            'city' => $request->city,
            'email' => $request->email,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('submitted')->with('success', 'Your memo has been successfully submitted for review');
    }

    public function edit($id)
    {
        // Find the memo by its ID
        $memo = Memory::find($id);

        if (!$memo) {
            return redirect()->route('memos.index')->with('error', 'Memo not found');
        }

        return view('memos.edit', compact('memo'));
    }

    public function update(Request $request, $id)
    {
        // Find the memo by its ID
        $memo = Memory::find($id);

        if (!$memo) {
            return redirect()->route('memos.index')->with('error', 'Memo not found');
        }

        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:active,refused',
        ]);

        // Update the memo's status
        $memo->update(['status' => $request->status]);

        if ($request->status == 'active' ){

            $emailContent = "<div style='font-size: 18px'><p>Hello $memo->name,</p>  <p>YOUR MEMORY HAS BEEN ARCHIVED.</p></div> <hr> <b>MEMORY</b>ARCHIVES <br> <a href='https://www.memoryarchives.world/'>www.memoryarchives.world</a> ";

            Mail::html($emailContent, function ($message ) use ($memo) {
                $message->to($memo->email)
                    ->subject('Memory Approved');
            });

        }

        if ($request->status == 'refused' ){

            $emailContent = "<div style='font-size: 18px'><p>Hello $memo->name,</p>  <p>YOUR MEMORY HAS BEEN REJECTED, TRY AGAIN</p></div> <hr> <b>MEMORY</b>ARCHIVES <br> <a href='https://www.memoryarchives.world/'>www.memoryarchives.world</a> ";

            Mail::html($emailContent, function ($message ) use ($memo) {
                $message->to($memo->email)
                    ->subject('Memory Rejected');
            });

        }

        // Redirect to the index page with a success message
        return redirect()->route('home')->with('success', 'Memo status updated successfully');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function memoOverview()
    {
        $memoId = request('id');
        $memoNum = request('num');

        // Find the memo by its ID
        $memo = Memory::find($memoId);
        $name = $memo->name;
        $year = $memo->year;
        $memos = Memory::where('status', 'active')
            ->where('name', $name)
            ->where('id','!=', $memoId)
            ->orderBy('id', 'desc')
            ->get();

        if ($memos->isEmpty()) {
            $memos = Memory::where('status', 'active')
                ->where('year', $year)
                ->where('id','!=', $memoId)
                ->orderBy('id', 'desc')
                ->get();
       }

        return view('/memo_overview' , compact('memo','memos','memoNum'));
    }
}


