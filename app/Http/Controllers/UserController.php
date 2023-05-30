<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_no' => ['required', 'min:10','max:10'],
            'address' => ['required','max:255'],
            'file' => ['required'],
        ]);

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
            'password' => Hash::make('password@123'),
            'is_admin' => 0,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'profile_image' => $fileName,
        ]);
        return redirect()->route('user.index')->with('success','User created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone_no' => ['required', 'min:10','max:10'],
            'address' => ['required','max:255']
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            if($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/uploads',$fileName);
            }
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'profile_image' => $fileName,
            'user_status' => $request->status,
        ]);

        return redirect()->route('user.index')->with('success','User updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','User deleted successfully!');
    }
}
