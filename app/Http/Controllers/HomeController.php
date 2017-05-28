<?php

namespace App\Http\Controllers;

use App\Request;
use App\Departament;
use Carbon\Carbon;
use function foo\func;

class HomeController extends Controller
{

    /**
     * Página principal
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $requestsNumber = Request::done()->count();

        $coloredRequests = Request::done()->colored();

        $blackAndWhiteRequests = Request::done()->blackAndWhite();

        $todayRequests = Request::done()->ofToday();
        $mouthRequests = Request::done()->ofMonth();

        $averagePerMouth = round(Request::done()->ofMonth()->count() /
            cal_days_in_month(CAL_GREGORIAN,
                Carbon::now()->month,
                Carbon::now()->year
            ), 2);

        $departments = Departament::withCount(['users','requests'])->orderBy('requests_count', 'DESC')->take(3)->get();


        return view('home', compact('requestsNumber', 'coloredRequests', 'blackAndWhiteRequests',
            'departments', 'todayRequests', 'mouthRequests', 'averagePerMouth'));
    }

    public function blocked()
    {
        return view('blocked');
    }
}
