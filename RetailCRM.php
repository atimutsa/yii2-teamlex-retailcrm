<?php

namespace teamlex;

use app\modules\admin\models\Integration;
use RetailCrm\ApiClient;

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

    public function cutomer($user = 'sdf'){
        return $user;
    }
}
