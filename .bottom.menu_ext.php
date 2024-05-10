<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if (CModule::IncludeModule("iblock")) {
    $rsParentSection = CIBlockSection::GetByID(634);
    if ($arParentSection = $rsParentSection->GetNext()) {
        $arFilter = array('ACTIVE' => 'Y', 'IBLOCK_ID' => $arParentSection['IBLOCK_ID'], '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'], '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'], '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']);
        $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter);
        while ($arSect = $rsSect->GetNext()) {
            $aMenuLinksExt[] = array(
                $arSect['NAME'],
                $arSect['SECTION_PAGE_URL'],
                array(),
                array(),
                ""
            );
        }
    }
}
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);

