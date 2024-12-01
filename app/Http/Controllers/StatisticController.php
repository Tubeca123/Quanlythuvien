<?php

namespace App\Http\Controllers;
use App\Models\Borrow_return_detail;

use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function getStatistics()
{
    $OkeCount = Borrow_return_detail::where('Status', 1)->count();
    $DamageCount = Borrow_return_detail::where('Status', 2)->count();
    $dieCount = Borrow_return_detail::where('Status', 0)->count();

    return view('admin.pages.dashboard', compact('OkeCount', 'DamageCount', 'dieCount'));
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

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
