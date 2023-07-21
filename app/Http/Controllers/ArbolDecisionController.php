<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class ArbolDecisionController extends Controller
{
    public function predecirDiabetes (Request $request)
    {
        return view('objetivo1.index');
    }
}