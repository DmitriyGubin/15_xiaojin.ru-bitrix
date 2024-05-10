<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 
    $inserts = Return_All_Fields_Props(
        Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
        Array()
    );
?>
    </div>
	<footer class="wrap" id="contacts-scroll">
		<div class="ref-line">
			<a class="footer-logo" href="/">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/footer-logo.svg">
			</a>
			
			<img class="map" src="<?= SITE_TEMPLATE_PATH ?>/img/map.svg">

			<a class="hualian-logo" href="/">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/hualian-logo.svg">
			</a>
		</div>

        <div class="menu_butt">
            <ul class="menu">
                <li>
                    <a class="link" href="/catalog/">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/catalog_icon.svg">
                        <span>КАТАЛОГ</span>
                    </a>
                </li>

                <li><a class="link" href="/company/">КОМПАНИЯ</a></li>

                <li><a class="smoth_link" href="/delivery_payment/">ДОСТАВКА И ОПЛАТА</a></li>

                <li><a class="smoth_link" href="/guarantee/">ГАРАНТИЯ И ВОЗВРАТ</a></li>

                <li><a class="link" href="/contacts/">КОНТАКТЫ</a></li>
            </ul>

            <a data-fancybox="" data-src="#popup-quest" href="javascript:;" class="univ-button popup-quest">Задать вопрос</a>
        </div>
		<?php
		if (true) {
		?>
            <?php
            $APPLICATION->IncludeComponent("bitrix:menu", "footer", [
                "ROOT_MENU_TYPE" => "bottom",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "bottom",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => ""
            ]);
            ?>
		<div class="footer-contacts">
			<div class="footer-contacts__item">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M22 3H2C0.9 3 0 3.9 0 5V19C0 20.1 0.9 21 2 21H22C23.1 21 23.99 20.1 23.99 19L24 5C24 3.9 23.1 3 22 3ZM8 6C9.66 6 11 7.34 11 9C11 10.66 9.66 12 8 12C6.34 12 5 10.66 5 9C5 7.34 6.34 6 8 6ZM14 18H2V17C2 15 6 13.9 8 13.9C10 13.9 14 15 14 17V18ZM17.85 14H19.49L21 16L19.01 17.99C17.6852 16.9972 16.7255 15.5945 16.28 14C16.1 13.36 16 12.69 16 12C16 11.31 16.1 10.64 16.28 10C16.7228 8.40428 17.6831 7.00083 19.01 6.01L21 8L19.49 10H17.85C17.63 10.63 17.5 11.3 17.5 12C17.5 12.7 17.63 13.37 17.85 14Z" fill="white"/>
				</svg>
                <?php
                    $phone = $inserts[0]['props']['PHONE']['VALUE'];
                ?>
                <a href="tel:<?= $phone; ?>"><?= $phone; ?></a>
			</div>
			<div class="footer-contacts__item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22H17V20H12C7.66 20 4 16.34 4 12C4 7.66 7.66 4 12 4C16.34 4 20 7.66 20 12V13.43C20 14.22 19.29 15 18.5 15C17.71 15 17 14.22 17 13.43V12C17 9.24 14.76 7 12 7C9.24 7 7 9.24 7 12C7 14.76 9.24 17 12 17C13.38 17 14.64 16.44 15.54 15.53C16.19 16.42 17.31 17 18.5 17C20.47 17 22 15.4 22 13.43V12C22 6.48 17.52 2 12 2ZM12 15C10.34 15 9 13.66 9 12C9 10.34 10.34 9 12 9C13.66 9 15 10.34 15 12C15 13.66 13.66 15 12 15Z" fill="white"/>
                </svg>

                <?php
                   $mail = $inserts[0]['props']['MAIL']['VALUE'];
                ?>
                <a href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
			</div>
			<div class="footer-contacts__item">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 1V4H23V6H20V9H18V6H15V4H18V1H20ZM12 13C13.1 13 14 12.1 14 11C14 9.9 13.1 9 12 9C10.9 9 10 9.9 10 11C10 12.1 10.9 13 12 13ZM14 3.25V7H17V10H19.92C19.97 10.39 20 10.79 20 11.2C20 14.52 17.33 18.45 12 23C6.67 18.45 4 14.52 4 11.2C4 6.22 7.8 3 12 3C12.68 3 13.35 3.08 14 3.25Z" fill="white"/>
				</svg>
				<p><?= $inserts[0]['props']['ADRESS']['VALUE']; ?></p>
			</div>
			<div class="footer-contacts__item">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				  <path d="M16.24 7.75023C15.6842 7.19177 15.0235 6.74875 14.2958 6.4467C13.5681 6.14464 12.7879 5.98951 12 5.99023V11.9902L7.76 16.2302C10.1 18.5702 13.9 18.5702 16.25 16.2302C16.8069 15.6732 17.2485 15.0118 17.5494 14.2839C17.8504 13.556 18.0048 12.7758 18.0039 11.9882C18.0029 11.2005 17.8467 10.4207 17.544 9.69353C17.2413 8.96633 16.7982 8.30596 16.24 7.75023ZM12 1.99023C6.48 1.99023 2 6.47023 2 11.9902C2 17.5102 6.48 21.9902 12 21.9902C17.52 21.9902 22 17.5102 22 11.9902C22 6.47023 17.52 1.99023 12 1.99023ZM12 19.9902C7.58 19.9902 4 16.4102 4 11.9902C4 7.57023 7.58 3.99023 12 3.99023C16.42 3.99023 20 7.57023 20 11.9902C20 16.4102 16.42 19.9902 12 19.9902Z" fill="white"/>
				</svg>
				<p><?= $inserts[0]['props']['TIME']['VALUE']; ?></p>
			</div>

		</div>
		<?php
		} else {
		?>
		<div class="contacts-box">
			<div class="contact-item">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/header_phone.svg">
                <?php
                    $phone = $inserts[0]['props']['PHONE']['VALUE'];
                ?>
                <a class="cont-text" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
			</div>

			<div class="contact-item">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/map_point_foot.svg">
				<p class="cont-text"><?= $inserts[0]['props']['ADRESS']['VALUE']; ?></p>
			</div>

			<div class="contact-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22H17V20H12C7.66 20 4 16.34 4 12C4 7.66 7.66 4 12 4C16.34 4 20 7.66 20 12V13.43C20 14.22 19.29 15 18.5 15C17.71 15 17 14.22 17 13.43V12C17 9.24 14.76 7 12 7C9.24 7 7 9.24 7 12C7 14.76 9.24 17 12 17C13.38 17 14.64 16.44 15.54 15.53C16.19 16.42 17.31 17 18.5 17C20.47 17 22 15.4 22 13.43V12C22 6.48 17.52 2 12 2ZM12 15C10.34 15 9 13.66 9 12C9 10.34 10.34 9 12 9C13.66 9 15 10.34 15 12C15 13.66 13.66 15 12 15Z" fill="white"/>
                </svg>

                <?php
                   $mail = $inserts[0]['props']['MAIL']['VALUE'];
                ?>
                <a class="cont-text" href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
			</div>
		</div>
		<?php
		}
		?>
		<a target="_blank" class="politic" href="/privacy_policy/">Политика конфиденциальности</a>
	</footer>
