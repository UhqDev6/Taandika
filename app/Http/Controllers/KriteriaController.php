<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
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
        $kriteria['q'] = $request->input('q');
        $kriteria['title'] = 'Data Alternatif';
        $kriteria = Kriteria::all();
        // $data['alternatifs'] = Alternatif::where('nama_alternatif','like','%'. $data['q'] . '%')
        //     ->orderBy('Kode_alternatif')
        //     ->paginate(25);
        return view('pages.kriteria.index')->with([
                'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria['title'] = 'Tambah Kriteria';
        $kriteria['atributs'] = ['benefit' => 'Benefit', 'cost' => 'Cost'];
        return view('pages.kriteria.create', $kriteria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_kriteria' => 'required|unique:tb_kriteria',
            'nama_kriteria' => 'required',
            'atribut' => 'required',
            'bobot' => 'required',
        ],
        [
            'kode_kriteria.required' => 'Kode Kriteria harus di isi',
            'kode_kriteria.unique' => 'kode kriteria harus unik',
            'nama_kriteria.required' => 'Nama Kriteria harus di isi',
            'atribut.required' => 'Atribut harus di isi',
            'bobot.required' => 'Bobot harus di isi', 
        ]);

        $kriteria = [
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot,
        ];

        $save = Kriteria::insert($kriteria);

        DB::statement("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria, kode_sub)
        SELECT kode_alternatif, :kode_kriteria, 0 FROM tb_alternatif", array('kode_kriteria' => $request->kode_kriteria));

        if($save)
            return redirect('kriteria');
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
        $data = Kriteria::findOrFail($id);
        // dd($items);
        return view('pages.kriteria.edit')->with([
            'data' => $data
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
        $validateData = $request->validate([
            'nama_kriteria' => 'required',
            'atribut' => 'required',
            'bobot' => 'required',
        ],
        [
            'nama_kriteria.required' => 'Nama Kriteria harus di isi',
            'atribut.required' => 'Atribut harus di isi',
            'bobot.required' => 'Bobot harus di isi',
        ]);

        $kriteria = [
            'nama_kriteria' => $request->nama_kriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot,
        ];

        $save = Kriteria::find($id)->update($kriteria);
        if($save)
            return redirect('kriteria');
        else
            return redirect()->back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kriteria::findOrFail($id);
        $data->delete();
        
        return redirect()->route('kriteria.index');
    }
}
