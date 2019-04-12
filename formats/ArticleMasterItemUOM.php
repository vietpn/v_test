<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 10/04/2019
 * Time: 10:13
 */

class ArticleMasterItemUOM
{
    public $file;
    public $xml;

    private $data = array(
        'SAPIDocNo' => '',
        'ItemUOM' => array(
            'ItemNo' => '',
            'Code' => '',
            'NumeratorOfQtyUOM' => '',
            'DenominatorOfQtyUOM' => '',
            'Length' => '',
            'Width' => '',
            'Height' => '',
            'Cubage' => '',
            'Weight' => '',
        )
    );

    public function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file) or null;

        if (!empty($this->xml) && !empty($this->xml->SAPIDocNo)) {
            $this->data['SAPIDocNo'] = (string)$this->xml->SAPIDocNo;
        }

        if (!empty($this->xml) && !empty($this->xml->ItemUOM)) {
            $this->data['ItemUOM']['ItemNo'] = (isset($this->xml->ItemUOM->ItemNo)) ? (string)$this->xml->ItemUOM->ItemNo : '';
            $this->data['ItemUOM']['Code'] = (isset($this->xml->ItemUOM->Code)) ? (string)$this->xml->ItemUOM->Code : '';
            $this->data['ItemUOM']['NumeratorOfQtyUOM'] = (isset($this->xml->ItemUOM->NumeratorOfQtyUOM)) ? (string)$this->xml->ItemUOM->NumeratorOfQtyUOM : '';
            $this->data['ItemUOM']['DenominatorOfQtyUOM'] = (isset($this->xml->ItemUOM->DenominatorOfQtyUOM)) ? (string)$this->xml->ItemUOM->DenominatorOfQtyUOM : '';
            $this->data['ItemUOM']['Length'] = (isset($this->xml->ItemUOM->Length)) ? (string)$this->xml->ItemUOM->Length : '';
            $this->data['ItemUOM']['Width'] = (isset($this->xml->ItemUOM->Width)) ? (string)$this->xml->ItemUOM->Width : '';
            $this->data['ItemUOM']['Height'] = (isset($this->xml->ItemUOM->Height)) ? (string)$this->xml->ItemUOM->Height : '';
            $this->data['ItemUOM']['Cubage'] = (isset($this->xml->ItemUOM->Cubage)) ? (string)$this->xml->ItemUOM->Cubage : '';
            $this->data['ItemUOM']['Weight'] = (isset($this->xml->ItemUOM->Weight)) ? (string)$this->xml->ItemUOM->Weight : '';
        }
    }

    public function sendToEcartService()
    {
        return json_encode($this->data);
    }
}

