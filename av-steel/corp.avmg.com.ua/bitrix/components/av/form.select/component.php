<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["REQUIRED"] = $arParams["REQUIRED"] == 'Y' ? true : false;
$arResult["DISABLED"] = $arParams["DISABLED"] == 'Y' ? true : false;

$arResult["NAME"]        = $arParams["NAME"];
$arResult["VALUE"]       = $arParams["VALUE"];
$arResult["TITLE"]       = html_entity_decode($arParams["TITLE"]);
$arResult["EMPTY_TITLE"] = html_entity_decode($arParams["EMPTY_TITLE"]);

$arResult["LIST"] = is_array($arParams["LIST"]) ? $arParams["LIST"] : [];

$arResult["ATTR"] = $arParams["ATTR"];
if(is_array($arResult["ATTR"]))
	{
	$attrArray = [];
	foreach($arResult["ATTR"] as $index => $value)
		{
		$attrString = $index;
		if($value) $attrString .= '='.$value;
		$attrArray[] = $attrString;
		}
	$arResult["ATTR"] = implode(' ', $attrArray);
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();