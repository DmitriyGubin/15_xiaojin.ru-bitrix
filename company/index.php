<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Компания");
$APPLICATION->SetPageProperty("description", "Компания - XIAOJIN.");
$APPLICATION->SetPageProperty("title", "Компания - XIAOJIN");

$inserts = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>11, "ACTIVE"=>"Y"),
	Array()
)[0]['props'];

$sertific = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
	Array()
)[0]['props']['FIVE_DOC'];

//debug($sertific);

?>

<section class="main_info wrap">
	<div class="img_text">
		<div class="img_box">
			<img class="big_logo" src="img/big_logo.png" />
		</div>
		<div class="about_text">
			<div class="big_text">
				<?= $inserts['WHITE_TEXT']['~VALUE']['TEXT']; ?>
			</div>
			<br>
			<div class="small_text">
				<?= $inserts['GRAY_TEXT']['~VALUE']['TEXT']; ?>
			</div>
		</div>
	</div>

	<div class="advs_box">
	<?php foreach ($inserts['ADVANT_COMPANY']['VALUE'] as $key => $value): ?>
		<div class="adv_item">
			<h2 class="adv_text">
				<?= $inserts['ADVANT_COMPANY']['DESCRIPTION'][$key]; ?>
			</h2>
			<img class="adv_img" src="<?= CFile::GetPath($value); ?>">
		</div>
	<?php endforeach; ?>
	</div>

	<div class="img_text">
		<div class="img_box">
			<img class="small_logo" src="img/small_logo.png" />
		</div>
		<div class="about_text">
			<div class="big_text">
				<?= $inserts['ABOUT_MAIN_COMPANY']['~VALUE']['TEXT']; ?>
			</div>

			<a class="site_ref" href="https://hmru.ru/">
				<div class="grad-text">ПОСЕТИТЬ ОФИЦИАЛЬНЫЙ САЙТ</div>
				<svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 1L8.5 8.5L1 16" stroke="#8B44FF" stroke-width="1.5"/>
				</svg>
			</a>
		</div>
	</div>

	<img class="ofice_img" src="<?= CFile::GetPath($inserts['FACTORY_IMG']['VALUE']); ?>" />
	<div class="ofice_name">
		<?= $inserts['FACTORY_TEXT']['~VALUE']['TEXT']; ?>
	</div>
</section>

<section class="certificates company wrap">
	<h2 class="title">Сертификаты качества</h2>

	<div class="document-line documents_slider">
	<?php foreach ($sertific['VALUE'] as $key => $value): ?>
		<div class="doc-box">
			<a href="<?= CFile::GetPath($value); ?>" data-fancybox="gallery_company">
				<img src="<?= CFile::GetPath($value); ?>">
			</a>
		</div>
	<?php endforeach; ?>

		<div class="doc-box">
			<a href="<?= CFile::GetPath($value); ?>" data-fancybox="gallery_company">
				<img src="<?= CFile::GetPath($value); ?>">
			</a>
		</div>
	</div>
</section>

<?php 
	require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/form.php");
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>