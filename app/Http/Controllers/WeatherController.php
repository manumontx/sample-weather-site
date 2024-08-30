<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request) 
    {
        $weatherResponse = [];
        
        if ($request->isMethod("post")) {
            $request->validate([
                'city' => 'required|string'
            ]);

            $cityName = $request->input('city');

            try {
                $response = Http::withHeaders([
                    "x-rapidapi-host" => "open-weather13.p.rapidapi.com",
                    "x-rapidapi-key" => "480371c6d8msh805be9726ae5068p1c8163jsn08321a8982eb"
                ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}/EN");

                if ($response->successful()) {
                    $weatherResponse = $response->json();
                } else {
                    // Handle the error response
                    $weatherResponse['error'] = "Unable to fetch weather data.";
                }
            } catch (\Exception $e) {
                // Handle any exceptions, like network errors
                $weatherResponse['error'] = "An error occurred: " . $e->getMessage();
            }
        }

        return view('weather', [
            "data" => $weatherResponse 
        ]);
    }
}
