<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Гарантия и возврат");
$APPLICATION->SetPageProperty("description", "Гарантия и возврат - XIAOJIN.");
$APPLICATION->SetPageProperty("title", "Гарантия и возврат - XIAOJIN");

$inserts = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>16, "ACTIVE"=>"Y"),
	Array()
)[0]['props'];

//debug($inserts);

?>

<link href="css/styles.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<section class="garanty wrap">
	<h1 class="title">ГАРАНТИЯ И ВОЗВРАТ</h1>
	<p class="sub_title">
		<?= $inserts['SUB_TITLE']['~VALUE']['TEXT']; ?>
	</p>

	<div class="adv_line">
		<div class="adv_item butt">
			<div>
				<div class="adv_title">ПОСЛЕ ИСТЕЧЕНИЯ ГАРАНТИИ</div>
				<div class="adv_text">
					<?= $inserts['AFTER_GARANTEE']['~VALUE']['TEXT']; ?>
				</div>
			</div>
			<a class="adv_button">Получить консультацию</a>
		</div>

		<div class="adv_item butt">
			<div>
				<div class="adv_title">СВОЙ СЕРВИСНЫЙ ЦЕНТР</div>
				<div class="adv_text">
					<?= $inserts['SERVICE_CENTER']['~VALUE']['TEXT']; ?>
				</div>
			</div>
			<a class="adv_button">Оставить заявку на сервис</a>
		</div>
	</div>

	<div class="adv_line">
		<div class="adv_item">
			<div class="adv_title">ОФОРМЛЕНИЕ ОБРАЩЕНИЯ В СЕРВИСНЫЙ ЦЕНТР</div>
			<div class="adv_text">
				<?= $inserts['SERVICE_CENTER_ORDER']['~VALUE']['TEXT']; ?>
			</div>
		</div>

		<div class="adv_item">
			<div class="adv_title">БЕСПЛАТНАЯ КОНСУЛЬТАЦИЯ</div>
			<div class="adv_text">
				<?= $inserts['FREE_CONSULT']['~VALUE']['TEXT']; ?>
			</div>
		</div>
	</div>
<?if(!empty($inserts['YOUTUBE_REF']['VALUE'])){?>
	<div class="video_box">
			<iframe class="video" src="<?= $inserts['YOUTUBE_REF']['VALUE']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="">
			</iframe>
	</div>
<?}?>
	</section>

	<?php 
		$phone_service = $inserts['HOT_LINE_PHONE']['VALUE'];
		$phone_manager = $inserts['MANAGER_PHONE']['VALUE'];
		$mail = $inserts['QUESTS_MAIL']['VALUE'];
	?>

	<section class="quest_box wrap">
	<?php foreach ($inserts['QUESTS']['~VALUE'] as $item): ?>
	<?php $arr = explode('%%%', $item['TEXT']); ?>
		<div class="tab_item">
			<svg class="arrow" width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 1L10 9.99983L18.9998 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>

			<div class="text_box">
				<div class="quest"><?= $arr[0]; ?></div>

				<div class="answer" style="display: none;">
					<div class="var_text">
						<?= $arr[1]; ?>
					</div>

					<div class="const_text">
						<div class="text_line">
							В случае возникновения экстренной необходимости вы можете обратиться по телефонам:
						</div>

						<div class="cont_box">
							<div class="phone_item">
								<div class="label">Бесплатная горячая линия сервиса</div>
								<a class="phone" href="tel:<?= $phone_service ?>">
									<?= $phone_service ?>
								</a>
							</div>

							<div class="phone_item">
								<div class="label">Номер менеджера по запчастям</div>
								<a class="phone" href="tel:<?= $phone_manager; ?>">
									<?= $phone_manager; ?>
								</a>
							</div>
						</div>

						<div class="text_line">
							Если вы не получите ответ на свое обращение в течение 24 часов, просьба сообщить о данном факте на почту <a href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</section>
	
	<?php 
		require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/form.php");
	?>
	
	<script type="text/javascript" src="js/script.js"></script>

	<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>