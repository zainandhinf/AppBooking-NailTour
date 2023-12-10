<?php

namespace App\Charts;

use App\Models\HeadTransaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonthlyTransactionsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $year = date('Y');
        $month = date('m');

        $dataMonth = [];
        $dataTotalTransactions = [];
        for ($i = 1; $i <= $month; $i++) {
            // $totalTransactions = HeadTransaction::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
            // $totalInfaq = Infaq::userMasjid()->whereYear('created_at', $year)->whereMonth('created_at', $i)->sum('jumlah');
            // $totalTransactions = HeadTransaction::select('*');
            $totalTransactions = HeadTransaction::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            $dataMonth[] = Carbon::create()->month($i)->format('F');
            $dataTotalTransactions[] = $totalTransactions;
        }

        // dd($i);
        return $this->chart->lineChart()
            ->setTitle('Monthly Transaction Data')
            ->setSubtitle('Total Transactions Every Month')
            ->addData('Total Transactions', $dataTotalTransactions)
            // ->setWidth(800)
            ->setXAxis($dataMonth);
        // ->setYAxis([
        //     100,
        //     200,
        //     300,
        // ]);
    }
}