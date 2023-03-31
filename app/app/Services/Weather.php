<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Weather
{
    public function get(string $lat, string $long): array
    {
        try {
            $weather = Http::acceptJson()->get('https://api.open-meteo.com/v1/forecast?latitude='.$lat.'&longitude='.$long.'&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m');
        } catch (\Exception $e) {
            return [__('app.weather_unavialable')];
        }


        return $weather->json();
    }
}
