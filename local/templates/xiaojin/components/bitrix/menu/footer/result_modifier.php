<?php

/**
 * @var $arResult []
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;
$curPage = $APPLICATION->GetCurPage();

foreach ($arResult as &$arItem) {
    $arItem['LINK'] = preg_replace('/index\.php$/', '', $arItem['LINK']);
    $arItem['SELECTED'] = $arItem['LINK'] == $curPage;
    $arItem['SELECTED_CHILDREN'] = $arItem['LINK'] != $curPage && stripos($curPage, $arItem['LINK']) !== false;
}
