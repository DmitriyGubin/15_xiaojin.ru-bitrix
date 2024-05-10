<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?php if ($arResult['ITEMS']): ?>
    <section class="video-gallery wrap" id="video-gallery">
        <div class="video-gallery__big-slider">
            <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                <div class="video-gallery__big-slide">
                    <a href="<?= $arItem['PROPERTIES']['VIDEO']['VALUE'] ? CFile::GetPath($arItem['PROPERTIES']['VIDEO']['VALUE']) : $arItem['PROPERTIES']['LINK']['VALUE'] ?>" class="video-gallery__link" data-fancybox="video-gallery">
                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
                        <span class="video-gallery__heading"><?= $arItem['PROPERTIES']['TITLE']['VALUE'] ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="video-gallery__thumbs-slider">
            <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                <div class="video-gallery__thumb-slide">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

