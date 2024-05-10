<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

// global $DB;
// foreach($arResult['SEARCH'] as &$arItems){
//     $item_id=$arItems['ITEM_ID'];
//     $res = $DB->Query("SELECT `CUSTOM_RANK`,`ITEM_ID` FROM `b_search_content` WHERE `ITEM_ID`='$item_id'", false, $err_mess.__LINE__);
//     if($arr=$res->Fetch()){
//         $arItems['TEST_SORTING'] = $arr['CUSTOM_RANK'];
//     }
// }
// echo '<pre>'; print_r($arResult); echo '</pre>';

if (empty($arResult['SEARCH']))
    return;

$arElementID = [];

foreach ($arResult['SEARCH'] as $arItem)
{
    if ($arItem['MODULE_ID'] == 'iblock')
    {
        $arElementID[$arItem['ITEM_ID']] = $arItem;
    }
}

if (empty($arElementID))
    return;

\Bitrix\Main\Loader::includeModule('iblock');

$arElementSection = [];

$iterator = CIBlockElement::GetList([],array('ID'=>array_keys($arElementID),false,false,array('ID','IBLOCK_SECTION_ID')));
while ($ar = $iterator->Fetch())
{
    $arElementSection[$ar['IBLOCK_SECTION_ID']][] = $arElementID[$ar['ID']];
}

if (empty($arElementSection))
    return;

?>
<ul>
    <?php
    foreach ($arElementSection as $sectionId => $arItems)
    {
        $arSection = CIBlockSection::GetByID($sectionId)->GetNext();
        if (!$arSection)
            return;

        ?>
        <li>
            <a href="<?=$arSection['SECTION_PAGE_URL']?>"><span><?=$arSection['NAME']?></span></a>
        </li>
        <?
        foreach ($arItems as $arItem)
        {
            ?>
            <li>
                <a href="<?=$arItem['URL']?>"><?=$arItem['NAME']?></a>
            </li>
            <?
        }
        ?>
        <?php
    }
    ?>
</ul>
<?php

$arAllItem = reset($arResult['CATEGORIES']['all']['ITEMS']);

if ($arAllItem)
{
    ?>
    <a href="<?=$arAllItem['URL']?>" class="search-list__all">Показать все результаты</a>
    <?php
}