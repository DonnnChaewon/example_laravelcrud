<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kdrama;

class KdramaController extends Controller {
    // To view all the inputted data
    public function index() {
        $kdramas = Kdrama::all();
        return view('kdramas.index', ['kdramas' => $kdramas]);
    }

    public function create() {
        return view('kdramas.create');
    }

    // Store function to save data after creating a data
    public function store (Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'production' => 'required',
            'episodes' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $newKdrama = Kdrama::create($data);

        return redirect(route('kdrama.index'))->with('success', 'Success to add data');
    }

    public function edit(Kdrama $kdrama) {
        return view('kdramas.edit', ['kdrama' => $kdrama]);
    }

    // Update function to save data after editting a data
    public function update(Kdrama $kdrama, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'production' => 'required',
            'episodes' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $kdrama->update($data);

        return redirect(route('kdrama.index'))->with('success', 'Success to update data');
    }

    public function destroy(Kdrama $kdrama) {
        $kdrama->delete();
        return redirect(route('kdrama.index'))->with('success', 'Success to delete data');
    }
}