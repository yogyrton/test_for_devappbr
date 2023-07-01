<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(EditProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        $user->update($data);

        return to_route('profile.edit')->with('success', 'Профиль изменен');
    }
}
