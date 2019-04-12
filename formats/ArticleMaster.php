<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 10/04/2019
 * Time: 10:12
 */

class ArticleMaster implements Format
{
    public $file;
    public $xml;

    private $data = array(
        'SAPIDocNo' => '',
        'LineItem' => array(
            'MaterialNo' => '',
            'ShortDescr' => '',
            'FullDescr' => '',
            'BaseUOM' => '',
            'BrandNo' => '',
            'Model' => '',
            'Blocked' => '',
            'VATGroup' => '',
            'SalesUOM' => '',
            'Level5Code' => '',
            'SpecialAttributes' => '',
            'NoStockPosting' => '',
            'SerialNumCheck' => '',
            'BlockVINID' => '',
            'ArticleType' => '',
        )
    );

    public function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file) or null;

        if (!empty($this->xml) && !empty($this->xml->SAPIDocNo)) {
            $this->data['SAPIDocNo'] = (string)$this->xml->SAPIDocNo;
        }

        if (!empty($this->xml) && !empty($this->xml->LineItem)) {
            $this->data['LineItem']['MaterialNo'] = (isset($this->xml->LineItem->MaterialNo)) ? (string)$this->xml->LineItem->MaterialNo : '';
            $this->data['LineItem']['ShortDescr'] = (isset($this->xml->LineItem->ShortDescr)) ? (string)$this->xml->LineItem->ShortDescr : '';
            $this->data['LineItem']['FullDescr'] = (isset($this->xml->LineItem->FullDescr)) ? (string)$this->xml->LineItem->FullDescr : '';
            $this->data['LineItem']['BaseUOM'] = (isset($this->xml->LineItem->BaseUOM)) ? (string)$this->xml->LineItem->BaseUOM : '';
            $this->data['LineItem']['BrandNo'] = (isset($this->xml->LineItem->BrandNo)) ? (string)$this->xml->LineItem->BrandNo : '';
            $this->data['LineItem']['Model'] = (isset($this->xml->LineItem->Model)) ? (string)$this->xml->LineItem->Model : '';
            $this->data['LineItem']['Blocked'] = (isset($this->xml->LineItem->Blocked)) ? (string)$this->xml->LineItem->Blocked : '';
            $this->data['LineItem']['VATGroup'] = (isset($this->xml->LineItem->VATGroup)) ? (string)$this->xml->LineItem->VATGroup : '';
            $this->data['LineItem']['SalesUOM'] = (isset($this->xml->LineItem->SalesUOM)) ? (string)$this->xml->LineItem->SalesUOM : '';
            $this->data['LineItem']['Level5Code'] = (isset($this->xml->LineItem->Level5Code)) ? (string)$this->xml->LineItem->Level5Code : '';
            $this->data['LineItem']['SpecialAttributes'] = (isset($this->xml->LineItem->SpecialAttributes)) ? (string)$this->xml->LineItem->SpecialAttributes : '';
            $this->data['LineItem']['NoStockPosting'] = (isset($this->xml->LineItem->NoStockPosting)) ? (string)$this->xml->LineItem->NoStockPosting : '';
            $this->data['LineItem']['SerialNumCheck'] = (isset($this->xml->LineItem->SerialNumCheck)) ? (string)$this->xml->LineItem->SerialNumCheck : '';
            $this->data['LineItem']['BlockVINID'] = (isset($this->xml->LineItem->BlockVINID)) ? (string)$this->xml->LineItem->BlockVINID : '';
            $this->data['LineItem']['ArticleType'] = (isset($this->xml->LineItem->ArticleType)) ? (string)$this->xml->LineItem->ArticleType : '';
        }
    }

    public function sendToEcartService()
    {
        return json_encode($this->data);
    }
}