<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<input
	data-av-form-item="input"
	type="text"
	class="av-form-elements-corp-input number<?if($arParams["REQUIRED"]):?> required<?endif?>"
	name="<?=$arParams["NAME"]?>"
	value="<?=$arParams["VALUE"]?>"
	title="<?=$arParams["TITLE"]?>"
	<?if($arParams["DISABLED"]):?>disabled<?endif?>
	<?=$arParams["ATTR"]?>
>