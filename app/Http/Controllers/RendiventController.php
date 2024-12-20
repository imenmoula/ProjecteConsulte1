<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Rendivent;
use Illuminate\Http\Request;

class RendiventController extends Controller
{public function index()
    {
        $rendivents = Rendivent::all();
        return view('front.consulte.index', compact('rendivents'));
    }

    public function create()
    {
        return view('front.consulte.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);

        Rendivent::create($validated);
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous créé avec succès !');
    }

    public function show(Rendivent $rendivent)
    {
        return view('front.consulte.show', compact('rendivent'));
    }

    public function edit(Rendivent $rendivent)
    {
        return view('front.consulte.edit', compact('rendivent'));
    }

    public function update(Request $request, Rendivent $rendivent)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);

        $rendivent->update($validated);
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous mis à jour avec succès !');
    }

    public function destroy(Rendivent $rendivent)
    {
        $rendivent->delete();
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous supprimé avec succès !');
    }
}
