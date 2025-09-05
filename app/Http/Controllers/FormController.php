<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Validate and process the form data here
        $questions = $request->input('questions', []);

        $result = new Result($questions);

        $results = $result->calculateResults();
        $request->session()->flash('results', $results);
        return redirect('/result');
    }
}
