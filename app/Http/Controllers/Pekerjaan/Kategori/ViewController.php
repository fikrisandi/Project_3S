<?php

namespace App\Http\Controllers\Pekerjaan\Kategori;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanKategori;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $pekerjaankategori = PekerjaanKategori::all();

        return view('admin.dashboard.content', compact(['pekerjaankategori']));
    }

    public function create()
    {
        
    }
  
    public function store(Request $request)
    {    
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        PekerjaanKategori::create($request->all());
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }
  
    public function show(Post $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('posts.show',compact('post'));
    }
  
    public function edit(Post $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.edit',$post->id) }}
        return view('posts.edit',compact('post'));
    }
  
    public function update(Request $request, Post $post)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $post->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }
  
    public function destroy(Post $post)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();
  
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
