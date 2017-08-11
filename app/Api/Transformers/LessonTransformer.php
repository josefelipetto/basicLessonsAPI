<?php
/**
 * Created by PhpStorm.
 * User: josefelipetto
 * Date: 11/08/17
 * Time: 16:58
 */

namespace App\Transformers;

/**
 * Class LessonTransformer
 * @package App\Transformers
 */
class LessonTransformer extends Transformer
{

    /**
     * @param $lesson
     * @return array
     */
    public function transform($lesson)
    {

        return [

            'title' => $lesson['title'],
            'body'  => $lesson['body']
        ];
    }
}