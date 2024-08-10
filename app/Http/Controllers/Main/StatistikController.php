<?php

namespace App\Http\Controllers\Main;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\Controller;
use App\Charts\Statistik;
use Illuminate\Http\Request;
use App\Models\Diskusi;

class StatistikController extends Controller
{
    public function index(Statistik $chart)
    {
        $data['title'] = 'Statistik';
        $data['chart'] = $chart->build();
        $data['diskusi'] = Diskusi::orderBy('view', 'desc')->get();
        return view('main.statistik.index', $data);
    }

    public function print()
    {
        $data['title'] = "Unduh topik diskusi";
        $data['diskusi'] = Diskusi::orderBy('view', 'desc')->get();
        return view('main.statistik.unduh', $data);
    }
}
