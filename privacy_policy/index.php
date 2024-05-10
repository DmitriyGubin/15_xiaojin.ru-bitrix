<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Политика конфиденциальности");
$APPLICATION->SetPageProperty("description", "Политика конфиденциальности - XIAOJIN.");
$APPLICATION->SetPageProperty("title", "Политика конфиденциальности - XIAOJIN");

$text = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>17, "ACTIVE"=>"Y"),
	Array()
);

?>

<section class="policy top_section wrap">
	<h2 class="title">Политика конфиденциальности интернет-сайта</h2>
	<div class="text_box">
		<?= $text[0]['fields']['~DETAIL_TEXT']; ?>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>