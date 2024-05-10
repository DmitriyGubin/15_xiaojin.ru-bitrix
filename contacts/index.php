<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("description", "Контакты - XIAOJIN.");
$APPLICATION->SetPageProperty("title", "Контакты - XIAOJIN");

$inserts = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>12, "ACTIVE"=>"Y"),
	Array()
)[0]['props'];

//debug($inserts);

$main_mail = $inserts['MAIN_MAIL']['VALUE'];
$sverka_mail = $inserts['SVERKA']['VALUE'];
$phone = $inserts['HOT_LINE']['VALUE'];

?>

<div style="display: none;">
	<div id="off_lat"><?= $inserts['LAT']['VALUE']; ?></div>
	<div id="off_long"><?= $inserts['LONG']['VALUE']; ?></div>
	<div id="off_addr"><?= $inserts['ADDRESS']['VALUE']; ?></div>
</div>

<section class="contacts wrap">
	<h1 class="title">Контакты</h1>

	<div class="cont_text">
		<div class="left_box">
			<div class="mail_line">
				<div class="cont_item main_mail">
					<p class="cont_label">Электронная почта</p>
					<a href="mailto:<?= $main_mail; ?>" class="cont_ref"><?= $main_mail; ?></a>
				</div>

				<div class="cont_item">
					<p class="cont_label sverka">Запрос акторов сверки</p>
					<a href="mailto:<?= $sverka_mail; ?>" class="cont_ref sverka"><?= $sverka_mail; ?></a>
				</div>
			</div>
			<div class="mail_line">
				<div class="cont_item main_phone">
					<p class="cont_label">Бесплатная горячая линия</p>
					<a href="tel:<?= $phone; ?>" class="cont_ref"><?= $phone; ?></a>
				</div>
				<div class="cont_item">
					<p class="cont_label">Время работы</p>
					<span class="cont_ref work-mode"><?= $inserts['WORKTIME']['~VALUE']; ?></span>
				</div>
			</div>

			<div class="cont_item">
				<p class="cont_label">Адрес компании</p>
				<div class="cont_ref"><?= $inserts['ADDRESS']['VALUE']; ?></div>
			</div>
		</div>

		<div class="right_box">
			<a href="#" target="_blank" class="doc_reff">
				<img class="doc_img" src="img/doc.png">
			</a>

			<div class="rekv">
				<span class="gray">Индивидуальный предприниматель</span><br>
				<span class="gray"><?= $inserts['BUSINESSMAN']['VALUE']; ?></span><br>
				<span class="white">ИНН:</span>
				<span class="gray"><?= $inserts['INN']['VALUE']; ?></span><br>
				<span class="white">ОГРНИП:</span>
				<span class="gray"><?= $inserts['OGRNIP']['VALUE']; ?></span><br>
				<br>
				<br>
				<span class="white">БАНКОВСКИЕ РЕКВИЗИТЫ:</span><br>
				<span class="white">Расчетный счет:</span>
				<span class="gray"><?= $inserts['CHECKING_ACCOUNT']['VALUE']; ?></span><br>

				<span class="white">Название банка:</span>
				<span class="gray"><?= $inserts['BANK']['VALUE']; ?></span><br>

				<span class="white">БИК:</span>
				<span class="gray"><?= $inserts['BIK']['VALUE']; ?></span><br>

				<span class="white">КС:</span>
				<span class="gray"><?= $inserts['KS']['VALUE']; ?></span>
			</div>
		</div>
	</div>

	<div id="map_box"></div>

	<p class="citys_title">Филиалы компании Hualian Machinery Russia</p>

	<div class="citys_box">
	<?php foreach ($inserts['CITIES']['VALUE'] as $key => $value): ?>
		<div class="city_item"><?= $value; ?></div>
	<?php endforeach; ?>
	</div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU" type="text/javascript"></script>

<script type="text/javascript" src="main.js"></script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>