<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function send(Request $request)
    {
        $sender_id = $request['sender_id'];
        $receiver_id = $request['receiver_id'];

        $fr = FriendRequest::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
        ]);

        return $fr;
    }

    public function accept(FriendRequest $friendRequest)
    {
        $friendRequest->is_accepted = true;
        $friendRequest->is_pending = true;
        $friendRequest->save();
    }

    public function delete(FriendRequest $friendRequest)
    {
        $friendRequest->delete();
    }

    public function cancel(FriendRequest $friendRequest)
    {
        $friendRequest->delete();
    }

    public function get_accepted(User $user)
    {
        return $user->acceptedRequests;
    }

    public function get_pending(User $user)
    {
        return $user->pendingRequests;
    }
}
