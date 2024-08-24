<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Notifications\FriendRequestAccepted;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loc = session()->get('locale');
        App::setLocale($loc);

        $currentUserID = Auth::user()->id;
        $dataFriend = Friend::where('user_id', '=', $currentUserID)
            ->join('users', 'users.id', '=', 'friends.friend_id')
            ->get(['users.*']);

        return view('friend', compact('dataFriend'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $loc = session()->get('locale');
        App::setLocale($loc);

        $currentUserID = Auth::user()->id;
        $friendID = $request->input('friend_id');
        $request_id = $request->input('request_id');

        $friend = Friend::create([
            'user_id' => $currentUserID,
            'friend_id' => $friendID
        ]);

        $friend2 = Friend::create([
            'user_id' => $friendID,
            'friend_id' => $currentUserID
        ]);

        $updateRequest = FriendRequest::find($request_id);
        $updateRequest->status = 'accepted';
        $updateRequest->save();

        $receiver = User::find($friendID);
        $receiver->notify(new FriendRequestAccepted($currentUserID));

        return redirect()->route('friend-request.index')->with('success', 'Friend request accepted and notification sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
