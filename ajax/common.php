<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

foreach ($_POST as $key => $value) 
{
	$_POST[$key] = trim($value);
}

$arResult = array('status' => false);

$delimeter = $_POST['delimiter'];

$saveElement = false;

if($delimeter == 'Попап детальный просмотр')
{
	$product = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "ID"=>$_POST['id']),
		Array()
	);

	$galery = $product[0]['props']['PHOTO_GALLERY']['VALUE'];
	$galery_path = [];
	foreach ($galery as $photo_id) 
	{
		$galery_path[] = CFile::GetPath($photo_id);
	}
	/*************/
	$name = $product[0]['fields']['NAME'];
	$short_descr = $product[0]['props']['SHORT_DESCR']['VALUE'];
	$character = $product[0]['props']['CHARACTERISTICS']['VALUE'];

	$arResult['status'] = true;
	$arResult['galery'] = $galery_path;
	$arResult['name'] = $name;
	$arResult['short_descr'] = $short_descr;
	$arResult['character'] = $character;
}

if($delimeter == 'Форма на странице')
{
	$PROP = array();
	$PROP['CLIENT_FULL_NAME'] = $_POST['fio'];
	$PROP['EMAIL'] = $_POST['email'];
	$PROP['PHONE'] = $_POST['phone'];

    $saveElement = true;

	if(CEvent::Send("NEW_ORDER_FORM", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}

if($delimeter == 'Попап задать вопрос')
{
	$PROP = array();
	$PROP['CLIENT_FULL_NAME'] = $_POST['fio'];
	$PROP['EMAIL'] = $_POST['email'];
	$PROP['PHONE'] = $_POST['phone'];
	$PROP['QUEST'] = $_POST['quest'];

    $saveElement = true;

	if(CEvent::Send("NEW_QUEST", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}

if($delimeter == 'Попап оборудование')
{
	$PROP = array();
	$PROP['CLIENT_FULL_NAME'] = $_POST['fio'];
	$PROP['EMAIL'] = $_POST['email'];
	$PROP['PHONE'] = $_POST['phone'];
	$PROP['PRODUCT'] = $_POST['product_name'];

    $saveElement = true;

	if(CEvent::Send("NEW_ORDER_PRODUCT", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}

if ($saveElement && isset($PROP)) {
    \Bitrix\Main\Loader::includeModule('iblock');

    $PROP['FORM'] = $delimeter;

    global $DB;
    $sDate = date($DB->DateFormatToPHP(\CLang::GetDateFormat()));

    $arLoadProductArray = [
        'IBLOCK_SECTION_ID' => false,
        'IBLOCK_ID' => 20,
        'PROPERTY_VALUES' => $PROP,
        'NAME' => 'Сообщение от ' . $sDate,
        'ACTIVE' => 'N',
    ];

    $el = new CIBlockElement;
    $el->Add($arLoadProductArray);
}

include('add_lead_bitrix24.php');
echo json_encode($arResult);
?>