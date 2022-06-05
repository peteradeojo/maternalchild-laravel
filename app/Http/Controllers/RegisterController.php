<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // define index method to return register view
    public function index()
    {
        $departments = Department::all();
        return view('auth.register', compact('departments'));
    }

    // define store method to store user data
    public function store(Request $request)
    {
        // validate user data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'department_id' => 'integer|required|exists:departments,id',
        ]);

        // create new user
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->department_id = $request->department_id;

        // Department::find($request->department_id)->members_no += 1;
        $department = Department::find($request->department_id);
        $department->members_no += 1;

        $department->save();
        $user->save();

        // login user
        // auth()->login($user);
        Auth::attempt($request->only('email', 'password'));
        event(new Registered($user));

        // redirect to login page
        return redirect()->route('login');
    }
}
