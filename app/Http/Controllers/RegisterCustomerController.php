<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisterCustomerController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_no' => ['required', 'min:10','max:10'],
            'address' => ['required','max:255']
        ]);
        $role = $request->is_admin;
        if($request->hasFile('file')) {
            $file = $request->file('file');
            if($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/uploads',$fileName);
            }
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $role,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'profile_image' => $fileName,
        ]);
        if($role == 1){
            $user->assignRole('admin');
        }
        else{
            $user->assignRole('customer');
        }

        event(new Registered($user));
        Auth::login($user);

        if(Auth::user()->can('admin.dashboard')){
            return redirect()->intended(RouteServiceProvider::DASHBOARD);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
