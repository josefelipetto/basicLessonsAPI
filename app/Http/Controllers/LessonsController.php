<?php

namespace App\Http\Controllers;

use App\Transformers\LessonTransformer;
use App\Lesson;


/**
 * Class LessonsController
 * @package App\Http\Controllers
 */
class LessonsController extends ApiController
{


    /**
     * @var LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param LessonTransformer $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {

        $this->lessonTransformer = $lessonTransformer;

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        // Why this is a bad practice?
        // 1. All is bad
        // 2. No way to atach meta data
        // 3. Linking DB structure with the Api
        // 4. We have no real way to present errors
        // return Lesson::all();

        $lessons = Lesson::all();
        dd($lessons);
        return \response()->json([

            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())


        ],200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

        $lesson = Lesson::find($id);

        if(! $lesson)
        {

            return $this->respondNotFound('Lesson does not exist');
        }

        return response()->json([

            'data' => $this->lessonTransformer->transform($lesson)
        ],200);

    }

    public function store()
    {
            dd('store');
    }
}
