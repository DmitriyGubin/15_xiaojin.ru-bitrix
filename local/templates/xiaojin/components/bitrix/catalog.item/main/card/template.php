<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
$price = '';
$arSelect = Array("ID", "NAME", "PROPERTY_PRICE");
$arFilter = Array("IBLOCK_ID"=>$item["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$item["ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $price = number_format($arFields["PROPERTY_PRICE_VALUE"], 0, '.', ' ');
}
?>
<? $img_card=CFile::ResizeImageGet($item["PREVIEW_PICTURE_SECOND"]["ID"], array('width'=>270, 'height'=> 240), BX_RESIZE_IMAGE_EXACT, true)?>
<a href="<?=$item['DETAIL_PAGE_URL']?>">

    <?if($item['PROPERTIES']['NALICHIE']["VALUE"] == 1){?>
        <span class="product-item-label available">В наличии</span>
    <?} else if($item['PROPERTIES']['NALICHIE']["VALUE"] == 2){?>
        <span class="wait-arrival-label-gradient"></span>
        <span class="product-item-label wait-arrival">Ожидается поступление</span>
    <?} else {?>
        <span class="not-available-label-gradient"></span>
        <span class="product-item-label not-available">Нет в наличии</span>
    <?}?>

<div class="catalog_block_products_flex_in_img">
    <? if ($img_card["src"]) {?>
        <?/* <img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$imgTitle?>" title="<?=$imgTitle?>">*/?>
        <img src="<?=$img_card["src"]?>" alt="<?=$imgTitle?>" title="<?=$imgTitle?>" loading="lazy">
    <?} else {?>
        <img src="<?=$item['PREVIEW_PICTURE_SECOND']["SRC"]?>" alt="<?=$imgTitle?>" title="<?=$imgTitle?>" loading="lazy">
    <?}?>
</div>
<div class="catalog_block_products_flex_in_txt"><?=$item['NAME']?></div>
</a>

		<div class="product-item-description">
            <?php if ($item['PROPERTIES']['SHORT_DESC']['VALUE']): ?>
                <?= $item['PROPERTIES']['SHORT_DESC']['VALUE'] ?>
            <?php elseif ($item['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['VALUE']): ?>
                <?= $item['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['NAME'] ?>: <?= $item['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['VALUE'] ?>
            <?php elseif ($item['PROPERTIES']['MOSHCHNOST_VT']['VALUE']): ?>
                <?= $item['PROPERTIES']['MOSHCHNOST_VT']['NAME'] ?>: <?= $item['PROPERTIES']['MOSHCHNOST_VT']['VALUE'] ?>
            <?php elseif ($item['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['VALUE']): ?>
                <?= $item['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['NAME'] ?>: <?= $item['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['VALUE'] ?>
            <?php endif; ?>
		</div>

<div class="catalog_block_products_flex_in_btns">
    <div class="catalog_block_products_flex_in_btns_price"><?=$price?> ₽</div>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="btn_1">Детальнее</a>
</div>