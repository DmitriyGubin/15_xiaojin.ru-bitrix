<div class="standard wrap">
<form class="standard-form all-forms" id="top-form">
	<img class="form-img" src="<?= SITE_TEMPLATE_PATH ?>/img/basket.png">

	<div class="form-box form">
		<h3 class="form-title">Оставить запрос</h3>
		<p class="form-sub-title">Улучшите качество приготовления и повысьте эффективность работы с нашим оборудованием</p>

		<div class="input-line">
			<div>
				<input class="all-input" name="fio" id="client-name-top" type="text" placeholder="ФИО">
				<input class="all-input" name="email" id="client-email-top" type="text" placeholder="Email">
				<input class="all-input phone" name="phone" id="client-phone-top" type="text" placeholder="Телефон">

				<input type="hidden" name="delimiter" value="Форма на странице">
			</div>

			<a id="send-order-butt-top" class="univ-button">Оставить запрос</a>
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