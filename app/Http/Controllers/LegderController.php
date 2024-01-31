<?php

namespace App\Http\Controllers;

use App\Models\Legder;
use App\Http\Requests\StoreLegderRequest;
use App\Http\Requests\UpdateLegderRequest;

class LegderController extends Controller
{

    private Legder $legder;
    public function __construct(Legder $legder)
    {
        return $this->legder = $legder;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalDebit = Legder::where('type_saldo', 'debit')->sum('saldo');
        $totalKredit = Legder::where('type_saldo', 'kredit')->sum('saldo');
        $total = Legder::sum('saldo');
        $legders = $this->legder->get();
        return view('ledger', compact('legders' ,'totalDebit','totalKredit' ,'total'));
    }
    public function import()
    {
        $totalDebit = Legder::where('type_saldo', 'debit')->sum('saldo');
        $totalKredit = Legder::where('type_saldo', 'kredit')->sum('saldo');
        $total = Legder::sum('saldo');
        $legders = $this->legder->get();
        return view('import.legderexcel', compact('legders' ,'totalDebit','totalKredit' ,'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLegderRequest $request)
    {
        $this->legder->create($request->all());
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Legder $legder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Legder $legder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLegderRequest $request, Legder $legder)
    {
        $legder->update($request->all());
        return back()->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Legder $legder)
    {
        $legder->delete();
        return back()->with('success', 'Data Berhasil dihapus');
    }
}
