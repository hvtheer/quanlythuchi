<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Household;
use App\Models\Receipt;
use App\Models\Person;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $households = Household::all();
        $people = Person::all();
        $receipts = Receipt::all();
        return view('admin/index', compact('households', 'people', 'receipts'));
    }
}
