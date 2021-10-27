<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\DetailAgenda;
use Illuminate\Http\Request;

class DetailAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agenda = Agenda::orderBy('id','ASC')->get();
        return view('pages.detailAgenda.create')->with([
            'agenda' => $agenda
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'agenda_id' => 'required',
            'judul' => 'required',
            'start' => 'required',
            'end' => 'required',
            'detail' => 'required',
        ]);
        $data = $request->only('agenda_id','judul','start','end','detail');
        $detail = DetailAgenda::create($data);
        return response()->json($detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::orderBy('id','ASC')->get();
        $detail = DetailAgenda::findOrFail($id);
        return view('pages.detailAgenda.edit')->with([
            'data' => $detail,
            'agenda' => $agenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'agenda_id' => 'required',
            'judul' => 'required',
            'start' => 'required',
            'end' => 'required',
            'detail' => 'required',
        ]);
        $data = $request->only('agenda_id','judul','start','end','detail');
        $detail = DetailAgenda::findOrFail($id);
        $detail->update($data);
        return response()->json($detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = DetailAgenda::findOrFail($id);
        $detail->delete();
        return response()->json($detail);
    }
}
