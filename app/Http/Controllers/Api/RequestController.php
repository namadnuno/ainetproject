<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function ofWeek()
    {
        $requests = auth()->user()->requests();

        $labels = [];
        $data = [];

        $begin = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();

        do {
            $data[] = auth()->user()->requests()->between($begin->copy()->startOfDay(), $begin->copy()->endOfDay())->count();
            $labels[] = $begin->toDateString();
        } while ($begin->addDay()->lt($end));

        return response()->json(compact('data', 'labels'));
    }
}
