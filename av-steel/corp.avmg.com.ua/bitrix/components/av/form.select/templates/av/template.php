<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$inputTitle = $arResult["EMPTY_TITLE"] ? $arResult["EMPTY_TITLE"] : $arResult["TITLE"];
?>
<div
	class="av-form-select<?if($arResult["REQUIRED"]):?> required<?endif?>"
	data-av-form-item="select"
>
	<select name="<?=$arResult["NAME"]?>" title="" <?=$arResult["ATTR"]?>>
		<option value><?=$inputTitle?></option>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<div class="title-label" title="<?=$arResult["TITLE"]?>">
		<div><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $inputTitle?></div>
		<div></div>
	</div>

	<div class="list">
		<div data-list-value <?if(!$arResult["VALUE"]):?>style="display: none"<?endif?>><?=$inputTitle?></div>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<div data-list-value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>class="selected"<?endif?>><?=$title?></div>
		<?endforeach?>
	</div>
</div>