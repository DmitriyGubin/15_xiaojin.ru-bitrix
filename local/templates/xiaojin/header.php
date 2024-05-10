<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
    use Bitrix\Main\Page\Asset;

    $inserts = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
		Array()
	);
?>
<!DOCTYPE html> 
<html>
<head>
<?php 

$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
$IfModifiedSince = false;

if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
   $IfModifiedSince = strtotime(substr ($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
   $IfModifiedSince = strtotime(substr ($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));

if ($IfModifiedSince && $IfModifiedSince -->= $LastModified_unix) {
   header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
   exit;
}

header('Last-Modified: '. $LastModified);

$isIndex = $APPLICATION->GetCurPage(true) === SITE_DIR . 'index.php';
?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(96183530, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/96183530" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T3T8Z2GR');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T3T8Z2GR');</script>
<!-- End Google Tag Manager -->
	<?php $APPLICATION->ShowHead() ?>
	<title><?php $APPLICATION->ShowTitle() ?></title>
	<?php
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/styles.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/styles-ik.css');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
        Asset::getInstance()->addCss('/fonts/font.css');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/jquery-3.6.0.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/maskedinput.js');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/fancybox/jquery.fancybox.min.css');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/fancybox/jquery.fancybox.min.js');

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/slick/slick.min.js');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick-theme.css');

        Asset::getInstance()->addCss('/css/font-awesome.css');
        Asset::getInstance()->addCss('/css/select2.min.css');
        Asset::getInstance()->addCss('/css/reset.css');
        Asset::getInstance()->addCss('/css/style.css');
        Asset::getInstance()->addCss('/css/media.css');

        Asset::getInstance()->addJs('/js/select2.full.min.js');
        Asset::getInstance()->addJs('/js/jquery.validate.min.js');
        Asset::getInstance()->addJs('/js/main.js');
        ?>

      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Xiaojin",
        "alternateName": "Ксиаоджин",
        "url": "https://xiaojin.ru/",
        "logo": "https://xiaojin.ru/local/templates/xiaojin/img/logo.svg",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "8 800 500 1 495",
          "contactType": "sales",
          "areaServed": "RU",
          "availableLanguage": "Russian"
        }
      }
      </script>

    <link rel="canonical" href="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
</head>
<body>
  <div class="main_wrappper">
  <div>
	<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
	<header>
		<div class="header-wrap">
			<a href="/">
				<img class="head-logo" src="<?= SITE_TEMPLATE_PATH ?>/img/logo.svg">
			</a>
			<div class="for-mobile">
				<ul class="menu">
					<li>
						<a class="link" href="/catalog/">
							<img src="<?= SITE_TEMPLATE_PATH ?>/img/catalog_icon.svg">
							<span>КАТАЛОГ</span>
						</a>
                        <?php
                        \Bitrix\Main\Loader::includeModule('iblock');

                        $rsParentSection = CIBlockSection::GetByID(634);
                        ?>
                        <?php if ($arParentSection = $rsParentSection->GetNext()): ?>
                        <ul>
                            <?php
                            $arFilter = array('ACTIVE' => 'Y', 'IBLOCK_ID' => $arParentSection['IBLOCK_ID'], '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'], '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'], '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']);
                            $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, true);
                            ?>
                            <?php while ($arSect = $rsSect->GetNext()): ?>
                                <li>
                                    <a href="<?= $arSect['SECTION_PAGE_URL'] ?>"><?= $arSect['NAME'] ?> <span><?= $arSect['ELEMENT_CNT'] ?></span></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
					</li>

					<li><a class="link" href="/company/">КОМПАНИЯ</a></li>

					<li><a class="smoth_link" href="/delivery_payment/">ДОСТАВКА И ОПЛАТА</a></li>

					<li><a class="smoth_link" href="/guarantee/">ГАРАНТИЯ И ВОЗВРАТ</a></li>

					<li><a class="link" href="/contacts/">КОНТАКТЫ</a></li>
	     </ul>
        <div class="search_contact">
              
              <?/*$APPLICATION->IncludeComponent(
                "bitrix:search.form",
                "search_form",
                Array(
                  "PAGE" => "#SITE_DIR#search/",
                  "USE_SUGGEST" => "Y"
                )
              );*/?>

            <?$APPLICATION->IncludeComponent(
                "bitrix:search.title",
                "header",
                array(
                    "COMPONENT_TEMPLATE" => "header",
                    "NUM_CATEGORIES" => "1",
                    "TOP_COUNT" => "5",
                    "ORDER" => "rank",
                    "USE_LANGUAGE_GUESS" => "N",
                    "CHECK_DATES" => "N",
                    "SHOW_OTHERS" => "N",
                    "PAGE" => "#SITE_DIR#catalog/",
                    "SHOW_INPUT" => "Y",
                    "INPUT_ID" => "title-search-input",
                    "CONTAINER_ID" => "title-search",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "CATEGORY_0_TITLE" => "",
                    "CATEGORY_0" => array(
                        0 => "iblock_CATALOG",
                    ),
                    "CATEGORY_0_iblock_CATALOG" => array(
                        0 => "all",
                    )
                ),
                false
            ); ?>

	            <div class="contact-box">
	            	<div class="contact-item">
	            		<img src="<?= SITE_TEMPLATE_PATH ?>/img/header_phone.svg">
	            		<?php
	            			$phone = $inserts[0]['props']['PHONE']['VALUE']; 
	            		?>
	            		<a class="contact-item-text" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
	            	</div>

	            	<a data-fancybox="" data-src="#popup-quest" href="javascript:;" class="univ-button popup-quest" href="#">Задать вопрос</a>
	            </div>
        </div>
      </div>

            <div class="mobile-shade" style="display: none;"></div>

            <div class="mobile-burger" style="display: none;">
            	<div></div>
            	<div class="middle"></div>
            	<div></div>
            </div>
		</div>
	</header>

<?php
if (!$isIndex ) {
    $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "main",
        Array(
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "s1"
        )
    );
}
?>