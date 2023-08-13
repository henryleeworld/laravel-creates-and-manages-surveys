<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;

class SurveyController extends Controller
{
    public function create(): View
    {
        return view('survey', [
            'survey' => $this->getSource()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $survey = $this->getSource();
        $answers = $this->validate($request, $survey->rules);
        
        (new Entry)->for($survey)->fromArray($answers)->push();
        return back()->with('success', __('Entry created successfully!'));
    }

    private function getSource()
	{
        return Survey::where('name', 'Cat Population Survey')->first();
    }
}
