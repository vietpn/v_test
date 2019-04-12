<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 10/04/2019
 * Time: 10:13
 */

class ArticleMasterItemBarcode implements Format
{
    public $file;
    public $xml;

    private $data = array(
        'SAPIDocNo' => '',
        'Barcode' => array(
            'ItemNo' => '',
            'BarcodeNo' => '',
            'UOMCode' => '',
        )
    );

    public function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file) or null;

        if (!empty($this->xml) && !empty($this->xml->SAPIDocNo)) {
            $this->data['SAPIDocNo'] = (string)$this->xml->SAPIDocNo;
        }

        if (!empty($this->xml) && !empty($this->xml->Barcode)) {
            $this->data['Barcode']['ItemNo'] = (isset($this->xml->Barcode->ItemNo)) ? (string)$this->xml->Barcode->ItemNo : '';
            $this->data['Barcode']['BarcodeNo'] = (isset($this->xml->Barcode->BarcodeNo)) ? (string)$this->xml->Barcode->BarcodeNo : '';
            $this->data['Barcode']['UOMCode'] = (isset($this->xml->Barcode->UOMCode)) ? (string)$this->xml->Barcode->UOMCode : '';
        }
    }

    public function sendToEcartService()
    {
        return json_encode($this->data);
    }
}