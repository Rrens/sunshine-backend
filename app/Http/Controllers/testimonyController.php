<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class testimonyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('testimonys')->paginate(10);
        return view('admin.page.testimoni', compact('datas'));
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
            'name' => 'required',
            'message' => 'required',
        ]);

        if (!$validator->fails()) {
            $time = Carbon::now();

            DB::table('testimonys')->insert([
                'name' => $request->name,
                'contact' => $request->email,
                'message' => $request->message,
                'show' => 0,
                'created_at' => $time,
            ]);
            Alert::success('Success Upload', 'Data Berhasil diupload!');
        } else {
            Alert::error('Error Input', $validator->messages()->all()[0]);
            return back();
        }
        return redirect()->route('index.testimoni');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $datas = DB::table('testimonys')->where('id', $id)->get();

        foreach ($datas as $data) {
            if ($data->show == 0) {
                DB::table('testimonys')->where('id', $id)->update([
                    'show' => 1
                ]);
                Alert::success('Success Upload', 'Data Berhasil diupload!');
            } else {
                DB::table('testimonys')->where('id', $id)->update([
                    'show' => 0
                ]);
                Alert::success('Success Upload', 'Data Berhasil diupload!');
            }
        }

        return redirect()->route('index.testimoni');
    }
}
