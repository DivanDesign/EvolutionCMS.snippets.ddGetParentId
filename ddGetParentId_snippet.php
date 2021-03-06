<?php
/**
 * ddGetParentId
 * @version 1.3.1 (2020-06-22)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/ddgetparentid
 * 
 * @copyright 2011–2020 DD Group {@link https://DivanDesign.biz }
 */

global $modx;

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//The snippet must return an empty string even if result is absent
$snippetResult = '';

//Bacward compatibility
extract(\ddTools::verifyRenamedParams([
	'params' => $params,
	'compliance' => [
		'result_itemTpl' => 'tpl',
		'result_toPlaceholder' => 'toPlaceholder',
		'result_toPlaceholder_name' => 'placeholderName',
	]
]));

$id =
	isset($id) ?
	$id :
	$modx->documentIdentifier
;
$result_itemsNumber =
	isset($result_itemsNumber) ?
	$result_itemsNumber :
	1
;
$result_itemTpl =
	isset($result_itemTpl) ?
	$modx->getTpl($result_itemTpl) :
	'[+id+]'
;
$result_itemsGlue =
	isset($result_itemsGlue) ?
	$result_itemsGlue :
	''
;
$result_toPlaceholder =
	(
		isset($result_toPlaceholder) &&
		$result_toPlaceholder == '1'
	) ?
	true :
	false
;
$result_toPlaceholder_name =
	isset($result_toPlaceholder_name) ?
	$result_toPlaceholder_name :
	'ddParent'
;

if (!isset($level)){
	$level = 1;
}else{
	//For backward compatibility
	if ($level == 'ultimate'){
		$level = -1;
	}else{
		$level = intval($level);
	}
}

$parents = \ddTools::getDocumentParentIds([
	'docId' => $id,
	'level' => $level,
	'totalResults' => $result_itemsNumber
]);

foreach (
	$parents as
	$parentIndex =>
	$parentId
){
	//Parse item
	$parents[$parentIndex] = \ddTools::parseText([
		'text' => $result_itemTpl,
		'data' => [
			'id' => $parentId
		]
	]);
	
	//Remove empty items
	if (empty($parents[$parentIndex])){
		unset($parents[$parentIndex]);
	}
}

$snippetResult = implode(
	$result_itemsGlue,
	$parents
);

//Если надо, выводим в плэйсхолдер
if ($result_toPlaceholder){
	$modx->setPlaceholder(
		$result_toPlaceholder_name,
		$snippetResult
	);
	
	$snippetResult = '';
}

return $snippetResult;
?>