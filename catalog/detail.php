<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('iblock');

$is_404 = '';
/*
$arFilter = Array('IBLOCK_ID'=>10, 'GLOBAL_ACTIVE'=>'Y', 'DEPTH_LEVEL'=>1);
$db_list = CIBlockSection::GetList(Array(), $arFilter, false);
while($ar_result = $db_list->GetNext()) {
    if ($ar_result['CODE']) $arCodes[] = $ar_result['CODE'];
}
$arTmp = explode("/", $_SERVER["REQUEST_URI"]);
foreach ($arTmp as $path) {
    foreach ($arCodes as $code) {
        if ($code==$path) $is_404 = 1;
    }
}*/

if ( substr_count($_SERVER["REQUEST_URI"], 'myasopererabatyvayushchee-oborudovanie')>0) {
    CHTTP::SetStatus("404 Not Found");
    @define("ERROR_404","Y");

    if ($APPLICATION->RestartWorkarea()) {
        require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
        die();
    }

}
?>

<div class="main_block" style="margin-top: 40px;">

    <?$APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "main",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_ELEMENT_CHAIN" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BROWSER_TITLE" => "-",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_CODE" => $_REQUEST["code"],
            "ELEMENT_ID" => "",
            "FIELD_CODE" => array("", ""),
            "IBLOCK_ID" => "10",
            "IBLOCK_TYPE" => "CATALOG",
            "IBLOCK_URL" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
            "MESSAGE_404" => "",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Страница",
            "PROPERTY_CODE" => array("", ""),
            "SET_BROWSER_TITLE" => "Y",
            "SET_CANONICAL_URL" => "Y",
            "SET_LAST_MODIFIED" => "Y",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "Y",
            "SET_TITLE" => "Y",
            "SHOW_404" => "Y",
            "STRICT_SECTION_CHECK" => "N",
            "USE_PERMISSIONS" => "N",
            "USE_SHARE" => "N"
        )
    );?>

    <a name="ctlg_block2" id="ctlg_block2"></a>
    <div class="ctlg_block2" >
        <div class="container">
            <div class="standard">
                <form class="standard-form all-forms" id="top-form">
                    <img class="form-img" src="/img/basket.svg">

                    <div class="form-box form">
                        <h3 class="form-title">Оставьте заявку</h3>
                        <p class="form-sub-title">Улучшите качество приготовления и повысьте эффективность работы с нашим
                            оборудованием</p>

                        <div class="input-line">
                            <div>
                                <input class="all-input" name="fio" type="text" placeholder="ФИО" id="client-name-top">
                                <input class="all-input" name="email" type="text" placeholder="Email" id="client-email-top">
                                <input class="all-input phone" name="phone" type="text" placeholder="Телефон" id="client-phone-top">
                                <input type="hidden" name="delimiter" value="Форма на странице">
                            </div>

                            <a id="send-order-butt-top" class="univ-button">Оставить заявку</a>
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
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>