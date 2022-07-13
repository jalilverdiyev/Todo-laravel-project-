<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TodoController extends Controller
{
    public function index()
    {
        $datas = Todo::whereOwner(Auth::user()->name)->get();
        return view('dashboard', compact('datas'));
    }

    public function create()
    {
        return view('add_todo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Todo::create([
            'task' => $request->task,
            'description' => $request->description,
            'owner' => Auth::user()->name,
            'is_done' => false,
            "created_at" => Date::now(),
            "updated_at" => Date::now(),
        ]);

        return redirect(RouteServiceProvider::HOME)->with('pop', 'added');
    }

    public function edit($id)
    {
        return view('edit_todo', compact('id'));
    }

    public function update(Request $request, $id)
    {
        switch ($request->state) {
            case 0:
                Todo::whereId($id)->update([
                    'task' => $request->task,
                    'description' => $request->description,
                    "updated_at" => Date::now(),
                ]);
                break;
            case 1:
                Todo::whereId($id)->update([
                    'description' => $request->description,
                    "updated_at" => Date::now(),
                ]);
                break;
            case 2:
                Todo::whereId($id)->update([
                    'task' => $request->task,
                    "updated_at" => Date::now(),
                ]);
                break;
        }
        return redirect(RouteServiceProvider::HOME)->with('pop', 'updated');
    }

    public function destroy($id)
    {
        Todo::whereId($id)->delete();
        return redirect(RouteServiceProvider::HOME)->with('pop', 'deleted');
    }

    public function done($id, $state)
    {
        switch ($state) {
            case 0:
                Todo::whereId($id)->update([
                    'is_done' => true,
                ]);
                return redirect(RouteServiceProvider::HOME)->with('pop', 'done');
            case 1:
                Todo::whereId($id)->update([
                    'is_done' => false,
                ]);
                return redirect(RouteServiceProvider::HOME)->with('pop', 'undone');
        }
    }
}
