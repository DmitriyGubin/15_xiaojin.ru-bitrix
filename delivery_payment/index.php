<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
$APPLICATION->SetPageProperty("description", "Доставка и оплата - XIAOJIN.");
$APPLICATION->SetPageProperty("title", "Доставка и оплата - XIAOJIN");

$inserts = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>13, "ACTIVE"=>"Y"),
	Array()
)[0]['props'];

//debug($inserts);

?>

<link href="css/styles.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<section class="delivery wrap">
	<h1 class="title">ДОСТАВКА ОБОРУДОВАНИЯ</h1>
	<div class="img_text">
		<img class="left_img" src="<?= CFile::GetPath($inserts['DEL_IMG']['VALUE']); ?>">
		<div class="right_text">
			<div class="top_box">
				<?= $inserts['DEL_WHITE_TEXT']['~VALUE']['TEXT'] ?>
			</div>

			<div class="low_box">
				<?= $inserts['DEL_GRAY_TEXT']['~VALUE']['TEXT'] ?>
			</div>
		</div>
	</div>

	<div class="adv_box">
	<?php foreach ($inserts['DEL_ADV']['~VALUE'] as $value): ?>
	<?php $arr = explode('%%%', $value['TEXT']); ?>
		<div class="adv_item">
			<h2 class="adv_title"><?= $arr[0]; ?></h2>
			<div class="adv_text">
				<?= $arr[1]; ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>

	<div class="regions_box">
		<div class="box">
			<h2 class="box_title">Доставка по Москве и Московской области</h2>

			<div class="box_item">
				<div class="location">В пределах МКАД</div>
				<div class="price_line">
					<span class="price"><?= $inserts['DEL_PRICE_IN']['VALUE']; ?></span>
					<span class="about_price">В зависимости от адреса доставки и габаритов груза</span>
				</div>
			</div>

			<div class="delimeter"></div>

			<div class="box_item">
				<div class="location">За пределами МКАД</div>
				<div class="price_line">
					<span class="price"><?= $inserts['DEL_PRICE_OUT']['VALUE']; ?></span>
					<span class="about_price">В зависимости от адреса доставки и габаритов груза</span>
				</div>
			</div>
		</div>

		<div class="box">
			<h2 class="box_title">Доставка в другие регионы РФ</h2>
			<div class="about_text">
				Осуществляется по предварительному согласованию с клиентом через любую выбранную покупателем транспортную компанию или курьерскую службу, например через <span class="cursive">Транспортные компании:</span>
			</div>

			<div class="brand_box">
			<?php foreach ($inserts['DEL_TRANS']['VALUE'] as $value): ?>
				<div class="brand_item"><?= $value; ?></div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="delivery payment wrap">
	<h1 class="title">ОПЛАТА ОБОРУДОВАНИЯ</h1>
	<div class="img_text">
		<img class="left_img" src="<?= CFile::GetPath($inserts['PAY_IMG']['VALUE']); ?>">
		<div class="right_text">
			<div class="top_box">
				<?= $inserts['PAY_WHITE_TEXT']['~VALUE']['TEXT']; ?>
			</div>

			<div class="low_box">
				<?= $inserts['PAY_GRAY_TEXT']['~VALUE']['TEXT']; ?>
			</div>

			<a href="/catalog/" class="go_to_catalog">Перейти в каталог</a>
		</div>
	</div>

	<div class="button_line">
		<button id="online" class="butt_item active">Оплата онлайн и наличными
		для физических лиц</button>

		<button id="ur_pers" class="butt_item ur_pers">Оплата для юридических
		лиц и лизинг</button>

		<button id="credit" class="butt_item credit">Оплата в рассрочку
		или кредит</button>
	</div>

	<div class="about_pay">
		<img class="doc_img" src="img/doc.svg">
		<div class="tab_box">
			<div class="online tab_item">
				<div class="tab_title">Оплата онлайн для Физических лиц</div>

				<div class="tab_text">
					<?= $inserts['PAY_ONLINE_GRAY_TEXT']['~VALUE']['TEXT']; ?>
				</div>

				<div class="about_card">
					<?= $inserts['PAY_ONLINE_WHITE_TEXT']['~VALUE']['TEXT']; ?>
				</div>

				<div class="card_box">
				<?php foreach ($inserts['PAY_ONLINE_BANKS']['VALUE'] as $value): ?>
					<div class="card_item">
						<img src="<?= CFile::GetPath($value); ?>">
					</div>
				<?php endforeach; ?>
				</div>

				<a href="/guarantee/" class="polite">
					<div class="grad-text">ПОЛИТИКА ВОЗВРАТА ТОВАРА</div>
					<svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L8.5 8.5L1 16" stroke="#8B44FF" stroke-width="1.5"/>
					</svg>
				</a>
			</div>

			<?php 

				$banks_ur = Return_All_Fields_Props(
					Array("IBLOCK_ID"=>14, "ACTIVE"=>"Y"),
					Array());

				//debug($banks_ur);
			?>

			<div class="ur_pers hide tab_item">
				<div class="tab_title">Оплата для Юридических лиц</div>

				<div class="tab_text">
					<?= $inserts['PAY_UR_PERS_TEXT']['~VALUE']['TEXT']; ?>
				</div>

				<?php foreach ($banks_ur as $bank_item): ?>
					<div class="bank_item <?= $bank_item['props']['LIZING']['VALUE'] == 'YES' ? 'lizing' : null ?>">
						<div class="bank_img">
							<img src="<?= CFile::GetPath($bank_item['fields']['PREVIEW_PICTURE']); ?>">
							<div class="lizing_text hide">ПОКУПКА В ЛИЗИНГ</div>
						</div>

						<div class="bank_text">
							<?= $bank_item['fields']['~PREVIEW_TEXT']; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?php 
				$contacts = Return_All_Fields_Props(
			        Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
			        Array()
			    );

			    $phone = $contacts[0]['props']['PHONE']['VALUE'];
				$mail = $contacts[0]['props']['MAIL']['VALUE'];

				$banks_cred = Return_All_Fields_Props(
					Array("IBLOCK_ID"=>15, "ACTIVE"=>"Y"),
					Array());
			?>

			<div class="credit hide tab_item">
				<div class="tab_title">Оплата в рассрочку или кредит</div>

				<div class="tab_text">
					<?= $inserts['PAY_CREDIT_TEXT']['~VALUE']['TEXT']; ?>
				</div>

				<div class="cont_box">
					<div class="cont_item">
						<div class="label">Бесплатная горячая линия</div>
						<a class="cont-text" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
					</div>

					<div class="cont_item">
						<div class="label">Электронная почта</div>
						<a class="cont-text" href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
					</div>
				</div>

				<?php foreach ($banks_cred as $bank_item): ?>
					<div class="bank_item <?= $bank_item['props']['LIZING']['VALUE'] == 'YES' ? 'lizing' : null ?>">
						<div class="bank_img">
							<img src="<?= CFile::GetPath($bank_item['fields']['PREVIEW_PICTURE']); ?>">
							<div class="lizing_text hide">ПОКУПКА В ЛИЗИНГ</div>
						</div>

						<div class="bank_text">
							<?= $bank_item['fields']['~PREVIEW_TEXT']; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php 
	require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/form.php");
?>

<script type="text/javascript" src="js/script.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>