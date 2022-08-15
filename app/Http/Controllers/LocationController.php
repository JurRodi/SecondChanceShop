<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use \Torann\GeoIP\Facades\GeoIP;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $userIp = $request->ip();
        $testIp = '8.8.8.8';
        $locationData = Location::get($testIp);

        dd($userIp, $testIp, $locationData);
    }
}