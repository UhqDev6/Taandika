<?php

namespace App\Http\Controllers;


use App\Sub;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
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
        $data['title'] = 'Criteria sub data';
        $data['subs'] = Sub::orderBy('kode_sub', 'asc')
            ->join('tb_kriteria', 'tb_kriteria.kode_kriteria', '=', 'tb_sub.kode_kriteria')
            ->where('nama_sub', 'like', '%'.$data['q'].'%')
            ->paginate(50);
        return view('pages.sub.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kriterias'] = Kriteria::all();
        return view('pages.sub.create', $data);
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
            'kode_sub' => 'required|unique:tb_sub',
            'kode_kriteria' => 'required',
            'nama_sub' => 'required',
            'nilai' => 'required',
        ],
        [
            'kode_sub.required' => 'Kode sub harus di isi',
            'kode_sub.unique' => 'Kode sub harus unik',
            'kode_kriteria.required' => 'kode kriteria harus di isi',
            'nama_sub.required' => 'Nama sub harus di isi',
            'nilai.required' => 'Nilai harus di isi', 
        ]);

        $sub = [
            'kode_sub' => $request->kode_sub,
            'kode_kriteria' => $request->kode_kriteria,
            'nama_sub' => $request->nama_sub,
            'nilai' => $request->nilai,
        ];
        
        $save = Sub::insert($sub);
        if($save)
            return redirect('sub');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['sub'] = Sub::find($id);
        $data['kriterias'] = Kriteria::all();
        return view('pages.sub.edit', $data);
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
