<?php

namespace App\Http\Controllers;

use App\Models\Borrow_return_detail;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{

    public function index()
    {
        $OkeCount = Borrow_return_detail::where('Status', 1)->count();
        $DamageCount = Borrow_return_detail::where('Status', 2)->count();
        $dieCount = Borrow_return_detail::where('Status', 0)->count();
        $totalCount = $OkeCount + $DamageCount + $dieCount;
        $OkePercentage = ($totalCount > 0) ? round(($OkeCount / $totalCount) * 100, 2) : 0;
        $DamagePercentage = ($totalCount > 0) ? round(($DamageCount / $totalCount) * 100, 2) : 0;
        $diePercentage = ($totalCount > 0) ? round(($dieCount / $totalCount) * 100, 2) : 0;

        $borrowByWeekDay = DB::table('borrow')
            ->selectRaw('DAYOFWEEK(Create_date) as weekday, COUNT(*) as borrow_count')
            ->whereRaw('WEEK(Create_date) = WEEK(CURDATE())')
            ->groupBy('weekday')
            ->orderBy('weekday')
            ->get();

        $weekDays = collect(range(1, 7))->mapWithKeys(function ($day) use ($borrowByWeekDay) {
            return [$day => $borrowByWeekDay->get($day)->borrow_count ?? 0];
        });
        $currentYear = date('Y');
        $borrowByMonth = DB::table('borrow')
            ->selectRaw('MONTH(Create_date) as month, COUNT(*) as borrow_month_count')
            ->whereYear('Create_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = collect(range(1, 12))->mapWithKeys(function ($month) use ($borrowByMonth) {
            return [$month => $borrowByMonth->get($month)->borrow_month_count ?? 0];
        });
        return view('admin.pages.dashboard', compact('OkePercentage', 'DamagePercentage', 'diePercentage', 'OkeCount', 'DamageCount', 'dieCount', 'borrowByWeekDay', 'borrowByMonth'));
    }
    public function search(Request $rq)
    {
        $startDate = $rq->input('start', date('Y-m-01'));
        $endDate = $rq->input('end', date('Y-m-d'));

        $OkeCount = Borrow_return_detail::where('Status', 1)->whereBetween('Create_date', [$startDate, $endDate])->count();
        $DamageCount = Borrow_return_detail::where('Status', 2)->whereBetween('Create_date', [$startDate, $endDate])->count();
        $dieCount = Borrow_return_detail::where('Status', 0)->whereBetween('Create_date', [$startDate, $endDate])->count();
        $totalCount = $OkeCount + $DamageCount + $dieCount;
        $OkePercentage = ($totalCount > 0) ? round(($OkeCount / $totalCount) * 100, 2) : 0;
        $DamagePercentage = ($totalCount > 0) ? round(($DamageCount / $totalCount) * 100, 2) : 0;
        $diePercentage = ($totalCount > 0) ? round(($dieCount / $totalCount) * 100, 2) : 0;

        $borrowByWeekDay = DB::table('borrow')
            ->selectRaw('DAYOFWEEK(Create_date) as weekday, COUNT(*) as borrow_count')
            ->whereBetween('Create_date', [$startDate, $endDate])
            ->groupBy('weekday')
            ->orderBy('weekday')
            ->get();

        $weekDays = collect(range(1, 7))->mapWithKeys(function ($day) use ($borrowByWeekDay) {
            return [$day => $borrowByWeekDay->get($day)->borrow_count ?? 0];
        });

        $borrowByMonth = DB::table('borrow')
            ->selectRaw('MONTH(Create_date) as month, COUNT(*) as borrow_month_count')
            ->whereBetween('Create_date', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $months = collect(range(1, 12))->mapWithKeys(function ($month) use ($borrowByMonth) {
            return [$month => $borrowByMonth->get($month)->borrow_month_count ?? 0];
        });

        return view('admin.pages.dashboard', compact('OkePercentage', 'DamagePercentage', 'diePercentage', 'OkeCount', 'DamageCount', 'dieCount', 'borrowByWeekDay', 'borrowByMonth'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
