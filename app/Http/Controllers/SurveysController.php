<?php

namespace App\Http\Controllers;

use App\Http\Resources\SurveyResource;
use Illuminate\Http\Request;
use App\Survey;

class SurveysController extends Controller
{
    public function index(){
        $surveys = Survey::paginate(5);
        return SurveyResource::collection($surveys);
    }
}
