<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JopController extends Controller
{
    function index(){
    $jobs = Job::all();
    return view("job/index" , ['jobs'=> $jobs ]);

    }
}
