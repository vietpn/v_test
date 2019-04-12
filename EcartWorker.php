<?php
include './formats/Format.php';
include './formats/ArticleMaster.php';
include './formats/ArticleMasterItemBarcode.php';
include './formats/ArticleMasterItemUOM.php';
include './formats/SellingPrice.php';
include './formats/Store.php';

$articleMaster = new ArticleMaster('./sample/PRD_ArticleMaster_140264446_10324101_20181111-223303-653.xml');
echo $articleMaster->sendToEcartService() . "\n";

$articleMasterItemBarcode = new ArticleMasterItemBarcode('./sample/PRD_ArticleMaster_ItemBarcode_140532947_10010422_20181112-224422-686.xml');
echo $articleMasterItemBarcode->sendToEcartService() . "\n";

$articleMasterItemUOM = new ArticleMasterItemUOM('./sample/PRD_ArticleMaster_ItemUOM_140532947_10010422_20181112-224422-557.xml');
echo $articleMasterItemUOM->sendToEcartService() . "\n";

$sellingPrice = new SellingPrice('./sample/PRD_SellingPrice_20181113-000604-694.xml');
echo $sellingPrice->sendToEcartService() . "\n";

$store = new Store('./sample/PRD_Store_20181112171750.xml');
echo $store->sendToEcartService() . "\n";

?>