<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PingController extends Controller
{
    public function ping()
    {
        if (app()->isDownForMaintenance()){
            return response()->json(
                [
                    'http_status' => Response::HTTP_SERVICE_UNAVAILABLE,
                    'message' => 'Service Unavailable'
                ]
            );
        }
        return response()->json(
            [
                'http_status' => Response::HTTP_OK,
                'message' => 'So Far, So Good']
        );
    }
}
