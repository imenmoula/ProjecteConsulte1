<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Rendivent;
use Illuminate\Http\Request;

class RendiventController extends Controller
{
    public function index()
    {
        $rendivents = Rendivent::with('user')->get();
        return view('consulte.index', compact('rendivents'));
    }

    public function show($id)
    {
        $rendivent = Rendivent::with('user')->findOrFail($id);
        return view('consulte.show', compact('rendivent'));
    }

    public function create()
    {
        return view('consulte.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'expert_id' => 'required|exists:experts,id',
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);
    
        Rendivent::create($validated + ['user_id' => auth()->id()]);
    
        return redirect()->route('consulte.index')->with('success', 'Consultation créée avec succès.');
    }

    public function edit($id)
    {
        $rendivent = Rendivent::findOrFail($id);
        return view('consulte.edit', compact('rendivent'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);

        $rendivent = Rendivent::findOrFail($id);
        $rendivent->update($validated);

        return redirect()->route('consulte.index')->with('success', 'Rendivent mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $rendivent = Rendivent::findOrFail($id);
        $rendivent->delete();

        return redirect()->route('consulte.index')->with('success', 'Rendivent supprimé avec succès.');
    }
}
