<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('iblock');

$order_by = "PROPERTY_NALICHIE";
$order_direction = "ASC";

if ($_REQUEST["order"]==1) {
    $order_by = "PROPERTY_PRICE";
    $order_direction = "ASC";
} elseif ($_REQUEST["order"]==2) {
    $order_by = "PROPERTY_PRICE";
    $order_direction = "DESC";
} elseif ($_REQUEST["order"]==3) {
    $order_by = "PROPERTY_POPULAR";
    $order_direction = "DESC";
} elseif ($_REQUEST["order"]==4) {
    $order_by = "PROPERTY_NEW";
    $order_direction = "DESC";
} elseif ($_REQUEST["order"]==5) {
    $order_by = "PROPERTY_NALICHIE";
    $order_direction = "ASC";
}
?>

<div class="main_block">
    <div class="ctlg_block1">
        <div class="container">
            <?php if ($APPLICATION->GetCurDir() === '/catalog/'): ?>
                <h1 class="heading" style="margin-top:40px;">КАТАЛОГ ОБОРУДОВАНИЯ <span>XIAOJIN</span><?= \Common\EventHandler\Epilog::getPagePostfix() ?></h1>
            <?php else: ?>
                <h1 class="heading" style="margin-top:40px;"><?php $APPLICATION->ShowTitle(false); ?><?= \Common\EventHandler\Epilog::getPagePostfix() ?></h1>
            <?php endif; ?>
            <div class="catalog_nav">
                <div class="catalog_nav_flex">
<?
$cnt = 0;
$arFilter = Array('IBLOCK_ID'=>10, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>634);
$db_list = CIBlockSection::GetList(Array(), $arFilter, true);
while($ar_result = $db_list->GetNext()) {
    $cnt += $ar_result['ELEMENT_CNT'];
}
if (!$_REQUEST["sec"]) $_REQUEST["sec"] = "myasopererabatyvayushchee-oborudovanie";

