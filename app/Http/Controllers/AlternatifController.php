<?php

namespace App\Http\Controllers;

use App\Alternatif;
// use App\Kriteria;
// use App\Sub;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
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
 
        $data['q'] = $request->input('q');
        $data['title'] = 'Data Alternatif';
        $data = Alternatif::all();
        // $data['alternatifs'] = Alternatif::where('nama_alternatif','like','%'. $data['q'] . '%')
        //     ->orderBy('Kode_alternatif')
        //     ->paginate(25);
        return view('pages.alternatif.index')->with([
                'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|unique:tb_alternatif',
            'nama_alternatif' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ],
        [
            'kode_alternatif.required' => 'Kode alternatif harus di isi',
            'kode_alternatif.unique' => 'Kode alternatif harus unik',
            'nama_alternatif.required' => 'Nama alternatif harus di isi',
            'alamat.required' => "Alamat harus di isi",
            'jk.required' => "Jenis kelamin harus di isi",
        ]);

         $alternatif = [
             'kode_alternatif' => $request->kode_alternatif,
             'nama_alternatif' => $request->nama_alternatif,
             'alamat' => $request->alamat,
             'jk' => $request->jk,
         ];

         $save = Alternatif::insert($alternatif);

         if($save)
            return redirect('alternatif');
         else
            return redirect()->back()->withInput();
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
