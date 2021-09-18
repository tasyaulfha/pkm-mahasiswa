<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $users = User::latest()->paginate(5);

        /// mengirimkan variabel $posts ke halaman views posts/index.blade.php
        /// include dengan number index
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $jsonString = file_get_contents(base_path('resources/json/bank.json'));
        $bank = json_decode($jsonString, true);

        /// menampilkan halaman create
        return view('posts.create', compact('bank'));
    }

    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'bank' => 'required',
            'no_hp'=> 'required',
            'no_rek' => 'required',
            'an_rek' => 'required',
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        User::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    public function show(User $user)
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

    public function update(Request $request, User $user)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'bank' => 'required',
            'no_hp'=> 'required',
            'no_rek' => 'required',
            'an_rek' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $user->update($request->all());

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
