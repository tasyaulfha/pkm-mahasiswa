<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '=', Auth::user()->id);

        return view('home', compact('users'));

    }

    public function daftar()
    {
        return view ('mahasiswa.daftar');
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
        $request->validate([
            'bank' => 'required',
            'no_hp'=> 'required',
            'no_rek' => 'required',
            'an_rek' => 'required',
        ]);

        try {
            $data = new User();
            $data->bank = $request->bank;
            $data->no_hp = $request->no_hp;
            $data->no_rek = $request->no_rek;
            $data->an_rek = $request->an_rek;
            $data->save();

        } catch (\Throwable $th) {
            return redirect()->route('posts.index')
                ->with('error', $th->getMessage());
        }

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
