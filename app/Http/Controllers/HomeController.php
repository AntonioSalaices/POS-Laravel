<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Charts;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function dashboard()
    {
        // Grafica1
        $usersChart = new Charts;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        // Termina
        // Grafica2
        $usersChart = new Charts;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        // Termina
        // Grafica3
        $usersChart = new Charts;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        // Termina
        // Grafica4
        $usersChart = new Charts;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        // Termina
        return view('dashboard', [ 'usersChart' => $usersChart ] );
    }
}
