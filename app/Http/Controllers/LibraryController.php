<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function add(){
        $libraries = Library::all();
        return view('add', ['libraries' => $libraries]);
    }

    public function view(){
        $libraries = Library::get();
        return view('view', ['libraries' => $libraries]);
    }

    public function addBook(Request $request){

        $request->validate([
            'title' => 'required|string|min:5|max:20',
            'author' => 'required|string|min:5|max:20',
            'page' => 'required|numeric|gt:0',
            'year' => 'required|numeric|gt:1999|lt:2022',
            'file' => 'required|image:jpg,jpef,png'
        ]);

        $file = $request->file('file'); /*menyimpan data file yang diupload ke variabel $file */

	    $nama_file1 = time()."_".$file->getClientOriginalName();

	    $tujuan_upload = 'data_file'; /*isi dengan nama folder tempat kemana file diupload */
	    $file->move($tujuan_upload,$nama_file1);

        Library::create([
            'title' => $request->title,
            'author' => $request->author,
            'page' => $request->page,
            'year' => $request->year,
            'file' => $nama_file1,
        ]);

        return redirect(route('add'));
    }

    public function updateBook($id){
        $library = Library::find($id);
        return view('update', ['library' => $library]);
    }

    public function update(Request $request, $id){
        $library = Library::find($id);

        $request->validate([
            'title' => 'required|string|min:5|max:20',
            'author' => 'required|string|min:5|max:20',
            'page' => 'required|numeric|gt:0',
            'year' => 'required|numeric|gt:1999|lt:2022',
            'file' => 'required|image:jpg,jpef,png'
         ]);

        $file = $request->file('file'); /*menyimpan data file yang diupload ke variabel $file */

	    $nama_file1 = time()."_".$file->getClientOriginalName();

	    $tujuan_upload = 'data_file'; /*isi dengan nama folder tempat kemana file diupload */
	    $file->move($tujuan_upload,$nama_file1);

        $library -> update([
            'title' => $request->title,
            'author' => $request->author,
            'page' => $request->page,
            'year' => $request->year,
            'file' => $nama_file1,
        ]);


        return redirect(route('view'));
    }

    public function delete($id){
        Library::destroy($id);
        return redirect(route('view'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $libraries = DB::table('libraries')
        ->where('title','like',"%".$cari."%")->paginate();

    return view('view',['libraries' => $libraries]);
    }

}
