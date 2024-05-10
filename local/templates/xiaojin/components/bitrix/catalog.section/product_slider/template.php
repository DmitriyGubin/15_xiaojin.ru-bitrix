<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?php if ($arResult['ITEMS']): ?>
    <div class="product-slider">
        <div class="product-slider__head container">
            <div class="product-slider__title">
                <?= $arParams['BLOCK_TITLE'] ?: 'Похожие товары' ?>
            </div>
            <div class="product-slider__control">
                <div class="product-slider__prev"></div>
                <div class="product-slider__next"></div>
            </div>
        </div>
        <div class="product-slider__wrap">
            <div class="product-slider__items">
                <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                    <?php
                    $img_card = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array('width' => 270, 'height' => 240), BX_RESIZE_IMAGE_EXACT, true);
                    $imgTitle = $arItem['NAME'];
                    ?>
                    <div class="product-slider__item">
                        <div class="catalog_block_products_flex_in"  data-entity="item">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <div class="catalog_block_products_flex_in_img">
                                    <? if ($img_card["src"]) {?>
                                        <img src="<?=$img_card["src"]?>" alt="<?=$imgTitle?>" title="<?=$imgTitle?>" loading="lazy">
                                    <?} else {?>
                                        <img src="/local/templates/xiaojin/components/bitrix/catalog.section/main/images/no_photo.png" alt="<?=$imgTitle?>" title="<?=$imgTitle?>" loading="lazy">
                                    <?}?>
                                </div>
                                <div class="catalog_block_products_flex_in_txt">
                                    <?= $arItem['NAME'] ?>
                                </div>
                            </a>
                            <div class="product-item-description">
                                <?php if ($arItem['PROPERTIES']['SHORT_DESC']['VALUE']): ?>
                                    <?= $arItem['PROPERTIES']['SHORT_DESC']['VALUE'] ?>
                                <?php elseif ($arItem['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['VALUE']): ?>
                                    <?= $arItem['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['NAME'] ?>: <?= $arItem['PROPERTIES']['RASCHETNAYA_PROIZVODITELNOST_KG_CHAS']['VALUE'] ?>
                                <?php elseif ($arItem['PROPERTIES']['MOSHCHNOST_VT']['VALUE']): ?>
                                    <?= $arItem['PROPERTIES']['MOSHCHNOST_VT']['NAME'] ?>: <?= $arItem['PROPERTIES']['MOSHCHNOST_VT']['VALUE'] ?>
                                <?php elseif ($arItem['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['VALUE']): ?>
                                    <?= $arItem['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['NAME'] ?>: <?= $arItem['PROPERTIES']['OBSHCHAYA_MOSHCHNOST_VT']['VALUE'] ?>
                                <?php endif; ?>
                            </div>
                            <div class="catalog_block_products_flex_in_btns">
                                <div class="catalog_block_products_flex_in_btns_price"><?= number_format($arItem['PROPERTIES']['PRICE']['VALUE'],0, '.', ' ') ?> ₽</div>
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn_1">Детальнее</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
