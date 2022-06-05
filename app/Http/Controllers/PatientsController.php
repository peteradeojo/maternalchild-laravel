<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatientsController extends Controller
{
    //
    function index(Request $request, $count = 50)
    {
        $patients = Patient::paginate($count);
        return view('patients.index', compact('patients'));
    }

    function create()
    {
        return view('patients.create');
    }

    function store() {

    }
}
