<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {   
        $siswas = Siswa::latest()->paginate(5);
        // $siswas = Siswa::all();
        return view('siswas.index', compact('siswas') );
        // return 'hello';           
        //get users form Model
        // $siswas = Siswa::latest()->get();

        //passing user to view
        // return view('users', compact('users'));
        // return view('siswas.index', compact('siswas'));
        // $siswas = Siswa::all();  
        // return view('siswas.index', compact('siswas'));
    }


    
// baris update redirect ke form
public function edit(Post $siswa)
    {
        return view('siswas.edit',compact('post'));
        // return ("selamat datang");
        
    }

   

    public function destroy(Post $siswa)
    {
        //delete image
        Storage::delete('public/posts/'. $siswa->image);

        //delete post
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
