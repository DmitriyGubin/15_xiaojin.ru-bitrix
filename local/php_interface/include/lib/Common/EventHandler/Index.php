<?php

namespace Common\EventHandler;

use Bitrix\Main\Loader;
use CIBlockSection;

class Index
{
    const CATALOG_IBLOCK_ID = 10;
    const CATALOG_SECTION_ID = 634;

    public static function BeforeIndex($arFields)
    {
        if ($arFields['MODULE_ID'] == 'iblock') {
            if ($arFields['PARAM2'] == static::CATALOG_IBLOCK_ID) {
                static::checkCatalog($arFields);
            }
        }

        return $arFields;
    }

    public static function checkCatalog(&$arFields): void
    {
        Loader::includeModule('iblock');

        static $sectionIds;

        if ($sectionIds === null) {
            $rsParentSection = CIBlockSection::GetByID(static::CATALOG_SECTION_ID);
            if ($arParentSection = $rsParentSection->GetNext()) {
                $arFilter = array('IBLOCK_ID' => $arParentSection['IBLOCK_ID'], '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'], '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'], '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']); // выберет потомков без учета активности
                $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter);
                while ($arSect = $rsSect->GetNext()) {
                    $sectionIds[] = $arSect['ID'];
                }
            }
        }

        if (mb_substr($arFields['ITEM_ID'], 0, 1) === 'S') {
            $sectionId = mb_substr($arFields['ITEM_ID'], 1);
        } else {
            $element = \CIBlockElement::GetByID($arFields['ITEM_ID'])->Fetch();
            $sectionId = $element['IBLOCK_SECTION_ID'];
        }

        if (!in_array($sectionId, $sectionIds)) {
            $arFields['BODY'] = '';
            $arFields['TITLE'] = '';
        }
    }
}
