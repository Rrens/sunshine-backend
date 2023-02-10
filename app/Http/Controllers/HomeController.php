<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $month = $now->format('M');
        $year = $now->format('Y');
        $checkLocation = geoIp()->getLocation($_SERVER['REMOTE_ADDR'])->toArray();

        $store = DB::table('ip')->insert([
            'ip' => $checkLocation['ip'],
            'country' => $checkLocation['country'],
            'city' => $checkLocation['city'],
            'bulan' => $month,
            'tahun' => $year
        ]);
        $datas = DB::table('testimonys')->where('show', 1)->get();
        $data_barista = DB::table('baristas')->get();
        $data_menu = DB::table('menus')->get();
        $data_spesial = DB::table('menus')->where('spesial', '=', 'on')->get();
        $data_event = DB::table('events')->get();
        $data_galery = DB::table('galeries')->get();
        $data_jenis_menu = DB::table('menus')->select('jenis')->distinct('jenis')->get();

        return view('index', compact('datas', 'data_spesial', 'data_barista', 'data_menu', 'data_event', 'data_galery', 'data_jenis_menu'));
    }
}
