<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('galeries')->paginate(10);
        return view('admin.page.galeri', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!$validator->fails()) {
            $image = $request->file('foto');
            $image_name = time() . '-Sunshine-Foto-Galery.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/', $image, $image_name);
            DB::table('galeries')->insert([
                'gambar' => $image_name
            ]);
            Alert::success('Success Upload', 'Foto Berhasil diupload!');
        } else {
            Alert::error('Error Input', $validator->messages()->all()[0]);
            return back();
        }

        return redirect()->route('index.galery');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $datas = DB::table('galeries')->paginate(3);
        $data_single = DB::table('galeries')->where('id', $id)->get();
        return view('admin.edit.galeri', compact('datas', 'data_single'));
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
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image_name = time() . '-Sunshine-Foto-Galery-Update.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/', $image, $image_name);
            DB::table('galeries')->where('id', $id)->update([
                'gambar' => $image_name
            ]);
            Alert::success('Success Upload', 'Foto Berhasil di edit!');
            return redirect()->route('index.galery');
        } else {
            Alert::error('Error Input', 'Tidak ada Foto yang di edit!');
            return back();
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
        DB::table('galeries')->where('id', $id)->delete();
        Alert::success('Success Delete', 'Foto Berhasil di Hapus!');

        return redirect()->route('index.galery');
    }
}
