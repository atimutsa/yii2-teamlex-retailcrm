<?php

namespace teamlex\retailcrm\exception;


class ResponseException extends \Exception
{
    public function __construct($message = 'Пользователь не передан', $code) {
        parent::__construct($message, $code);
    }
}