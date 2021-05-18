<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\User;


class AdminController extends Controller
{
    //
    public function index()
    {

        $categories = Category::all();
        return view('/admin.index', compact('categories',$categories));
    }

    public function listUsers()
    {
        $users = User::all();
        return view('/admin.listuser', compact('users',$users));
    }

    public function addUser()
    {
       return view('admin.adduser');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'role' => ['sometimes'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function createUser(Request $request)
    {
        User::create([
            'fname'=> $request->fname,
            'lname'=> $request->lname,
            'email'=> $request->email,
            'role'=> $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/listuser')->with('success', 'New User was Created');

    }

    public function editUser(User $user)
    {
       return view('/admin/edituser', compact('user'));

    }
    public function updateUser(Request $request, User $user)
    {
        $user->update([
            'fname'=> $request->fname,
            'lname'=> $request->lname,
            'email'=> $request->email,
            'role'=> $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/admin/listuser')->with('success', 'User was Updated');

    }

    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect('/admin/listuser')->with('success', 'User was Deleted');
    }
}
