<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("iblock"))                           return;
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
// iblockes array
$iblockArray = [];
$queryList = CIBlock::GetList(["sort" => 'asc'], ["TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => 'Y']);
while($queryInfo = $queryList->GetNext()) $iblockArray[$queryInfo["ID"]] = $queryInfo["NAME"];
// iblockes props
$propsArray = [];
$arCurrentValues["IBLOCK_ID"] = array_values(array_diff(is_array($arCurrentValues["IBLOCK_ID"]) ? $arCurrentValues["IBLOCK_ID"] : [$arCurrentValues["IBLOCK_ID"]], ['', 0]));
foreach($arCurrentValues["IBLOCK_ID"] as $iblockId)
	{
	$queryList = CIBlockProperty::GetList(["SORT" => 'asc'], ["IBLOCK_ID" => $iblockId, "ACTIVE" => 'Y']);
	while($queryInfo = $queryList->GetNext()) $propsArray[$iblockId][$queryInfo["ID"]] = $queryInfo["NAME"];
	}
// fields array
$fieldsArray = CIBlockParameters::GetFieldCode()["VALUES"];
/* -------------------------------------------------------------------- */
/* ------------------------------ groups ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["GROUPS"] =
	[
	"MAIN"   => ["NAME" => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_GROUP_MAIN"),   "SORT" => 10],
	"FILTER" => ["NAME" => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_GROUP_FILTER"), "SORT" => 20]
	];
/* -------------------------------------------------------------------- */
/* --------------------------- main params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["IBLOCK_TYPE"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_IBLOCK_TYPE"),
	"TYPE"    => 'LIST',
	"VALUES"  => CIBlockParameters::GetIBlockTypes(),
	"REFRESH" => 'Y',
	"PARENT"  => 'MAIN'
	];
if(count($iblockArray))
	$arComponentParameters["PARAMETERS"]["IBLOCK_ID"] =
		[
		"NAME"     => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_IBLOCK_ID"),
		"TYPE"     => 'LIST',
		"VALUES"   => $iblockArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"REFRESH"  => 'Y',
		"PARENT"   => 'MAIN'
		];
$arComponentParameters["PARAMETERS"]["FILTER_VAR_NAME"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_FILTER_VAR_NAME"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
/* -------------------------------------------------------------------- */
/* -------------------------- filter params --------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["FIELDS"] =
	[
	"NAME"     => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_WORK_FIELDS"),
	"TYPE"     => 'LIST',
	"VALUES"   => $fieldsArray,
	"SIZE"     => 5,
	"MULTIPLE" => 'Y',
	"PARENT"   => 'FILTER'
	];
foreach($propsArray as $iblockId => $propsList)
	$arComponentParameters["PARAMETERS"]['PROPS_'.$iblockId] =
		[
		"NAME"     => $iblockArray[$iblockId].': '.GetMessage("AV_DIRECTORIES_FILTER_PARAMS_WORK_PROPS"),
		"TYPE"     => 'LIST',
		"VALUES"   => $propsList,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'FILTER'
		];
/* -------------------------------------------------------------------- */
/* ------------------------------- cache ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["CACHE_TIME"] =
	[
	"DEFAULT" => 36000000
	];
$arComponentParameters["PARAMETERS"]["CACHE_FILTER"] =
	[
	"TYPE"   => 'CHECKBOX',
	"NAME"   => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_CACHE_FILTER"),
	"PARENT" => 'CACHE_SETTINGS'
	];
$arComponentParameters["PARAMETERS"]["CACHE_GROUPS"] =
	[
	"TYPE"    => 'CHECKBOX',
	"DEFAULT" => 'Y',
	"NAME"    => GetMessage("AV_DIRECTORIES_FILTER_PARAMS_CACHE_GROUPS"),
	"PARENT"  => 'CACHE_SETTINGS'
	];
?>