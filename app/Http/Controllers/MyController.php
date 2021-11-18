<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surveys;
use App\Models\answers;
use App\Models\users;
use App\Models\counts;
use Carbon;

class MyController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function view_survey($id)
    {
        $user_id = $_SERVER['REMOTE_ADDR'];

        $users = users::where('ip', '=', $user_id)->where('surveys_id', '=', $id)->first();

        if (!empty($users)) {

            $count_answer = counts::where('surveys_id', '=', $id)->with('survey', 'answer')->get();

            $survey = [];

            foreach ($count_answer as $counts) {
                $survey['text'] = $counts->survey->text;
                $survey['answer'][$counts->answer->answer] = $counts->counts;
            }
            return view('chosen_answer', ['survey' => $survey]);

        } else {
            $survey = surveys::where('id', $id)->with('answers')->first();
            return view('survey', ['survey' => $survey]);
        }
    }


    public function create_survey()
    {
        $survey = new surveys();
        $survey->text = $_GET['text'];
        $survey->datetime = date('Y-d-m', strtotime($_GET['datetime']));
        $survey->save();

        foreach ($_GET['answers'] as $key => $value) {
            $answers = new answers();
            $answers->answer = $value;
            $answers->surveys_id = $survey->id;
            $answers->save();

            $counts = new counts();
            $counts->surveys_id = $survey->id;
            $counts->answer_id = $answers->id;
            $counts->counts = 0;
            $counts->save();
        }

        return view('link_form', ['survey_id' => $survey->id]);
    }

    public function chosen_answer(Request $request)
    {

        $countes = counts::where('answer_id', '=', $request['answ'])->first();
        $countes->counts++;
        $countes->save();

        $answer = new users();
        $answer->ip = $request->ip();
        $answer->surveys_id = $request['id'];
        $answer->save();

        return $this->view_survey($request['id']);

    }

    public function surveys_flag_overdue()
    {
        $date = date('Y-d-m', strtotime('now'));
        $flags = surveys::where('datetime', '<=', $date)->get();

        if ($flags->count()) {
            foreach ($flags as $flag) {
                $flag->flag_overdue = 1;
                $flag->save();
            }
        }
    }
    public function truncate_surveys ()
    {
        $surveys = surveys::where('flag_overdue', '=', 1)->get();
    }
}
