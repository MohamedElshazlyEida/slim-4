<?php

namespace App\Http\Controllers\Api;

use App\Location;
use App\Transaction;
use Carbon\Carbon;

class TransactionController
{

    public function getTodayByLocation($response, $location)
    {
        $location = Location::where('name', $location)->first();
        if ($location) {
            $getTodayByLocation = Transaction::where('location_id', $location->id)
            ->whereDate('created_at', Carbon::today())->get();
        }

        $response->getBody()->write(json_encode($getTodayByLocation, JSON_PRETTY_PRINT));
        return $response;
    }


}
