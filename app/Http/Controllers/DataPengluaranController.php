<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Kelas;
use App\DataPengluaran;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class DataPengluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Kelas::all();
        $datapengluaran = DataPengluaran::all();
        return view('admin.kas.datapengluaran.index', compact('datapengluaran','program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas_id' => 'required',
            'nama' => 'required',
        ]);

        DataPengluaran::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'kelas_id' => $request->kelas_id,
                'nama' => $request->nama,
            ]
        );

        return redirect()->back()->with('success', 'Data mapel berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataPengluaran  $dataPengluaran
     * @return \Illuminate\Http\Response
     */
    public function show(DataPengluaran $dataPengluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPengluaran  $dataPengluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPengluaran $dataPengluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPengluaran  $dataPengluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPengluaran $dataPengluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPengluaran  $dataPengluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPengluaran $dataPengluaran)
    {
        //
    }
}
