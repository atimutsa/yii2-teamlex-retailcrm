<?php

namespace teamlex;

use app\modules\admin\models\Integration;
use RetailCrm\ApiClient;
use \app\modules\admin\models\User;

/**
 * Class RetailCRM
 * @package teamlex
 */
class RetailCRM
{
    public $integration;

    public function __construct()
    {
        $this->integration = Integration::findByAlias('retailcrm');
    }

    static function get(){
        return new self();
    }

    /**
     * @param $user User
     * @return mixed
     */
    public function cutomer($user){
        return $user;
    }
}
