<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');

if ($_REQUEST["form_fio"] AND $_REQUEST["form_email"] AND $_REQUEST["form_phone"] ) {

    $arEventFields = array(
        "NAME"          => $_REQUEST["form_fio"],
        "EMAIL"         => $_REQUEST["form_email"],
        "PHONE"         => $_REQUEST["form_phone"],
    );
    CEvent::Send("FORM_SEND", 's1', $arEventFields);
}
?>