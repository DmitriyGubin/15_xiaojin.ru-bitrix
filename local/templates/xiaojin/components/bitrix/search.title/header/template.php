<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if($INPUT_ID == '')
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if($CONTAINER_ID == '')
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
<form class="search_form" action="<?echo $arResult["FORM_ACTION"]?>" id="<?echo $CONTAINER_ID?>">
    <input type="text" autocomplete="off" id="search_input" placeholder="Искать на сайте" name="q" value="" data-entity="search-input">
    <svg class="loopa" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.4844 12.043L15.9185 16.2057" stroke="#9A9A9A" stroke-width="1.3" stroke-linecap="round"/>
        <path d="M13.2641 7.0468C13.2641 10.5875 10.4325 13.4436 6.95706 13.4436C3.48159 13.4436 0.65 10.5875 0.65 7.0468C0.65 3.50607 3.48159 0.65 6.95706 0.65C10.4325 0.65 13.2641 3.50607 13.2641 7.0468Z" stroke="#9A9A9A" stroke-width="1.3"/>
    </svg>

    <div class="search-list" data-entity="search-result"></div>
</form>
<?endif?>
