<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendsPatchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(User $user, Request $request)
    {
        $request->user()->pendingFriendsFrom()->updateExistingPivot($user, [
            'accepted' => true,
        ]);

        return back();
    }
}
