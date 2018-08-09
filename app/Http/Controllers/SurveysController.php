<?php

namespace App\Http\Controllers;

use App\Http\Resources\SurveyResource;
use App\SurveyUser;
use Illuminate\Http\Request;
use App\Survey;

class SurveysController extends Controller
{
    public function index(){
        $surveys = Survey::paginate(5);
        return SurveyResource::collection($surveys);
    }
    public function destroy(Request $request, $id){
        $survey = Survey::find($id);
        $survey->delete();
        return response()->json(['deleted']);
    }
    public function store(Request $request){
        $survey = Survey::create([
            'name' => $request->name,
        ]);
        foreach ($request->selectedusers as $userid){
            SurveyUser::firstOrCreate([
                'survey_id' => $survey->id,
                'user_id' => $userid
            ]);
        }

        return response()->json(['Survey created']);
    }
}
