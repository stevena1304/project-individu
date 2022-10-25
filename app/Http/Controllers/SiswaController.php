<?php

namespace App\Http\Controllers;
use Session;
use File;
use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('master-siswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'required' => ':attribute isi woi',
            'min' => ':attribute minimal :min karakter woi',
            'max' => ':attribute maksimal :max karakter woi',
            'numeric' => ':attribute wajib angka woi',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];

        $this->validate($request, [

            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required',
            'about' => 'required|min:10'

        ], $message);
        //ambil info file
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        Siswa::create([
            'nama' => $request-> nama,
            'nisn' => $request-> nisn,
            'alamat' => $request-> alamat,
            'jk' => $request-> jk,
            'foto' => $nama_file,
            'about' => $request-> about
        ]);

        Session::flash('sukses', 'Data Berhasil Di Tambahkan');
        return redirect('/master-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        $kontak = $siswa->kontak()->get();
        // return($kontak);
        return view('siswa-show', compact('siswa', 'kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id);
        return view('siswa-edit', compact('siswa'));
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
            'max' => ':attribute maksimal :max karakter woi',
            'numeric' => ':attribute wajib angka woi',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];

        $this->validate($request, [

            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'about' => 'required|min:10'

        ], $message);

        if ($request->foto != '') {
            //ganti foto

            //hapus foto lama
            $siswa=siswa::find($id);
            File::delete('./template/img/'.$siswa->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request->about;
            $siswa->save();
            Session::flash('berhasil', 'Data Berhasil Di Update');
            return redirect('master-siswa');

        }else{
            $siswa=siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->about = $request->about;
            $siswa->save();
            Session::flash('berhasil', 'Data Berhasil Di Update');
            return redirect('master-siswa');
        }
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
        $siswa=siswa::find($id)->delete();

        Session::flash('hapus', 'Data Berhasil Di Hapus');
        return redirect('/master-siswa');
    }
}
