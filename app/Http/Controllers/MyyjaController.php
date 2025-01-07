<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myyja;

class MyyjaController extends Controller
{
    public function index()
    {
        $myyjats = Myyja::all();
        return view('myyja.index', compact('myyjats'));
    }

    public function create()
    {
        return view('myyja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nimi' => 'required|string|max:255',
            'kayttajatunnus' => 'required|string|max:255|unique:myyja',
            'salasana' => 'required|string|min:6',
            'rooli' => 'required|string|max:50',
        ]);

        $myyja = Myyja::create([
            'nimi' => $request->input('nimi'),
            'kayttajatunnus' => $request->input('kayttajatunnus'),
            'salasana' => bcrypt($request->input('salasana')),
            'rooli' => $request->input('rooli'),
        ]);

        return redirect()->route('myyja.index')->with('success', 'Myyjä lisätty onnistuneesti!');
    }

    public function show($id)
    {
        $myyja = Myyja::findOrFail($id);
        return view('myyja.show', compact('myyja'));
    }

    public function edit($id)
    {
        $myyja = Myyja::findOrFail($id);
        return view('myyja.edit', compact('myyja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nimi' => 'required|string|max:255',
            'kayttajatunnus' => 'required|string|max:255|unique:myyja,kayttajatunnus,' . $id,
            'rooli' => 'required|string|max:50',
        ]);

        $myyja = Myyja::findOrFail($id);
        $myyja->update($request->all());

        return redirect()->route('myyja.index')->with('success', 'Myyjän tiedot päivitetty!');
    }

    public function destroy($id)
    {
        $myyja = Myyja::findOrFail($id);
        $myyja->delete();

        return redirect()->route('myyja.index')->with('success', 'Myyjä poistettu!');
    }
}
