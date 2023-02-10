<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CountUserController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $month = $now->format('M');
        $datas = DB::table('ip')->paginate('10');
        $total = DB::table('ip')->where('bulan', '=', $month)->count();
        return view('admin.page.ip', compact('datas', 'total'));
    }
}
