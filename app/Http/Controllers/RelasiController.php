<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\Sub;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelasiController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data['q'] = $request->input('q');
        $alternatifs = Alternatif::all();
        $data['alternatifs'] = array();
        foreach ($alternatifs as $row)
        {
            $data['alternatifs'][$row->kode_alternatif] = $row->nama_alternatif;
        }
        $data['kode_alternatif'] = $request->input('kode_alternatif');

        $kriterias = Kriteria::all();
        $data['kriterias'] = array();
        foreach ($kriterias as $row)
        {
            $data['kriterias'][$row->kode_kriteria] = $row->nama_kriteria;
        }

        $sub = Sub::all();
        $data['subs'] = array();
        foreach ($sub as $row)
        {
            $data['subs'][$row->kode_sub] = $row->nama_sub;
        }

        $nilais = DB:: select("SELECT * FROM tb_rel_alternatif WHERE kode_alternatif = '$data[kode_alternatif]'");
        $data['nilais'] = array();
        foreach ($nilais as $row)
        {
            $data['nilais'][$row->kode_alternatif][$row->kode_kriteria] = $row->kode_sub;
        }
        
        return view('pages.relasi.index', $data);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
