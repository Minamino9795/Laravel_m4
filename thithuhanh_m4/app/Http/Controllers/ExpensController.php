<?php

namespace App\Http\Controllers;

use App\Models\Expens;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class ExpensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expens = Expens::get();
        $expens = Expens::all();
        $totalAmount = $expens->sum('SOTIEN');


        return view('expens.index', compact('expens', 'totalAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expens = Expens::create([
            'DANHMUCCHITIEU' => $request->name,
            'NGAYCHITIEU' => $request->date,
            'SOTIEN' => $request->money,
            'GHICHU' => $request->decscription,
        ]);
        return redirect()->route('chitieu.index')->with('successMessage', 'THÊM THÀNH CÔNG!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expens = Expens::find($id);

        return view('expens.edit', compact('expens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expens = Expens::find($id);
        $expens->DANHMUCCHITIEU = $request->name;
        $expens->NGAYCHITIEU = $request->date;
        $expens->SOTIEN = $request->money;
        $expens->GHICHU = $request->description;


        $expens->save();

        return redirect()->route('chitieu.index')->with('successMessage', 'CẬP NHẬT THÀNH CÔNG!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expens = Expens::destroy($id);

        return redirect()->route('chitieu.index')->with('successMessage', 'XÓA THÀNH CÔNG!');
    }
}
