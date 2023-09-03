<?php
/**
 * ddGetParentId
 * @version 1.3.1 (2020-06-22)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddgetparentid
 * 
 * @copyright 2011–2020 Ronef {@link https://Ronef.ru }
 */

global $modx;

//# Include
//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);


//# Prepare params

//Bacward compatibility
extract(\ddTools::verifyRenamedParams([
	'params' => $params,
	'compliance' => [
		'result_itemTpl' => 'tpl',
		'result_toPlaceholder' => 'toPlaceholder',
		'result_toPlaceholder_name' => 'placeholderName',
	]
]));

//Defaults
$params = \DDTools\ObjectTools::extend([
	'objects' => [
		(object) [
			'id' => $modx->documentIdentifier,
			'result_itemsNumber' => 1,
			'result_itemTpl' => '@CODE:[+id+]',
			'result_itemsGlue' => '',
			'result_toPlaceholder' => false,
			'result_toPlaceholder_name' => 'ddParent',
			'level' => 1,
		],
		$params
	]
]);

$params->result_itemTpl = \ddTools::getTpl($params->result_itemTpl);

$params->result_toPlaceholder = boolval($params->result_toPlaceholder);

//For backward compatibility
if ($params->level == 'ultimate'){
	$params->level = -1;
}else{
	$params->level = intval($params->level);
}


//# Run

//The snippet must return an empty string even if result is absent
$snippetResult = '';

$parents = \ddTools::getDocumentParentIds([
	'docId' => $params->id,
	'level' => $params->level,
	'totalResults' => $params->result_itemsNumber
]);

foreach (
	$parents as
	$parentIndex =>
	$parentId
){
	//Parse item
	$parents[$parentIndex] = \ddTools::parseText([
		'text' => $params->result_itemTpl,
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
	$params->result_itemsGlue,
	$parents
);

//Если надо, выводим в плэйсхолдер
if ($params->result_toPlaceholder){
	$modx->setPlaceholder(
		$params->result_toPlaceholder_name,
		$snippetResult
	);
	
	$snippetResult = '';
}

return $snippetResult;
?>