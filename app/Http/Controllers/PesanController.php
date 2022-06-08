<?php

namespace App\Http\Controllers;

use App\pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = Pesan :: all();
        return view('pesan.index',compact('pesan'));
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
        {
            $this->validate($request, [
                'anggota_id' => 'required',
                'pesan' => 'required',
                'isi' => 'required'
            ]);
    
            Pesan::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'anggota_id' => $request->anggota_id,
                    'pesan' => $request->pesan,
                    'isi' => $request->isi,
                ]
            );
            return redirect()->back()->with('success', 'Pesan atos kakirim !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesan $pesan)
    {
        //
    }
}
