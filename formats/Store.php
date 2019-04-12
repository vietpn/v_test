<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 10/04/2019
 * Time: 10:15
 */

class Store implements Format
{
    public $file;
    public $xml;

    private $data = array();

    public function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file) or null;

        if (!empty($this->xml) && !empty($this->xml->STORE)) {
            foreach ($this->xml->STORE as $store) {
                $storeArr = array(
                    'STORE_CODE' => (isset($store->STORE_CODE)) ? (string)$store->STORE_CODE : '',
                    'STORE_NAME' => (isset($store->STORE_NAME)) ? (string)$store->STORE_NAME : '',
                    'CITY_CODE' => (isset($store->CITY_CODE)) ? (string)$store->CITY_CODE : '',
                    'CITY' => (isset($store->CITY)) ? (string)$store->CITY : '',
                    'ADDRESS' => (isset($store->ADDRESS)) ? (string)$store->ADDRESS : '',
                    'PHONE_NUMBER' => (isset($store->PHONE_NUMBER)) ? (string)$store->PHONE_NUMBER : '',
                    'LATITUDE' => (isset($store->LATITUDE)) ? (string)$store->LATITUDE : '',
                    'LONGITUDE' => (isset($store->LONGITUDE)) ? (string)$store->LONGITUDE : '',
                    'BLOCKED' => (isset($store->BLOCKED)) ? (string)$store->BLOCKED : '',
                );
                $this->data[] = $storeArr;
            }
        }
    }

    public function sendToEcartService()
    {
        return json_encode($this->data);
    }
}