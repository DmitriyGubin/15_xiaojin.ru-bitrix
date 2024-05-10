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
$this->setFrameMode(true);

$res = CIBlockElement::GetList([], ['IBLOCK_ID'=>$arResult["IBLOCK_ID"], "ID"=>$arResult["ID"]], false, [], []);
while ($el = $res->GetNextElement()) {
    $fields = $el->getFields();
    $fields['PROPERTIES'] = $el->getProperties();
}

?>
<div class="container">
    <div class="heading_block">
        <a href="/catalog/" class="btn_1">В каталог</a>
        <h1 class="heading" style="padding-top: 75px;"><?=$arResult["NAME"]?></h1>
    </div>
    <div class="card_block">
        <div class="card_block_flex" style="align-items: flex-start;">
            <div class="card_block_flex_left">
                <?php $j=0; ?>
                <div class="slider_card">
                    <? if (!empty($fields['PROPERTIES']["GALLERY"]["VALUE"])) {?>
                        <? foreach ($fields['PROPERTIES']["GALLERY"]["VALUE"] as $gal) {?>
                            <?php 
                                $j++;
                                if($j == 1)
                                {
                                    $path_img = CFile::getPath($gal);
                                }
                            ?>
                            <div class="slider_card_inner">
                                <div class="slider_card_inner_in">
                                    <img src="<?=CFile::getPath($gal)?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>">
                                </div>
                            </div>
                    <?}}else{?>
                        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])){?>
                            <div class="slider_card_inner">
                                <?php $path_img = $arResult["DETAIL_PICTURE"]["SRC"]; ?>
                                <div class="slider_card_inner_in">
                                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>">
                                </div>
                            </div>
                        <?}?>
                    <?}?>
                </div>
            </div>
            <div class="card_block_flex_right">
                <div class="card_price_btn">
                    <div class="card_price_btn_left">
                        <span>СТОИМОСТЬ</span>
                        <p><?=number_format($fields['PROPERTIES']['PRICE']['VALUE'],0, '.', ' ')?> ₽</p>
                    </div>
                    <div class="card_price_btn_right">
                        <?if($fields['PROPERTIES']['NALICHIE']["VALUE"] == 1){?>
                            <span>В НАЛИЧИИ</span>
                        <?} else if($fields['PROPERTIES']['NALICHIE']["VALUE"] == 2){?>
                            <span>ОЖИДАЕМ ПОСТУПЛЕНИЕ</span>
                        <?} else {?>
                            <span>НЕТ В НАЛИЧИИ</span>
                        <?}?>
                        <?if($fields['PROPERTIES']['NALICHIE']["VALUE"] == 1){?>
                            <a href="#ctlg_block2" class="btn_2">Купить</a>
                        <?} else {?>
                            <a href="#ctlg_block2" class="btn_2">Оставить запрос</a>
                        <?}?>
                    </div>
                </div>
                <div class="card_block_flex_right_in">
                    <? foreach ($fields['PROPERTIES'] as $prop) {?>
                    <? if ($prop["CODE"]!="NALICHIE" AND $prop["CODE"]!="PRICE" AND $prop["CODE"]!="GALLERY" AND $prop["CODE"]!="SSYLKI_NA_VIDEO" AND $prop["VALUE"]) {?>
                    <div class="card_block_flex_right_in_inner">
                        <p><?=$prop["NAME"]?></p>
                        <span><?=$prop["VALUE"]?></span>
                    </div>
                    <?}}?>
                </div>
                <div class="card_block_flex_right_in_txt">

                </div>
            </div>
        </div>
    </div>
    <div class="card_block2">
        <div class="card_block2_flex">
            <div class="card_block2_flex_left">
                <p>ОПИСАНИЕ</p>
            </div>
            <div class="card_block2_flex_right">
                <?if($arResult["NAV_RESULT"]):?>
                    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
                        <?=$arResult["NAV_STRING"]?><br />
                    <?endif;?>
                    <?echo $arResult["NAV_TEXT"];?>
                    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
                <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
                    <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                    <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
            </div>
        </div>



        <? /*if ($fields['PROPERTIES']['SSYLKI_NA_VIDEO']['VALUE']) {?>
        <div class="card_block2_flex">
            <div class="card_block2_flex_left">
                <p>ВИДЕО ОБЗОР <br> ТОВАРА</p>
            </div>
            <div class="card_block2_flex_right">
                <div class="card_block2_flex_right_video">
                    <a href="<?=$fields['PROPERTIES']['SSYLKI_NA_VIDEO']['VALUE']?>" class="play_vid" data-fancybox="video"></a>
                    <img src="/img/card_block2_flex_right_video_img1.png" alt="">
                </div>
            </div>
        </div>
        <?}*/?>
    </div>
</div>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "catalog_delivery",
    array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "IBLOCK_ID" => 18,
        "IBLOCK_TYPE" => "content",
        "NEWS_COUNT" => "999",
        "FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "DETAIL_PICTURE", ""),
        "PROPERTY_CODE" => array("SORT_MAIN"),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "DESC",
        "FILTER_NAME" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
    )
);
?>

<?php
global $arSimilarFilter;
$arSimilarFilter['!ID'] = $arResult['ID'];

$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "product_slider",
    array(
        "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CUSTOM_FILTER" => "",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_SORT_FIELD" => "shows",
        "ELEMENT_SORT_FIELD2" => "ID",
        "ELEMENT_SORT_ORDER" => "DESC",
        "ELEMENT_SORT_ORDER2" => "DESC",
        "HIDE_NOT_AVAILABLE" => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "",
        "PRICE_CODE" => array("BASE"),
        "PROPERTY_CODE" => [],
        "PROPERTY_CODE_MOBILE" => array(),
        "SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
        "SECTION_CODE" => false,
        "SECTION_ID_VARIABLE" => false,
        "SEF_MODE" => "Y",
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SHOW_ALL_WO_SECTION" => "N",
        "PAGE_ELEMENT_COUNT" => 20,
        "FILTER_NAME" => "arSimilarFilter",
    )
);
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "<?= $arResult["NAME"]; ?>",
  "image": "<?= 'https://xiaojin.ru'.$path_img; ?>",
  "description": "<?= strip_tags($arResult["DETAIL_TEXT"]); ?>",
  "brand": {
    "@type": "Brand",
    "name": "Xiaojin"
  },
  "offers": {
    "@type": "Offer",
    "url": "<?= 'https://xiaojin.ru'.($APPLICATION->GetCurPage()); ?>",
    "priceCurrency": "RUB",
    "price": "<?= round($fields['PROPERTIES']['PRICE']['VALUE']); ?>",
    "availability": "https://schema.org/<?= $arResult['PROPERTIES']['NALICHIE']['VALUE'] ? 'InStock' : 'OutOfStock' ?>",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "bestRating": "5",
    "worstRating": "5",
    "ratingCount": "5"
  }
}
</script>
