<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;

class UsersController extends Controller
{
    public function getIndex()
    {
        return view('datatables.index');
    }
    public function usersData()
    {
        return \DataTables::of(User::query())->make(true);
    }
}
