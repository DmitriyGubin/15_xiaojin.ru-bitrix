<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$ClientID = 'navigation_'.$arResult['NavNum'];

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
if($arResult["bDescPageNumbering"] === true)
{
	// to show always first and last pages
	$arResult["nStartPage"] = $arResult["NavPageCount"];
	$arResult["nEndPage"] = 1;

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {
		$bPrevDisabled = false;
		if ($arResult["bSavePage"]) {
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
		}else{
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1)){
				$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
			}else{
				$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
			}
		}
	}else{
		$bPrevDisabled = true;
	}
	
	$sNextHref = '';
	if ($arResult["NavPageNomer"] > 1){
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
	}else{
		$bNextDisabled = true;
	}
	?>

    <a href="<?if (!$bPrevDisabled){?><?=$sPrevHref;?><?}else{?>javascript:void(0)<?}?>" class="page_prev_next page_prev">
    <img src="/img/arr2.svg" alt="">
    </a>

    <div class="catalog_block_products_pages_in_inner">
	<?
	$bFirst = true;
	$bPoints = false;
	do{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		if ($arResult["nStartPage"] <= 2 || $arResult["NavPageCount"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2){
			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]){?>
			<a href="javascript:void(0)" class="catalog_block_products_pages_in_inner_act"><?=$NavRecordGroupPrint?></a>
	<? }elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false){?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
	<?}else{?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
	        <?}
			$bFirst = false;
			$bPoints = true;
		}else{
			if ($bPoints){
                ?><a href="javascript:void(0)">...</a><?
				$bPoints = false;
			}
		}
		$arResult["nStartPage"]--;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);?>
    </div>
        <a href="<?if (!$bNextDisabled){?><?=$sNextHref;?><?}else{?>javascript:void(0)<?}?>" class="page_prev_next page_next">
            <img src="/img/arr3.svg" alt="">
        </a>

<?}else{
	// to show always first and last pages
	$arResult["nStartPage"] = 1;
	$arResult["nEndPage"] = $arResult["NavPageCount"];

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] > 1){
		$bPrevDisabled = false;
		
		if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2){
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
		}else{
			$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
		}
	}else{
		$bPrevDisabled = true;
	}

	$sNextHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
	}else{
		$bNextDisabled = true;
	}
	?>

    <a href="<?if (!$bPrevDisabled){?><?=$sPrevHref;?><?}else{?>javascript:void(0)<?}?>" class="page_prev_next page_prev">
        <img src="/img/arr2.svg" alt="">
    </a>

    <div class="catalog_block_products_pages_in_inner">
	<?
	$bFirst = true;
	$bPoints = false;
	do{
		if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2){
			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]){?>
            <a href="javascript:void(0)" class="catalog_block_products_pages_in_inner_act"><?=$arResult["nStartPage"]?></a>
	<?}elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false){?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
	<?}else{?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
	<?}
			$bFirst = false;
			$bPoints = true;
		}else{
			if ($bPoints){
                ?><a href="javascript:void(0)">...</a><?
				$bPoints = false;
			}
		}
		$arResult["nStartPage"]++;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);?>
        </div>
    <a href="<?if (!$bNextDisabled){?><?=$sNextHref;?><?}else{?>javascript:void(0)<?}?>" class="page_prev_next page_next">
        <img src="/img/arr3.svg" alt="">
    </a>
<?}?>



<?CJSCore::Init();?>
<script type="text/javascript">
	BX.bind(document, "keydown", function (event) {

		event = event || window.event;
		if (!event.ctrlKey)
			return;

		var target = event.target || event.srcElement;
		if (target && target.nodeName && (target.nodeName.toUpperCase() == "INPUT" || target.nodeName.toUpperCase() == "TEXTAREA"))
			return;

		var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
		if (!key)
			return;

		var link = null;
		if (key == 39)
			link = BX('<?=$ClientID?>_next_page');
		else if (key == 37)
			link = BX('<?=$ClientID?>_previous_page');

		if (link && link.href)
			document.location = link.href;
	});
</script>