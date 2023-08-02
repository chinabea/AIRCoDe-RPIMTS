<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProponentsModel;

class ProponentsController extends Controller
{
    public function index()
    {
        $proponents = ProponentsModel::all();
        return view('proponents.index', compact('proponents'));
    }

    public function create()
    {
        return view('proponents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $proponent = new ProponentsModel;
        $proponent->title = $request->title;
        $proponent->content = $request->content;
        $proponent->status = 'under evaluation';
        $proponent->save();

        return redirect()->route('proponents.show', $proponent->id);
    }

    public function show(ProponentsModel $proponent)
    {
        return view('proponents.show', compact('proponent'));
    }

    public function edit(ProponentsModel $proponent)
    {
        return view('proponents.edit', compact('proponent'));
    }

    public function update(Request $request, ProponentsModel $proponent)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $proponent->title = $request->title;
        $proponent->content = $request->content;
        $proponent->save();

        return redirect()->route('proponents.show', $proponent->id);
    }
}
