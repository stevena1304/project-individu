<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\jenis_contact;
use App\Models\contact;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::paginate(5);
        $jk = jenis_contact::all();
        return view('master-contact', compact('data', 'jk'));
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
        $jk=jenis_contact::all();
        return view('contact-create', compact('siswa', 'jk'));
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
            'siswa_id' => 'required',
            'jenis_contact_id' => 'required',
            'deskripsi' => 'required'
        ]);
        // $validasi['id_siswa'] = $request->id;
        contact::create($validasi);
        return redirect('/master-contact')->with('success', 'Contact Berhasil Ditambah');
    }

    public function storejenis(Request $request)
    {
        $validasi = $request->validate([
            'jenis_contact' => 'required',
        ]);
        jenis_contact::create($validasi);
        return redirect('/master-contact')->with('success', 'Jenis Contact Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=Siswa::find($id)->kontak()->get();
        $contact=contact::find($id);
        return view('contact-show', compact('kontak', 'contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = contact::find($id);
        $siswa = siswa::find($id);
        return view('contact-edit', compact('kontak', 'siswa'));
    }

    public function editjenis($id)
    {
        $jk = jenis_contact::find($id);
        return view('jenis-edit', compact('jk'));
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

    public function updatejenis(Request $request, $id)
    {
        $message = [
            'required' => ':attribute isi woi',
            'min' => ':attribute minimal :min karakter woi',
            'max' => ':attribute maksimal :max karakter woi'
        ];

        $this->validate($request, [
            'jenis_contact' => 'required',
        ], $message);

            //simpan ke database
            $jk=jenis_contact::find($id);
            $jk->jenis_contact = $request->jenis_contact;
            $jk->save();
            Session::flash('berhasil', 'Data Berhasil Di Update');
            return redirect('master-contact');
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
        //
    }

    public function hapusjenis($id)
    {
        $jk=jenis_contact::find($id)->delete();
        Session::flash('hapus', 'Data Berhasil Di Hapus');
        return redirect('/master-contact');
    }
}
