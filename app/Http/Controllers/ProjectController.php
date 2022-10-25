<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use App\Models\project;
use App\Models\siswa;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::paginate(5);
        return view('master-project', compact('data'));
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

    public function tambah($id)
    {
        $siswa=siswa::find($id);
        return view('project-create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'id_siswa' => 'required',
            'nama_project' => 'required|min:3',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:10'
        ]);
        // $validasi['id_siswa'] = $request->id;
        project::create($validasi);
        return redirect('/master-project')->with('success', 'Project Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Siswa::find($id)->project()->get();
        return view('project-show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        $siswa = siswa::find($id);
        return view('project-edit', compact('project', 'siswa'));
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
        $message = [
            'required' => ':attribute isi woi',
            'min' => ':attribute minimal :min karakter woi',
            'max' => ':attribute maksimal :max karakter woi'
        ];

        $this->validate($request, [
            // 'id_siswa' => 'required',
            'nama_project' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required'

        ], $message);

            //simpan ke database
            // $project->id_siswa = $request->id_siswa;
            $project=project::find($id);
            $project->nama_project = $request->nama_project;
            $project->tanggal = $request->tanggal;
            $project->deskripsi = $request->deskripsi;
            $project->save();
            Session::flash('berhasil', 'Data Berhasil Di Update');
            return redirect('master-project');
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

    public function hapus($id)
    {
        $project=project::find($id)->delete();

        Session::flash('hapus', 'Data Berhasil Di Hapus');
        return redirect('/master-project');
    }
}
