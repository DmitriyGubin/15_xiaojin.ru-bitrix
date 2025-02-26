<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");

?>

<style type="text/css">
	body > div.main_wrappper > div > section > div.search-page,
	.show_select
	{
		display: none !important;
	}
</style>

<section class="top_section">

<h2 class="title wrap">Результаты поиска</h2>

<?$APPLICATION->IncludeComponent("bitrix:catalog.search", "search_pagee", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_COMPARE" => "N",	// Выводить кнопку сравнения
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"IBLOCK_ID" => "10",	// Инфоблок
		"IBLOCK_TYPE" => "CATALOG",	// Тип инфоблока
		"LINE_ELEMENT_COUNT" => "4",	// Количество элементов выводимых в одной строке таблицы
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "arrows",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Товары",	// Название категорий
		"PAGE_ELEMENT_COUNT" => "12",	// Количество элементов на странице
		"PRICE_CODE" => "",	// Тип цены
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPERTIES" => "",	// Характеристики товара
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
		"PROPERTY_CODE" => array(	// Свойства
			0 => "OBEM_CHASHI_L",
			1 => "PRICE",
		),
		"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
		"USE_SEARCH_RESULT_ORDER" => "N",	// Использовать сортировку результатов по релевантности
		"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
	),
	false
);?>

</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>