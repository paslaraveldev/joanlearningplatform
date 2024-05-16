<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunicationWritingSkills;

class CommunicationWritingSkillsController extends Controller
{
     public function index()
    {
        $communicationwritingskills = CommunicationWritingSkills::all();
        return view('communication.index', compact('communicationwritingskills'));
    }

    public function create()
    {
        return view('communication.create');
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

        CommunicationWritingSkills::create($request->all());
        return redirect()->route('communication.index');
    }

    public function show($id)
    {
        $communicationwritingskills = CommunicationWritingSkills::findOrFail($id);
        return view('communication.show', compact('communicationwritingskills'));
    }

   public function edit($id)
{
    $communicationwritingskills = CommunicationWritingSkills::findOrFail($id);
    return view('communication.edit', compact('communicationwritingskills'));
}

    public function update(Request $request, $id)
    {
        $communicationwritingskills = CommunicationWritingSkills::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
            'type' => 'required|string|max:50',
            'image_path' => 'nullable|string',
            'tutor_name' => 'required|string|max:255',
            'file_size' => 'nullable|integer',
        ]);

        $communicationwritingskills->update($request->all());
        return redirect()->route('communication.index');
    }

    public function destroy($id)
    {
        $communicationwritingskills = CommunicationWritingSkills::findOrFail($id);
        $communicationwritingskills->delete();
        return redirect()->route('communication.index');
    }
}
