<?php
/**
 * Created by PhpStorm.
 * User: josefelipetto
 * Date: 11/08/17
 * Time: 16:56
 */


namespace App\Transformers;


/**
 * Class Transformer
 * @package App\Transformers
 */
abstract class Transformer
{

    /**
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items)
    {

        return array_map([$this,'transform'], $items);

    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);
}