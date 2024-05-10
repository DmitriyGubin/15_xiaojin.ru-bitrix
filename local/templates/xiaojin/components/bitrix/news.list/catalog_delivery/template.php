<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="container product-delivery-ik">
    <div class="product-delivery-ik__items">
        <?php foreach ($arResult['ITEMS'] as $arItem): ?>
            <div class="product-delivery-ik__item <?= $arItem['CODE'] ?>">
                <div class="product-delivery-ik__heading">
                    <?= $arItem['~NAME'] ?>
                </div>
                <?php if ($arItem['PROPERTIES']['LINK']['VALUE']): ?>
                    <a href="<?= $arItem['PROPERTIES']['LINK']['VALUE'] ?>" class="product-delivery-ik__link">
                        <span><?= $arItem['PROPERTIES']['LINK_TEXT']['VALUE'] ?></span>
                        <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L8.5 8.5L1 16" stroke="#8B44FF" stroke-width="1.5"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
