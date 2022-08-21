<?php
namespace App\Controllers;

use App\Services\WeatherReportService;
use App\View;


class WeatherController
{
    public function show(): View
    {
        $service = new WeatherReportService();
        $weatherReport = $service->start();

        return new View('hourly-report.twig', [
            'weatherReport' => $weatherReport

        ]);
    }

}