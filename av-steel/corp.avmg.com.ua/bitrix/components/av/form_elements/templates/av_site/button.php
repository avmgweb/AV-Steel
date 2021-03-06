<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ button ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["BUTTON_TYPE"] == 'button' && $arParams["NAME"]):?>
<button
	class="av-form-elements-av_site-button"
	name="<?=$arParams["NAME"]?>"
	value="<?=$arParams["VALUE"]?>"
	<?=$arParams["ATTR"]?>
>
	<?=$arParams["TITLE"]?>
</button>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ label ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["BUTTON_TYPE"] == 'label'):?>
<span class="av-form-elements-av_site-button" <?=$arParams["ATTR"]?>>
	<?=$arParams["TITLE"]?>
</span>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- link ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["BUTTON_TYPE"] == 'link' && $arParams["LINK"]):?>
<a class="av-form-elements-av_site-button" href="<?=$arParams["LINK"]?>" <?=$arParams["ATTR"]?>>
	<?=$arParams["TITLE"]?>
</a>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ submit ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["BUTTON_TYPE"] == 'submit' && $arParams["NAME"]):?>
<input
	class="av-form-elements-av_site-button"
	type="submit"
	name="<?=$arParams["NAME"]?>"
	value="<?=$arParams["TITLE"]?>"
	<?=$arParams["ATTR"]?>
>
<?endif?>