</div><!-- main-wrapper -->

<!-- Попап товар -->
	<div style="display: none;" id="popup-equip">
        <button id="close-popup-button">Закрыть</button>
            
        <div class="popup-slider"></div>
            
	    <div class="text-box">
            <h2 class="product-name"></h2>
            <div class="product-descr"></div>
            <div class="about-product">
                Новое направление «XIAOJIN» предлагает широкий ассортимент продукции, включающий в себя вакуумные стаканы, миксеры, слайсеры, измельчители, инжекторы физиологического раствора, автоматические коптильни, тендеризаторы, чаши для резки, вакуумные количественные наполнители и все виды зажимов. Мы гарантируем высокое качество продукции и комплексную 
                систему обслуживания, что позволяет нам заслужить доверие и уважение наших клиентов.
            </div>

            <div class="props-boxes">
                <div id="one-prop-box" class="prop-box one"></div>
                <div id="two-prop-box" class="prop-box two"></div>   
            </div>

            <div class="delimeter"></div>

            <form id="equip_form" class="all-forms">
                <div class="form-box form">
                    <div class="img-inp">
                        <img class="arrow_form" src="<?= SITE_TEMPLATE_PATH ?>/img/basket.png">
                        <input name="fio" class="all-input" id="popup-name" type="text" placeholder="ФИО">
                        <input name="email" class="all-input" id="popup-mail" type="text" placeholder="Email">
                        <input name="phone" class="phone all-input" id="popup-phone" type="text" placeholder="Телефон">

                        <input type="hidden" name="delimiter" value="Попап оборудование">

                         <input id="product_name_popup" type="hidden" name="product_name">
                    </div>

                    <a class="univ-button" id="send-equip-popup-butt">
                        Оставить запрос
                    </a>
                </div>

                <div class="form-box succes hide">
                    <div class="text-img">
                        <img class="arrow_form" src="<?= SITE_TEMPLATE_PATH ?>/img/little_smile.png">

                        <div class="succes-text">
                            <span>Спасибо за заявку!</span> В ближайшее время с вами свяжется представитель нашей компании и мы обсудим все необходимые детали.
                        </div>
                    </div>

                    <a class="univ-button repeat-form">Повторить</a>
                </div>
            </form>

            <p class="politic">
               Нажимая на кнопку «Оставить запрос» вы даёте согласие на <a target="_blank" href="/privacy_policy/">обработку персональных данных</a>. Все данные надежно защищены и не передаются третьим лицам 
            </p>   
        </div>
	</div>
<!-- Попап товар -->

<!-- Попап задать вопрос -->
	<div style="display: none;" id="popup-quest">
        <button id="close-popup-button-quest">Закрыть</button>

        <form id="quest-form" class="all-forms">
            <div class="form-box form">
                <h3 class="popup-title">Задать вопрос</h3>
                <p class="popup-sub-title">
                    Если у вас есть вопросы – смело задавайте, ответим в ближайшее время
                </p>
                <div class="input-line">
                    <input class="all-input" name="fio" type="text" placeholder="ФИО">
                    <input class="all-input" name="email" type="text" placeholder="Email">
                    <input class="all-input phone" name="phone" type="text" placeholder="Телефон">
                </div>

                <textarea class="all-input" name="quest" placeholder="Ваш вопрос"></textarea>

                <input type="hidden" name="delimiter" value="Попап задать вопрос">

                <a id="send-quest-popup" class="univ-button">Отправить вопрос</a>

                <p class="last-text">
                    Нажимая на кнопку «Оставить вопрос» вы даёте согласие на <a target="_blank" class="polite" href="/privacy_policy/">обработку персональных данных.</a>
                    Все данные надежно защищены и не передаются третьим лицам
                </p>
            </div>

            <div class="form-box succes hide">
                <img class="smile_img" src="<?= SITE_TEMPLATE_PATH ?>/img/smyle.png">
                <h3 class="popup-title">Спасибо</h3>
                <p class="popup-sub-title">
                    Вопрос успешно отправлен и как мы обещали, свяжемся
                    с вами в ближайшее время!
                </p>

                <a class="univ-button repeat-form">Повторить</a>
            </div>
        </form>
	</div>
<!-- Попап задать вопрос -->

<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/js/main.js' ?>"></script>

</body>
</html> 