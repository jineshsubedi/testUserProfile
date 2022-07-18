<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class UserProfileController extends Controller
{
    protected $disk = 'public';
    protected $path = 'user';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    } 

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $avatar = auth()->user()->avatar;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store($this->path, $this->disk);
        }
        User::find(auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password != '' ? bcrypt($request->password) : auth()->user()->password,
            'avatar' => $avatar,
        ]);
        
        $notification = Str::toastMsg('Profile Updated', 'success');
        return back()->with($notification);
    }
}
