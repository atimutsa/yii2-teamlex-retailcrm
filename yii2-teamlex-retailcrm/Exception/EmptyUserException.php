<?php

namespace teamlex\retailcrm\exception;


class EmptyUserException extends \Exception
{
    public function __construct($message = 'Пользователь не передан') {
        parent::__construct($message);
    }
}