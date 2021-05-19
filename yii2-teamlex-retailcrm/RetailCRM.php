<?php

namespace teamlex;

use app\modules\admin\models\Integration;
use RetailCrm\ApiClient;
use teamlex\retailcrm\Customers;
use teamlex\retailcrm\Orders;

/**
 * Class RetailCRM
 * @package teamlex
 *
 * @property string|null $shop
 *
 * @property Integration|null $integration
 * @property ApiClient|null $retailcrm
 * @property Customers $customers
 * @property Orders $orders
 */
class RetailCRM
{
    public $integration;
    public $customers;
    public $orders;
    public $retailcrm = null;

    /**
     * RetailCRM constructor.
     */
    public function __construct()
    {
        $this->integration = Integration::findByAlias('retailcrm');
        if ($this->integration) {
            $this->retailcrm = new ApiClient(
                $this->integration->getParamValue('url'),
                $this->integration->getParamValue('apikey'),
                $this->integration->getParamValue('version'),
                $this->integration->getParamValue('site')
            );
        }
        $this->customers = new Customers($this->retailcrm);
    }

    static function customers(){
        $class = new self();
        return new Customers($class->retailcrm);
    }

    static function orders(){
        $class = new self();
        return new Orders($class->retailcrm);
    }
}
