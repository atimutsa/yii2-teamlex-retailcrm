<?php

namespace teamlex\retailcrm;

use app\modules\admin\models\User;
use RetailCrm\ApiClient;
use teamlex\retailcrm\exception\EmptyUserException;
use teamlex\retailcrm\exception\ResponseException;

/**
 * Class Customers
 * @package teamlex\retailcrm
 *
 * @property array $customers
 *
 * @property ApiClient $retailcrm
 * @property User|null $user
 */
class Customers
{
    public $retailcrm;
    public $customers;
    public $user = null;

    /**
     * Customers constructor.
     * @param $retailcrm ApiClient
     */
    public function __construct($retailcrm)
    {
        $this->retailcrm = $retailcrm;
    }

    /**
     * @param null $user
     * @throws EmptyUserException
     * @throws ResponseException
     */
    public function get(){
//        if(!empty($user))
//            $this->user;
//        if($this->user === null)
//            throw new EmptyUserException();
//
//        // получаем список клиентов
//        try {
//            $response = $this->retailcrm->request->customersList(['email' => $this->user->email]);
//
//            // если запрос произошел успешно
//            if ($response->isSuccessful()) {
//                $this->customers = $response->getResponse();
//            } else {
//                // иначе выбрасываем исключение
//                // @todo нужно настроить логирование
//                // todo нужно настроить логирование
//                throw new ResponseException($response->getStatusCode(), $response->getResponseBody());
//            }
//        } catch (\RetailCrm\Exception\CurlException $e) {
//            throw new ResponseException($e->getMessage(), $e->getCode());
//        }
    }
}