$currentSection = CIblockSection::GetList([], ['ACTIVE' => 'Y', 'CODE' => $_REQUEST["sec"], 'IBLOCK_ID' => 10], false, ['ID', 'IBLOCK_ID', 'NAME', 'CODE', 'DESCRIPTION', 'UF_DESCRIPTION'])->Fetch();
?>

                    <a href="/catalog/" <? if (!$_REQUEST["sec"]) {?>class="catalog_nav_flex_act"<?}?>>Все виды <span><?=$cnt?></span></a>
                    <?
                    $arFilter = Array('IBLOCK_ID'=>10, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y', 'DEPTH_LEVEL'=>2, 'SECTION_ID'=>634);
                    $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true);
                    $cur_nam_sec = '';
                    $cur_id_sec = '';
                    $cur_cnt = '';
                    while($ar_result = $db_list->GetNext()) {
                        ?>
                        <a href="/catalog/<?=$ar_result['CODE']?>/" <? if ($_REQUEST["sec"]==$ar_result['CODE']) {?>class="catalog_nav_flex_act"<?}?>><?=$ar_result['NAME']?> <span><?=$ar_result['ELEMENT_CNT']?></span></a>
                        <?php 
                            if($_REQUEST["sec"]==$ar_result['CODE'])
                            {
                                $cur_nam_sec = $ar_result['NAME'];
                                $cur_id_sec = $ar_result['ID'];
                                $cur_cnt = $ar_result['ELEMENT_CNT'];
                            }
                        ?>
                    <?}?>
                </div>
            </div>
        </div>

        <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => $order_by,
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => $order_direction,
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "CATALOG",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "4",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "arrows",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "16",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => $_REQUEST["sec"],
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "main",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"MESS_BTN_LAZY_LOAD" => "Показать ещё"
	),
	false
);?>
    </div>
    <div class="ctlg_block2">
        <div class="container">
            <div class="standard">
                <form class="standard-form all-forms" id="lower-form">
                    <img class="form-img" src="/img/basket.svg">

                    <div class="form-box form">
                        <h3 class="form-title">Оставьте заявку</h3>
                        <p class="form-sub-title">Улучшите качество приготовления и повысьте эффективность работы с нашим оборудованием</p>
                        <div class="input-line">
                            <div>
                                <input class="all-input" name="fio" type="text" placeholder="ФИО" required="required" value="" id="form_fio">
                                <input class="all-input" name="email" type="text" placeholder="Email" required="required" value="" id="form_email">
                                <input class="all-input phone" name="phone" type="text" placeholder="Телефон" required="required" value="" id="form_phone">
                                <input type="hidden" name="delimiter" value="Форма на странице">
                            </div>
                            <a id="send-order-butt-lower" href="javascript:void(0)" class="univ-button">Оставить заявку</a>
                        </div>
                    </div>

                    <div class="form-box succes hide">
                        <h3 class="form-title">Спасибо за заявку</h3>
                        <p class="form-sub-title sort">
                            В ближайшее время с вами свяжется представитель нашей компании,<br> мы обсудим все необходимые детали и
                            позовём на тестирование!
                        </p>

                        <div class="button-line">
                            <a class="univ-button repeat-form">Повторить</a>
                        </div>
                    </div>

                    <p class="politic">
                        Нажимая на кнопку «Оставить запрос» вы даёте согласие на <a target="_blank"
                                                                                    href="/privacy_policy/">обработку персональных данных</a>. Все данные надежно
                        защищены и не передаются третьим лицам
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class="catalog-text-block ">
    <div class="container ft">
        <?= $currentSection['UF_DESCRIPTION'] ?>
    </div>
    </div>

    <div class="ctlg_block3">
        <div class="container">
            <div class="boxes">
                <div class="box-item padd-fill">
                    <div class="img-line">
                        <img src="/img/boxe_img1.svg">
                    </div>

                    <div class="text-box">
                        Бесплатное тестирование оборудования, обучение и техническая поддержка </div>
                </div>

                <div class="box-item middle">
                    <div class="padd-fill top">
                        <div class="img-line">
                            <img src="/img/boxe_img2.svg">
                        </div>

                        <div class="text-box">
                            Еженедельные поставки из Китая </div>
                    </div>

                    <div class="padd-fill">
                        <div class="img-line">
                            <img src="/img/boxe_img3.svg">
                        </div>

                        <div class="text-box">
                            Широкая дилерская сеть </div>
                    </div>
                </div>

                <div class="box-item padd-fill">
                    <div class="img-line">
                        <img src="/img/boxe_img4.svg">
                    </div>

                    <div class="text-box">
                        Все оборудование отвечает современным Европейским стандартам качества </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(($APPLICATION->GetCurPage()) != '/catalog/'): ?>

<?php 
    if($cur_id_sec != '')
    {
            $arFilter = Array(
                "IBLOCK_ID"=>10,
                "SECTION_ID"=>$cur_id_sec
            );

            $sub_sec = CIBlockSection::GetCount($arFilter);
            if($sub_sec != 0)
            {
                $sec_id = Return_All_Sections(
                    Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y", 'SECTION_ID'=>$cur_id_sec),
                    Array('ID')
                );

               $id = [];
               foreach ($sec_id as $sec_item) 
               {
                   $id[] = $sec_item['ID'];
               }

               $products = Return_All_Fields_Props(
                    Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID'=>$id),
                    Array()
                );
            }
            else
            {
                $products = Return_All_Fields_Props(
                    Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID'=>$cur_id_sec),
                    Array()
                );
            }

            $price_mas = [];
            foreach ($products as $prod_item) 
            {
                $price_mas[] = $prod_item['props']['PRICE']['VALUE'];
            }

            $min_price = min($price_mas);
            $max_price = max($price_mas);
    }
?>

<script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "Product", 
      "name": "<?= $cur_nam_sec; ?>",
      "image": "https://xiaojin.ru/local/templates/xiaojin/img/footer-logo.svg",
      "description": "<?= $cur_nam_sec; ?>",
      "brand": {
        "@type": "Brand",
        "name": "Xiaojin"
      },
      "offers": {
        "@type": "AggregateOffer",
        "url": "<?= 'https://xiaojin.ru'.($APPLICATION->GetCurPage()); ?>",
        "priceCurrency": "RUB",
        "lowPrice": "<?= round($min_price); ?>",
        "highPrice": "<?= round($max_price); ?>",
        "offerCount": "<?= $cur_cnt; ?>"
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

<?php endif; ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>