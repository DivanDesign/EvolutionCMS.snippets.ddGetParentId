<?php
/**
 * ddGetParentId
 * @version 1.1 (2014-11-05)
 * 
 * @desc Gets the parent ID of the required level.
 * 
 * @param $id {integer} — Document Id. Default: [*id*].
 * @param $level {integer} — Parent level (1 — the immediate parent; 2 — the parent of the immediate parent; -1 — the last parent; -2 — the parent before the last; etc). Default: 1.
 * @param $tpl {string_chunkName} — Template (chunk name) for output. Available placeholders: [+id+]. Default: —.
 * @param $toPlaceholder {0|1} — Returns value to the placeholder. Default: 0.
 * @param $placeholderName {string} — Placeholder name. Default: 'ddParent'.
 * 
 * @link http://code.divandesign.biz/modx/ddgetparentid/1.1
 * 
 * @copyright 2011–2014 DivanDesign {@link http://www.DivanDesign.biz }
 */

$id = isset($id) ? $id : $modx->documentIdentifier;
$toPlaceholder = (isset($toPlaceholder) && $toPlaceholder == '1') ? true : false;
$placeholderName = isset($placeholderName) ? $placeholderName : 'ddParent';

if (!isset($level)){
	$level = 1;
}else{
	//For backward compatibility
	if ($level == 'ultimate'){
		$level = -1;
	}else{
		$level = (int) $level;
	}
}

//Получаем всех родителей (на самом деле максимум 10, но да ладно)
$parent = $modx->getParentIds($id);
$parent_len = count($parent);

//Если родители вообще есть
if ($parent_len > 0){
	//Если уровень задали больше, чем в принципе есть родителей, считаем, что нужен последний
	if ($level > $parent_len){$level = -1;}
	//Если уровень задаётся от начала (не от конца), то его надо бы декриминировать (т.к. самого себя в массиве $parent не будет)
	if ($level > 0){$level--;}
	
	//Получаем необходимого родителя
	$parent = array_slice($parent, $level, 1);
	$parent = $parent[0];
}else{
	$parent = $id;
}

//Если задан шаблон, выводим по шаблону
if (isset($tpl)){
	$parent = $modx->parseChunk(
		$tpl,
		array('id' => $parent),
		'[+',
		'+]'
	);
}

//Если надо, выводим в плэйсхолдер, или просто возвращаем
if ($toPlaceholder){
	$modx->setPlaceholder($placeholderName, $parent);
}else{
	return $parent;
}
?>