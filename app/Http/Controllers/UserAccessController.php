<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        if ($request->user()->can('create-tasks')) {
            // create task here
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->user()->can('edit-tasks')) {
            // create task here
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->user()->can('delete-tasks')) {
            // dlete task here
        }
    }
}
