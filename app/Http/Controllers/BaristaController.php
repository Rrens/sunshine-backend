<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BaristaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('baristas')->paginate(10);
        return view('admin.page.barista', compact('datas'));
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
            'nama' => 'required|string',
            'posisi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!$validator->fails()) {
            $imaga = $request->file('foto');
            $image_name = time() . '-Sunshine-Foto-Barista.' . $imaga->getClientOriginalExtension();
            Storage::putFileAs('public/', $imaga, $image_name);

            DB::table('baristas')->insert([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'foto' => $image_name
            ]);

            Alert::success('Success Upload', 'Data Berhasil diupload!');
            return redirect()->route('index.barista');
        } else {
            Alert::error('Error Input', $validator->messages()->all()[0]);
            return back()->withInput();
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
        $data_single = DB::table('baristas')->where('id', $id)->get();
        $datas = DB::table('baristas')->paginate(3);
        return view('admin.edit.barista', compact('data_single', 'datas'));
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
            $image_name = time() . '-Sunshine-Foto-Barista.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/', $image, $image_name);
            DB::table('baristas')->where('id', $id)->update([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'foto' => $image_name
            ]);
            Alert::success('Success Upload', 'Data Berhasil di edit!');
        } else {
            DB::table('baristas')->where('id', $id)->update([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
            ]);
            Alert::success('Success Upload', 'Data Berhasil di edit!');
        }
        return redirect()->route('index.barista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('baristas')->where('id', $id)->delete();
        Alert::success('Success Delete', 'Data Berhasil di Hapus!');
        return redirect()->route('index.barista');
    }
}
