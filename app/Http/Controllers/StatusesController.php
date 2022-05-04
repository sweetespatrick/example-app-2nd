<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Status;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request,['content' => 'required|max:140']);
        Auth::user()->status->create(['content' => $request['content']]);//原文为statuses疑为错误
        session()->flash('success','发布成功！');
        return redirect()->back();

    }
}
