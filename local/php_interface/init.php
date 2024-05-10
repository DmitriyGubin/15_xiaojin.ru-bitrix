<?php

define("APPLICATION_PATH", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
include_once(APPLICATION_PATH . join(DIRECTORY_SEPARATOR, array("local", "php_interface", "")) . "autoload.php");

$eventManager = \Bitrix\Main\EventManager::getInstance();

$eventManager->addEventHandler(
    'search',
    'BeforeIndex',
    ['\Common\EventHandler\Index', 'BeforeIndex']
);

$eventManager->addEventHandler(
    'main',
    'OnEpilog',
    ['\Common\EventHandler\Epilog', 'OnEpilog']
);


function debug($data)
{
	echo '<pre>'.print_r($data, 1).'</pre>';
}
function is_dev()
{
    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if (in_array($ip, ['109.111.177.150','95.170.149.12','37.195.215.28']) || (isset($_REQUEST['devmode']) && $_REQUEST['devmode'] = 1)) {

        return true;
    } else {
        return false;
    }
}

function is_new_version(){
    return is_dev();
}

function Return_All_Fields_Props($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		$j=0;
		while($ob = $res->GetNextElement())
		{
			$result[$j]['fields'] = $ob->GetFields();
			$result[$j]['props'] = $ob->GetProperties();
			$j++;
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Sections($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockSection::GetList(
                Array(),
                $Filter,
                false,
                $Select,
                false
            );

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

?>