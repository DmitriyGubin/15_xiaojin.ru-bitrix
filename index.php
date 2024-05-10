<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Мясоперерабатывающее оборудование от производителя в Москве. Выгодные цены и быстрая доставка. Сайт официального представителя бренда XIAOJIN.");
$APPLICATION->SetPageProperty("title", "XIAOJIN - Мясоперерабатывающее оборудование от производителя");

// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

?>

<?php 
$products = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y"),
	Array()
);

$head_prod = [];
foreach ($products as $item) 
{
	if($item['props']['SHOW_TOP_REF']['VALUE'] == 'YES')
	{
		$head_prod['NAME'] = $item['fields']['NAME'];
		$head_prod['ID'] = $item['fields']['ID'];
		break;
	}
}

$inserts = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
	Array()
);

$slides = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y"),
	Array()
);
?>

<div class="top_delimeter"></div>

	<section class="premium wrap">
		<h1 class="main-title">
			<?= $inserts[0]['props']['ONE_HEADER']['~VALUE']['TEXT']; ?>
		</h1>

		<div class="head-img-box">
			<img class="head-equip" src="<?=\CFile::GetPath($inserts[0]['props']['ONE_IMG']['VALUE']);?>">
			<img class="big-logo-back" src="<?= SITE_TEMPLATE_PATH ?>/img/big-logo-back.svg">

			<div class="about-head-equip">
				<a href="#">
					<svg width="18" height="28" viewBox="0 0 18 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect width="17.0769" height="27.75" rx="8.53845" fill="url(#paint0_linear_1251_5644)"/>
						<circle cx="8.5386" cy="8.53842" r="6.40384" fill="#171717"/>
						<defs>
						<linearGradient id="paint0_linear_1251_5644" x1="8.53845" y1="0" x2="8.53845" y2="27.75" gradientUnits="userSpaceOnUse">
						<stop stop-color="#82D7FF"/>
						<stop offset="1" stop-color="#8B3FFF"/>
						</linearGradient>
						</defs>
					</svg>
					<?/*<a data-id="<?= $head_prod['ID']; ?>" data-fancybox="" data-src="#popup-equip" href="javascript:;" class="equip-name-head popup-equipment">
						<?= $head_prod['NAME']; ?>
					</a>*/?>
					<a href="/catalog/kolbasnye-shpritsy-promyshlennye/vakuumnyy-shprits-gzy3600/" class="equip-name-head">
						<?= $head_prod['NAME']; ?>
					</a>
				</a>
			</div>
		</div>

		<div class="about-head-text">
			<?= $inserts[0]['props']['ONE_UNDER_IMG']['~VALUE']['TEXT']; ?>
		</div>

		
		<div class="icon-text">
			<img src="<?=\CFile::GetPath($inserts[0]['props']['ONE_ICON']['VALUE']);?>">
			<div class="text-ab">
				<?= $inserts[0]['props']['ONE_ICON_TEXT']['~VALUE']['TEXT']; ?>
			</div>
		</div>
	</section>
 
	<section class="standard wrap" id="company-scroll">
		<p class="grad-text"><?= $inserts[0]['props']['TWO_SUBTITLE']['~VALUE']['TEXT']; ?></p>
		<h2 class="title">
			<?= $inserts[0]['props']['TWO_HEADER']['~VALUE']['TEXT']; ?>
		</h2>

		<div class="text-img-box">
			<div>
				<div class="text-box">
					<?= $inserts[0]['props']['TWO_TEXT']['~VALUE']['TEXT']; ?>
				</div>
				
				<a class="univ-button smoth_link" href="#top-form">Оставить заявку</a>
			</div>

			<img class="equip" src="<?=\CFile::GetPath($inserts[0]['props']['TWO_IMG']['VALUE']);?>">
		</div>

		<form class="standard-form all-forms" id="top-form">
			<img class="form-img" src="<?= SITE_TEMPLATE_PATH ?>/img/basket.png">

			<div class="form-box form">
				<h3 class="form-title">Оставьте заявку</h3>
				<p class="form-sub-title">Улучшите качество приготовления и повысьте эффективность работы с нашим оборудованием</p>

				<div class="input-line">
					<div>
						<input class="all-input" name="fio" id="client-name-top" type="text" placeholder="ФИО">
						<input class="all-input" name="email" id="client-email-top" type="text" placeholder="Email">
						<input class="all-input phone" name="phone" id="client-phone-top" type="text" placeholder="Телефон">

						<input type="hidden" name="delimiter" value="Форма на странице">
					</div>
					
					<a id="send-order-butt-top" class="univ-button">Оставить заявку</a>
				</div>
			</div>

			<div class="form-box succes hide">
				<h3 class="form-title">Спасибо за заявку</h3>
				<p class="form-sub-title sort">
					В ближайшее время с вами свяжется представитель нашей компании,<br> мы обсудим все необходимые детали и позовём на тестирование!
				</p>

				<div class="button-line">
					<a class="univ-button repeat-form">Повторить</a>
				</div>
			</div>

			<p class="politic">
				Нажимая на кнопку «Оставить запрос» вы даёте согласие на <a target="_blank" href="/privacy_policy/">обработку персональных данных</a>. Все данные надежно защищены и не передаются третьим лицам 
			</p>
		</form>
	</section> 

    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "video",
        array(
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "IBLOCK_ID" => 19,
            "IBLOCK_TYPE" => "content",
            "NEWS_COUNT" => "999",
            "FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "DETAIL_PICTURE", "PREVIEW_PICTURE"),
            "PROPERTY_CODE" => array("SORT_MAIN"),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_TITLE" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ID",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "FILTER_NAME" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
        )
    );
    ?>

	<section class="high wrap" id="high-scroll">
		<p class="grad-text"><?= $inserts[0]['props']['THREE_SUBTITLE']['~VALUE']['TEXT'] ?></p>
		<h2 class="title">
			<?= $inserts[0]['props']['THREE_HEADER']['~VALUE']['TEXT'] ?>
		</h2>

		<p class="shift-text">
			<?= $inserts[0]['props']['THREE_TEXT']['~VALUE']['TEXT']; ?>
		</p>

		<div class="high-slider">
		<?php foreach ($slides as $slide): ?>
			<div class="high-slide">
				<div class="slide-wraper">
					<div class="img-box-slider">
						<img src="<?= \CFile::GetPath($slide['fields']['PREVIEW_PICTURE']); ?>">
					</div>

					<div class="about-slide-box">
						<div class="about-slide-text">
							<?= $slide['fields']['~PREVIEW_TEXT']; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

		<p class="shift-text second">
			<?= $inserts[0]['props']['THREE_UNDER_SLIDER_TEXT']['~VALUE']['TEXT']; ?>
		</p>

		<div class="advantages">
		<?php foreach ($inserts[0]['props']['THREE_ICON_TEXT']['VALUE'] as $key => $value): ?>
			<div class="adv-item">
				<img src="<?=\CFile::GetPath($value);?>">
				<div class="adv-textt">
					<?= $inserts[0]['props']['THREE_ICON_TEXT']['DESCRIPTION'][$key]; ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</section> 

	<section class="ready wrap" id="ready-scroll">
		<p class="grad-text"><?= $inserts[0]['props']['FOUR_SUBTITLE']['~VALUE']['TEXT'] ?></p>
		<h2 class="title">
			<?= $inserts[0]['props']['FOUR_HEADER']['~VALUE']['TEXT']; ?>
		</h2>

		<div class="ready-text">
			<?= $inserts[0]['props']['FOUR_TEXT']['~VALUE']['TEXT']; ?>
		</div>

		<div class="equip-slider">
		<?php foreach ($products as $prod_item): ?>
			<div class="equip-slide">
				<div class="cart-box">
					<div class="img-box">
						<img src="<?=\CFile::GetPath($prod_item['fields']['PREVIEW_PICTURE']);?>">
					</div>

					<div class="about-box">
						<div class="about-text">
							<h3 class="equip-name">
								<?= $prod_item['fields']['NAME']; ?>
							</h3>
							<p class="equip-about">
								<?= $prod_item['props']['SHORT_DESCR']['VALUE']; ?>
							</p>
						</div>

						<a data-name="<?= $prod_item['fields']['NAME']; ?>" data-id="<?= $prod_item['fields']['ID']; ?>" data-fancybox="" data-src="#popup-equip" href="javascript:;" class="univ-button popup-equipment" href="#">Детали</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="standard">
			<form class="standard-form all-forms" id="lower-formm">
				<img class="form-img" src="<?= SITE_TEMPLATE_PATH ?>/img/basket.png">

				<div class="form-box form">
					<h3 class="form-title">Оставьте заявку</h3>
					<p class="form-sub-title">Улучшите качество приготовления и повысьте эффективность работы с нашим оборудованием</p>

					<div class="input-line">
						<div>
							<input class="all-input" name="fio" type="text" placeholder="ФИО">
							<input class="all-input" name="email" type="text" placeholder="Email">
							<input class="all-input phone" name="phone" type="text" placeholder="Телефон">
							<input type="hidden" name="delimiter" value="Форма на странице">
						</div>

						<a id="send-order-butt-lowerr" class="univ-button">Оставить заявку</a>
					</div>
				</div>

				<div class="form-box succes hide">
					<h3 class="form-title">Спасибо за заявку</h3>
					<p class="form-sub-title sort">
						В ближайшее время с вами свяжется представитель нашей компании,<br> мы обсудим все необходимые детали и позовём на тестирование!
					</p>

					<div class="button-line">
						<a class="univ-button repeat-form">Повторить</a>
					</div>
				</div>

				<p class="politic">
	               Нажимая на кнопку «Оставить запрос» вы даёте согласие на <a target="_blank" href="/privacy_policy/">обработку персональных данных</a>. Все данные надежно защищены и не передаются третьим лицам 
	            </p>
			</form>
		</div>
	</section>
	
	<section class="certificates wrap" id="certificates-scroll">
		<p class="grad-text"><?= $inserts[0]['props']['FIVE_SUBTITLE']['~VALUE']['TEXT'] ?></p>
		<h2 class="title">
			<?= $inserts[0]['props']['FIVE_HEADER']['~VALUE']['TEXT']; ?>
		</h2>

		<?/*<p class="shift-text">
			<?= $inserts[0]['props']['FIVE_TEXT']['~VALUE']['TEXT']; ?>
		</p>*/?>

		<div class="document-line documents_slider">
		<?php foreach ($inserts[0]['props']['FIVE_DOC']['VALUE'] as $value): ?>
		<?php $img_src = CFile::GetPath($value); ?>
			<div class="doc-box">
				<a href="<?= $img_src; ?>" data-fancybox="gallery">
					<img src="<?= $img_src; ?>">
				</a>
			</div>
		<?php endforeach; ?>
			<div class="doc-box">
				<a href="<?= $img_src; ?>" data-fancybox="gallery">
					<img src="<?= $img_src; ?>">
				</a>
			</div>
		</div>

		<div class="boxes">
			<div class="box-item padd-fill">
				<div class="img-line">
					<img src="<?= \CFile::GetPath($inserts[0]['props']['LEFT_BOX']['VALUE']); ?>">
				</div>

				<div class="text-box">
					<?= $inserts[0]['props']['LEFT_BOX']['~DESCRIPTION']; ?>
				</div>
			</div>

			<div class="box-item middle">
				<div class="padd-fill top">
					<div class="img-line">
						<img src="<?= \CFile::GetPath($inserts[0]['props']['MIDDLE_BOX_TOP']['VALUE']); ?>">
					</div>

					<div class="text-box">
						<?= $inserts[0]['props']['MIDDLE_BOX_TOP']['~DESCRIPTION']; ?>
					</div>
				</div>

				<div class="padd-fill">
					<div class="img-line">
						<img src="<?= \CFile::GetPath($inserts[0]['props']['MIDDLE_BOX_BOTTOM']['VALUE']); ?>">
					</div>

					<div class="text-box">
						<?= $inserts[0]['props']['MIDDLE_BOX_BOTTOM']['~DESCRIPTION']; ?>
					</div>
				</div>
			</div>

			<div class="box-item padd-fill">
				<div class="img-line">
					<img src="<?= \CFile::GetPath($inserts[0]['props']['RIGHT_BOX']['VALUE']); ?>">
				</div>

				<div class="text-box">
					<?= $inserts[0]['props']['RIGHT_BOX']['~DESCRIPTION']; ?>
				</div>
			</div>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>