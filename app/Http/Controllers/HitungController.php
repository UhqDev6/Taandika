<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\Alternatif;
use App\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alternatifs = Alternatif::all();
        // $data['alternatifs'] = array();
        // foreach ($alternatifs as $row)
        // {
        //     $data['alternatif'][$row->kode_alternatif] = $row->nama_alternatif;
        // }

        $data['kode_alternatif'] = $request->input('kode_alternatif');
        $alternatifs = DB::select("SELECT * FROM tb_rel_alternatif r INNER JOIN tb_alternatif a ON a.kode_alternatif = r.kode_alternatif ");
        $data['alternatifs'] = array();
        foreach ($alternatifs as $row)
        {
            $data['alternatifs'][$row->kode_alternatif] = $row->nama_alternatif;
        }
        return view('pages.perhitungan.hitung', $data);
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
        /** $data adalah array data yang akan dikirim di view */
        // $data['title'] = "Hasil Perhitungan"; //judul halaman
        $data['prioritas'] = $request->prioritas; //menyimpan inputan kriteria

        $kriterias = Kriteria::all(); //mengambil semua kriteria
        /** Menyimpan kriteria dalam array */
        $data['kriterias'] = array();
        foreach ($kriterias as $row) {
            $data['kriterias'][$row->kode_kriteria] = $row;
        }

        $alternatifs = Alternatif::all(); //mengambil data alternatif
        /** Menyimpan alternatif dalam array */
        $data['alternatifs'] = array();
        foreach ($alternatifs as $row) {
            $data['alternatifs'][$row->kode_alternatif] = $row->nama_alternatif;
        }

        $sub = Sub::all(); //mengambil data sub kriteria
        /** Menyimpan sub kriteria dalam array */
        $data['subs'] = array();
        foreach ($sub as $row) {
            $data['subs'][$row->kode_sub] = $row;
        }

        $kode_alternatif = $request->input('kode_alternatif');
        /** mengambil data nilai alternatif */
        $rel_alternatif = DB::select("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria");

        $data['selected'] = $request->selected;
       
        /** Menyimpan data nilai alternatif dalam array */
        $data['rel_alternatif'] = array();

        $data['rel_nilai'] = array();
        
        foreach ($rel_alternatif as $row) {
            if (in_array($row->kode_alternatif, $data['selected'])) {
                $data['rel_alternatif'][$row->kode_alternatif][$row->kode_kriteria] = $data['subs'][$row->kode_sub]->nama_sub;
                $data['rel_nilai'][$row->kode_alternatif][$row->kode_kriteria] = $data['subs'][$row->kode_sub]->nilai;
            }
        }

        if ($data !=0) { //jika tidak ada kriteria yang sama
        //    dd($data);
            return view('pages.perhitungan.hasil', $data); //memanggil view hitung.hasil
        } else {
            /** kembali ke view form.hasil dengan pesan error */
            return redirect()->back()->withErrors(['Pilih kriteria yang berbeda'])->withInput();
        }
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
