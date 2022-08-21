<?php
namespace App\Services;

use App\Models\Weather;
use Carbon\Carbon;
use Symfony\Component\Translation\Loader\IcuDatFileLoader;

class WeatherReportService
{
    public function start(): array
    {
        $APIkey='28f3419802a941f78ff85528222107';
        $location='Riga';
//
//        $AllHistoryReport = [];
//        $H=17;
//        $dt='2022-07-23';
//
//        for ($i=0;$i<5;$i++)
//        {
//            $AllHistoryReport [] = file_get_contents('http://api.weatherapi.com/v1/history.json?key='.$APIkey.'&q='.$location.'&dt='.$dt.'&aqi=no&alerts=no&hour='.$H++);
//        }
//        echo '<pre>';
//        print_r($AllHistoryReport);

        $report = file_get_contents('http://api.weatherapi.com/v1/forecast.json?key='.$APIkey.'&q='.$location.'&dt=&aqi=no&alerts=no');
        $report = json_decode($report);

        $weatherReport = [];
//        for ($i=0;$i<10;$i++)
//        {
//            $weatherReport[] = new Weather(
//                $report->forecast->forecastday[0]->hour[$i]->time,
//                $report->forecast->forecastday[0]->hour[$i]->temp_c,
//                $report->forecast->forecastday[0]->hour[$i]->humidity,
//                $report->forecast->forecastday[0]->hour[$i]->condition->text,
//                $report->forecast->forecastday[0]->hour[$i]->condition->icon
//            );
        foreach ($report->forecast->forecastday[0]->hour as $hourlyReport)
        {
            $weatherReport[] = new Weather(
                $hourlyReport->time,
                $hourlyReport->temp_c,
                $hourlyReport->humidity,
                $hourlyReport->condition->text,
                $hourlyReport->condition->icon
            );
        }
        return $weatherReport;

    }

    public function getTimeRange(): array
    {
        return
            [
                $past12hours = Carbon::now()->subHours(12),
                $future12Hours = Carbon::now()->addHours(12)
            ];
    }
}
