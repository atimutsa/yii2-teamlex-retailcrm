<?php

namespace teamlex;

use app\modules\admin\models\Integration;
use Codeception\Template\Api;
use RetailCrm\ApiClient;
use \app\modules\admin\models\User;

/**
 * Class RetailCRM
 * @package teamlex
 *
 * @property string|null $shop
 *
 * @property Integration|null $integration
 * @property ApiClient|null $retailcrm
 */
class RetailCRM
{
    public $integration;
    public $retailcrm;
    public $shop;

    public function __construct()
    {
        $this->integration = Integration::findByAlias('retailcrm');
        if($this->integration){
            $this->shop = $this->integration->getParamValue('shop');
            $this->retailcrm = new ApiClient(
                $this->integration->getParamValue('url'),
                $this->integration->getParamValue('apikey'),
                $this->integration->getParamValue('version')
            );
        }
    }

    static function get(){
        return new self();
    }

    /**
     * @param bool $shop
     */
    public function setShop($shop = false){
        if($shop){
            $this->shop = $shop;
        }
        return new self();
    }

    /**
     * @param string $userModel
     * @return RetailCRM
     */
    public function customer($userModel, $filterBy = 'email'){
        try {
            $response = $this->retailcrm->request->customersList([$filterBy => $userModel->{$filterBy}]);
            print_r($response); exit();
            // сохраняем retailCrmId в базе ИМ
            if ($response->isSuccessful()) {
                $customer = $response->getResponse();
            } else {
                // @todo нужно настроить логирование
                // todo нужно настроить логирование
            }
        } catch (\RetailCrm\Exception\CurlException $e) {
//                            return [
//                                'error' => true,
//                                'msg' => "Connection error: " . $e->getMessage(),
//                            ];
        }
        return new self();
    }

    public function run(){

    }
}
