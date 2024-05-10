<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");

// $APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
// 	"LEVEL"	=>	"3",
// 	"COL_NUM"	=>	"2",
// 	"SHOW_DESCRIPTION"	=>	"Y",
// 	"SET_TITLE"	=>	"Y",
// 	"CACHE_TIME"	=>	"36000000"
// 	)
// );

?>

<section class="no_found wrap">
	<div class="text_box">
		<h1 class="title">CТРАНИЦА НЕ НАЙДЕНА</h1>
		<a class="main_ref" href="/">Перейти на главную страницу</a>
	</div>
</section>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>