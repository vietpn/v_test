<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 10/04/2019
 * Time: 10:14
 */

class SellingPrice implements Format
{
    public $file;
    public $xml;

    private $data = array();

    public function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file) or null;

        if (!empty($this->xml) && !empty($this->xml->Lineitems)) {
            foreach ($this->xml->Lineitems as $lineitem) {
                $lineitemArr = array(
                    'SITE' => (isset($lineitem->SITE)) ? (string)$lineitem->SITE : '',
                    'ARTICLE' => (isset($lineitem->ARTICLE)) ? (string)$lineitem->ARTICLE : '',
                    'PRICE' => (isset($lineitem->PRICE)) ? (string)$lineitem->PRICE : '',
                    'Price_UOM' => (isset($lineitem->Price_UOM)) ? (string)$lineitem->Price_UOM : '',
                    'Valid_From' => (isset($lineitem->Valid_From)) ? (string)$lineitem->Valid_From : '',
                    'Valid_To' => (isset($lineitem->Valid_To)) ? (string)$lineitem->Valid_To : '',
                    'Status' => (isset($lineitem->Status)) ? (string)$lineitem->Status : '',
                    'ZMHDRZ' => (isset($lineitem->ZMHDRZ)) ? (string)$lineitem->ZMHDRZ : '',
                    'ZMHDHB' => (isset($lineitem->ZMHDHB)) ? (string)$lineitem->ZMHDHB : '',
                    'ArticleName' => (isset($lineitem->ArticleName)) ? (string)$lineitem->ArticleName : '',
                    'Base_UOM' => (isset($lineitem->Base_UOM)) ? (string)$lineitem->Base_UOM : '',
                    'Denominator' => (isset($lineitem->Denominator)) ? (string)$lineitem->Denominator : '',
                    'Numerator' => (isset($lineitem->Numerator)) ? (string)$lineitem->Numerator : ''
                );
                $this->data[] = $lineitemArr;
            }
        }
    }

    public function sendToEcartService()
    {
        return json_encode($this->data);

    }
}