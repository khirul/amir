<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Journal;
use DB;

class ChartController extends Controller
{
    public function indexBar()
    {
        // jurnal keseluruhan
        $dReports = Journal::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($dReports, 'bar', 'highcharts')
			      ->title("Jumlah Jurnal Bulanan")
			      ->elementLabel("Jumlah Jurnal")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  return view('chart',compact('chart'));

    }

    public function indexTajukBar()
    {
        // jurnal ikut tajuk keseluruhan
        $dReports = DB::table('journals')->where('tajuk_artikel', 'Pemeriksaan Penerbitan')->get();
        $chart = Charts::database($dReports, 'bar', 'highcharts')
			      ->title("Jumlah Jurnal Mengikut Tajuk (Pemeriksaan Penerbitan)")
			      ->elementLabel("Jumlah Jurnal")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  return view('chart',compact('chart'));

                  // ikut jenis category
        // $dReports= DamageReport::where('category_id',1)->where('status_laporan',null)->get();
        // $chart = Charts::database($dReports, 'bar', 'highcharts')
		// 	      ->title("Laporan Kerosakan Bulanan")
		// 	      ->elementLabel("Jumlah Laporan")
		// 	      ->dimensions(1000, 500)
		// 	      ->responsive(false)
        //           ->groupByMonth(date('Y'), true);
        // return view('chart',compact('chart'));

    }

    function indexPieBah()
    {
     $data = DB::table('journals')
       ->select(
        DB::raw('tajuk_artikel as tajuk_artikel'),
        DB::raw('count(*) as number'))
       ->groupBy('tajuk_artikel')
       ->get();
     $array[] = ['Tajuk', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->tajuk_artikel, $value->number];
     }
     return view('pie_bahagian')->with('tajuk_artikel', json_encode($array));
    }
}
