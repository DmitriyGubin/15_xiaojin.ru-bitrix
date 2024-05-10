<?php

namespace Common\EventHandler;

class Epilog
{
    public static function OnEpilog()
    {
        self::addPageNumberOnSeoTags();
    }

    public static function getPagePostfix(): string
    {
        if ($_GET['PAGEN_1'] > 0) {
            return ' - Страница ' . $_GET['PAGEN_1'];
        }

        return '';
    }

    /**
     * Метод добавляет нумерацию страниц к Title и Description
     */
    private static function addPageNumberOnSeoTags(): void
    {
        if (!defined('ADMIN_SECTION') && defined('ADMIN_SECTION') !== true) {
            global $APPLICATION;

            $iPageNumber = 0;
            if ($_GET['PAGEN_1'] > 0) {
                $iPageNumber = $_GET['PAGEN_1'];
            }

            if ($iPageNumber > 0) {
                $sNumberPage = static::getPagePostfix();

                if (!empty($APPLICATION->GetTitle())) {
                    $sPageTitle = $APPLICATION->GetTitle();
                } else {
                    $sPageTitle = $APPLICATION->GetProperty('title');
                }

                if (empty($sPageTitle)) {
                    $sPageTitle = $APPLICATION->GetPageProperty('title');
                }

                $sTitle = $sPageTitle . $sNumberPage;

                if (!empty($APPLICATION->GetPageProperty('description'))) {
                    $sPageDescription = $APPLICATION->GetPageProperty('description');
                } else {
                    $sPageDescription = $APPLICATION->GetProperty('description');
                }

                if (empty($sPageDescription)) {
                    $sPageDescription = $sPageTitle;
                }

                $sDescription = $sPageDescription . $sNumberPage;

                $APPLICATION->SetPageProperty('title', $sTitle);
                $APPLICATION->SetPageProperty('description', $sDescription);
            }
        }
    }

}
