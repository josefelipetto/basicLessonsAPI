<?php
/**
 * Created by PhpStorm.
 * User: josefelipetto
 * Date: 11/08/17
 * Time: 17:17
 */

namespace App\Http\Controllers;


/**
 * Class ApiController
 * @package App\Http\Controllers
 */

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;


    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not found!')
    {

        return $this->setStatusCode(404)->respondWithError($message);

    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {

        return $this->statusCode;

    }


    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [] )
    {

        return response()->json($data,$this->getStatusCode(),$headers);
    }


    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {

        return $this->respond([

            'error' => $message,
            'status_code' => $this->getStatusCode()
        ]);
    }
}