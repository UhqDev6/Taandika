<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\Sub;
// use App\Waktu;

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

        // $waktus = Waktu::all();
        // $data['waktus'] = array();
        // foreach ($waktus as $row)
        // {
        //     $data['waktus'][$row->kode_waktu] = $row->nama_waktu;
        // }
        // $data['kode_waktu'] = $request->input('kode_waktu');

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

        $nilais = DB:: select("SELECT * FROM tb_rel_alternatif ");
        $data['nilais'] = array();
        foreach ($nilais as $row)
        {
            $data['nilais'][$row->kode_alternatif][$row->kode_kriteria] = $row->kode_sub;
        }

        // dd($data);
        
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
        $request->validate([
            'kode_alternatif' => 'required',
        ],
        [
            'kode_alternatif.required' => 'Silahkan memilih kode alternatif',
        ]);

        // $kode_waktu = $request->input->kode_waktu;
        $kode_alternatif = $request->input('kode_alternatif');
        $kode_alternatif = $request->kode_alternatif;

        $row = DB::select("SELECT * FROM tb_rel_alternatif WHERE kode_alternatif='$kode_alternatif'");

        if($row)
        {
            return redirect()->back()->withErrors(['Nama alternatif sudah ada']);
        }else
        {
            DB::statement("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria) SELECT '$kode_alternatif', kode_kriteria FROM tb_kriteria");
            return redirect()->back()->withInput();
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
    public function edit(Request $request, $id)
    {
        $data['alternatif'] = Alternatif::find($id);
        // $data['title'] = 'Change Alternative Values';

        $kriterias = Kriteria::all();
        $data['kriterias'] = array();
        foreach ($kriterias as $row) {
            $data['kriterias'][$row->kode_kriteria] = $row->nama_kriteria;
        }

        $sub = Sub::all();
        $data['subs'] = array();
        foreach ($sub as $row) {
            $data['subs'][$row->kode_kriteria][$row->kode_sub] = $row->nama_sub;
        }

        // $data['kode_alternatif'] = $request->input('kode_alternatif');
        $nilais = DB::table("tb_rel_alternatif")
            ->where('kode_alternatif', $id)
            ->orderBy('kode_kriteria', 'asc')
            ->get();
        $data['nilais'] = array();
        foreach ($nilais as $row) {
            $data['nilais'][$row->kode_kriteria] = $row->kode_sub;
        }

        // dd($data);

        return view('pages.relasi.edit', $data);
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
        
        // $kode_alternatif = $request->input('kode_alternatif');
        $validatedData = $request->validate([
            'nilai' => 'required',
        ],
        [
            'nilai.required' => 'Data harus di isi',
          
        ]);
        foreach ($request->nilai as $key => $val)
        {
    
            $nilai = [
                'kode_alternatif' => $request->kode_alternatif,
                'kode_kriteria' => $key,
                'kode_sub' => $val,
                'nilai' => $request->nilai,
               
            ];

   

            DB::statement("UPDATE tb_rel_alternatif
                SET kode_sub=:kode_sub
                WHERE kode_alternatif=:kode_alternatif AND kode_kriteria=:kode_kriteria", $nilai);
        }
        return redirect('relasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        if($alternatif)
        {
            $alternatif->destroy($id);
            $msg = "Data terhapus";
        }else
        {
            $msg = "Data gagal di hapus";
        }
        DB::statement("DELETE FROM tb_rel_alternatif WHERE kode_alternatif=:kode_alternatif", array('kode_alternatif' => $id));
        return redirect()->back()->withSuccess($msg);
    }

}
