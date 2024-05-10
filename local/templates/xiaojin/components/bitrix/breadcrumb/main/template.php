<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @global $APPLICATION
 */

global $APPLICATION;

$uniqueLinks = [];
foreach ($arResult as $key => $item) {
    if (!in_array($item['LINK'], $uniqueLinks)) {
        $uniqueLinks[] = $item['LINK'];
    } else {
        unset($arResult[$key]);
    }
}

$arResult = array_values($arResult);

if (empty($arResult) || count($arResult) == 1)
    return "";

$strReturn = '<div class="site-breadcrumbs">';
$strReturn .= '<ul itemscope itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
$j = 0;

for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] === '/catalog/myasopererabatyvayushchee-oborudovanie/') {
        continue;
    }

    $j++;

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="' . $arResult[$index]["LINK"] . '" itemprop="item" title="' . $title . '">
            <span itemprop="name">' . $title . '</span>
        </a>
        <span class="dot">/</span>
        <meta itemprop="position" content="' . $j . '">
        </li>
        ';
    } else {
        $strReturn .= '
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="item" title="' . $title . '">
            <span itemprop="name">' . $title . '</span>
        </span>
        <meta itemprop="position" content="' . $j . '">
        </li>
        ';
    }

}
$strReturn .= '</ul>';
$strReturn .= '</div>';

return $strReturn;
