<?php

namespace App\Charts;
use App\Models\Information;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Statistik
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {
        $visitor = Information::whereMonth('created_at', '08')->sum('view');

        return $this->chart->barChart()
            ->setTitle('Kunjungan informasi')
            ->addData('Informasi', [$visitor, 1, 1, 1, 1])
            ->setXAxis(['Agustus', 'November', 'Oktober', 'September', 'Desember'])
            ->setColors(['#076759']);
    }
}