<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Nisn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get siswas
        $siswas = Siswa::latest()->paginate(5);

        //render view with siswas
        return view('siswas.index', compact('siswas'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'          => 'required|min:1',
            'nis'           => 'required|min:2',
            'nisn'          => 'required|min:2',
            'tempatlahir'   => 'required|min:5',
            'tanggallahir'  => 'required|min:5',
            'alamat'        => 'required|min:5',
            'jeniskelamin'  => 'required|min:5',
            'agama'         => 'required|min:5',
            'email'         => 'required|min:5',
            'hobi'          => 'required|min:5',
            'warna'         => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/siswas', $image->hashName());
        
        //create post
        $siswa= Siswa::create([
            'image'         => $image->hashName(),
            'nama'          => $request->nama,
            'nis'           => $request->nis,
            'nisn'          => $request->nisn,
            'tempatlahir'   => $request->tempatlahir,
            'tanggallahir'  => $request->tanggallahir,
            'alamat'        => $request->alamat,
            'jeniskelamin'  => $request->jeniskelamin,
            'agama'         => $request->agama,
            'email'         => $request->email,
            'hobi'          => $request ->hobi,
            'warna'         => $request ->warna
                  
        ]);
        $nisn = new Nisn;
        $nisn->id_siswa = $siswa->id;
        $nisn->nisn = $request->nisn;
        $nisn->save();
     
        
        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(Siswa $siswa)
    {
        return view('siswas.edit', compact('siswa'));
    }
    
    public function show(Siswa $siswa)
    {
       
        return view('siswas.edit', compact('siswa'));
    }
    
    public function update(Request $request, Siswa $siswa)
    {
       
        $this->validate($request, [
            
            'nama'          => 'required|min:1',
            'nis'           => 'required|min:2',
            'nisn'          => 'required|min:2',
            'tempatlahir'   => 'required|min:5',
            'tanggallahir'  => 'required|min:5',
            'alamat'        => 'required|min:5',
            'jeniskelamin'  => 'required|min:5',
            'agama'         => 'required|min:5',
            'email'         => 'required|min:5',
            'hobi'          => 'required|min:5',
            'warna'         => 'required|min:5'

           
        ]);
        
         //check if image is uploaded
         if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/siswas', $image->hashName());

            //delete old image
            Storage::delete('public/siswas/'.$siswa->image);

            //update post with new image
          $siswa->update([
            'image'         => $image->hashName(),
            'nama'          => $request->nama,
            'nis'           => $request->nis,
            'nisn'          => $request->nisn,
            'tempatlahir'   => $request->tempatlahir,
            'tanggallahir'  => $request->tanggallahir,
            'alamat'        => $request->alamat,
            'jeniskelamin'  => $request->jeniskelamin,
            'agama'         => $request->agama,
            'email'         => $request->email,
            'hobi'          => $request ->hobi,
            'warna'         => $request ->warna
        
            ]);
                

        } else {

            //update post without image
            $siswa->update([
            'nama'          => $request->nama,
            'nis'           => $request->nis,
            'nisn'           => $request->nisn,
            'tempatlahir'   => $request->tempatlahir,
            'tanggallahir'  => $request->tanggallahir,
            'alamat'        => $request->alamat,
            'jeniskelamin'  => $request->jeniskelamin,
            'agama'         => $request->agama,
            'email'         => $request->email,
            'hobi'          => $request ->hobi,
            'warna'         => $request ->warna
            ]);
        }
    
       
        $nisn = Nisn::where('id_siswa', $siswa->id)->update([
            'nisn' => $request->nisn,
        ]);
        
        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
        
    }

    
    
    public function destroy(Siswa $siswa)
    {
      
        Storage::delete('public/siswas/'. $siswa->image);

        //delete post
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}