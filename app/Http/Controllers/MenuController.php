<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('menus')->paginate(10);
        return view('admin.page.menu', compact('datas'));
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
            'nama' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!$validator->fails()) {
            $image = $request->file('foto');
            $image_name = time() . '-Sunshine-Foto-Menu.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/', $image, $image_name);

            if ($request->spesial != null) {
                DB::table('menus')->insert([
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'jenis' => $request->jenis,
                    'gambar' => $image_name,
                    'spesial' => $request->spesial,
                    'deskripsi' => $request->deskripsi
                ]);
                Alert::success('Success Upload', 'Data Berhasil diupload!');
            } else {
                DB::table('menus')->insert([
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'jenis' => $request->jenis,
                    'gambar' => $image_name,
                    'deskripsi' => $request->deskripsi
                ]);
                Alert::success('Success Upload', 'Data Berhasil diupload!');
            }
            return redirect()->route('index.menu');
        } else {
            Alert::error('Error Input', $validator->messages()->all()[0]);
            // dd($validator->messages()->all());
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = DB::table('menus')->paginate(3);
        $data_single = DB::table('menus')->where('id', $id)->get();
        return view('admin.edit.menu', compact('datas', 'data_single'));
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
            $image_name = time() . '-Sunshine-Foto-Menu.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/', $image, $image_name);
            DB::table('menus')->where('id', $id)->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jenis' => $request->jenis,
                'spesial' => $request->spesial,
                'deskripsi' => $request->deskripsi,
                'gambar' => $image_name
            ]);
            Alert::success('Success Upload', 'Data Berhasil di edit!');
        } else {
            DB::table('menus')->where('id', $id)->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jenis' => $request->jenis,
                'spesial' => $request->spesial,
                'deskripsi' => $request->deskripsi,
            ]);
            Alert::success('Success Upload', 'Data Berhasil di edit!');
        }

        return redirect()->route('index.menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menus')->where('id', $id)->delete();
        Alert::success('Success Delete', 'Data Berhasil di Hapus!');
        return redirect()->route('index.menu');
    }
}
