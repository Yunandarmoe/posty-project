<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw('count(*) as count'), DB::raw('DATE(created_at) as date'))
            ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->pluck('count', 'date');

        $labels = $users->keys();
        $data = $users->values();

        return view('chart', compact('labels', 'data'));
    }
}
