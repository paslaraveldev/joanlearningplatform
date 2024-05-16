<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CProgramming;



class CProgrammingController extends Controller
{
   public function index()
    {
        $cprograming = CProgramming::all();
        return view('cprogramming.index', compact('cprograming'));
    }

    public function create()
    {
        return view('cprogramming.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
            'type' => 'required|string|max:50',
            'image_path' => 'nullable|string',
            'tutor_name' => 'required|string|max:255',
            'file_size' => 'nullable|integer',
        ]);

        CProgramming::create($request->all());
        return redirect()->route('cprogramming.index');
    }

    public function show($id)
    {
        $cprograming = cprograming::findOrFail($id);
        return view('cprogramming.show', compact('cprograming'));
    }

    public function edit($id)
    {
        $cprograming = CProgramming::findOrFail($id);
        return view('cprogramming.edit', compact('cprograming'));
    }

    public function update(Request $request, $id)
    {
        $cprograming = CProgramming::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
            'type' => 'required|string|max:50',
            'image_path' => 'nullable|string',
            'tutor_name' => 'required|string|max:255',
            'file_size' => 'nullable|integer',
        ]);

        $cprograming->update($request->all());
        return redirect()->route('cprogramming.index');
    }

    public function destroy($id)
    {
        $cprograming = CProgramming::findOrFail($id);
        $cprograming->delete();
        return redirect()->route('cprogramming.index');
    }
}
