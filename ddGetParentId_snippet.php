﻿<?php
/**
 * ddGetParentId
 * @version 1.2.1 (2018-12-09)
 * 
 * @desc Gets the parent ID(s) of the required level.
 * 
 * @uses PHP >= 5.4.
 * @uses (MODX)EvolutionCMS >= 1.1 {@link https://github.com/evolution-cms/evolution }.
 * @uses (MODX)EvolutionCMS.libraries.ddTools >= 0.20 {@link http://code.divandesign.biz/modx/ddtools }.
 * 
 * @param $id {integer} — Document Id. Default: [*id*].
 * @param $level {integer} — Parent level (1 — the immediate parent; 2 — the parent of the immediate parent; -1 — the last parent; -2 — the parent before the last; etc). Default: 1.
 * @param $result_itemTpl {stringChunkName|string} — Template for output (chunk name or code via “@CODE:” prefix). Available placeholders: [+id+]. Default: '@CODE:[+id+]'.
 * @param $result_itemsNumber {integer|'all'} — The number of parents that will be returned. Default: 1.
 * @param $result_itemsGlue {string} — The string that combines items while rendering. Default: ''.
 * @param $result_toPlaceholder {0|1} — Returns value to the placeholder. Default: 0.
 * @param $result_toPlaceholder_name {string} — Placeholder name. Default: 'ddParent'.
 * 
 * @link http://code.divandesign.biz/modx/ddgetparentid/1.2.1
 * 
 * @copyright 2011–2018 DivanDesign {@link http://www.DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//The snippet must return an empty string even if result is absent
$snippetResult = '';

//Bacward compatibility
extract(\ddTools::verifyRenamedParams(
	$params,
	[
		'result_itemTpl' => 'tpl',
		'result_toPlaceholder' => 'toPlaceholder',
		'result_toPlaceholder_name' => 'placeholderName',
	]
));

$id =
	isset($id) ?
	$id :
	$modx->documentIdentifier
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

//Получаем всех родителей (на самом деле максимум 10, но да ладно)
$parents = $modx->getParentIds($id);
$parents_len = count($parents);

//Если родители вообще есть
if ($parents_len > 0){
	//Если уровень задали больше, чем в принципе есть родителей, считаем, что нужен последний
	if ($level > $parents_len){
		$level = -1;
	}
	//Если уровень задаётся от начала (не от конца), то его надо бы декриминировать (т.к. самого себя в массиве $parents не будет)
	if ($level > 0){
		$level--;
	}
	//Количество возвращаемых родителей
	if ($result_itemsNumber == 'all'){
		//Все родители
		$result_itemsNumber = $parents_len;
	}else if (isset($result_itemsNumber)){
		//Заданное количество
		$result_itemsNumber = intval($result_itemsNumber);
	}else{
		//Непосредственный
		$result_itemsNumber = 1;
	}
	
	//Получаем необходимых родителей
	$parents = array_slice(
		$parents,
		$level,
		$result_itemsNumber
	);
	$parents = array_reverse($parents);
}else{
	$parents = [$id];
}

foreach (
	$parents as
	$parentIndex =>
	$parentId
){
	$parents[$parentIndex] = \ddTools::parseText([
		'text' => $result_itemTpl,
		'data' => [
			'id' => $parentId
		]
	]);
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