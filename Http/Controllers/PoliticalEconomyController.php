<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PoliticalEconomy;


class PoliticalEconomyController extends Controller
{
    

     public function index()
    {
        $politicaleconomy = PoliticalEconomy::all();
        return view('political.index', compact('politicaleconomy'));
    }

    public function create()
    {
        return view('political.create');
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

        PoliticalEconomy::create($request->all());
        return redirect()->route('political.index');
    }

    public function show($id)
    {
        $politicaleconomy = PoliticalEconomy::findOrFail($id);
        return view('political.show', compact('politicaleconomy'));
    }

    public function edit($id)
    {
        $politicaleconomy = PoliticalEconomy::findOrFail($id);
        return view('political.edit', compact('politicaleconomy'));
    }

    public function update(Request $request, $id)
    {
        $politicaleconomy = PoliticalEconomy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
            'type' => 'required|string|max:50',
            'image_path' => 'nullable|string',
            'tutor_name' => 'required|string|max:255',
            'file_size' => 'nullable|integer',
        ]);

        $politicaleconomy->update($request->all());
        return redirect()->route('political.index');
    }

    public function destroy($id)
    {
        $politicaleconomy = PoliticalEconomy::findOrFail($id);
        $politicaleconomy->delete();
        return redirect()->route('political.index');
    }
}
