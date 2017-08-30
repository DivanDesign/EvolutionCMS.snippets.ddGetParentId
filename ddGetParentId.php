<?php
/**
 * ddGetParentId
 * @version 1.1 (2014-11-05)
 * 
 * @desc Gets the parent ID of the required level.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo >= 1.1.
 * @uses MODXEvo.library.ddTools >= 0.20.
 * 
 * @param $id {integer} — Document Id. Default: [*id*].
 * @param $level {integer} — Parent level (1 — the immediate parent; 2 — the parent of the immediate parent; -1 — the last parent; -2 — the parent before the last; etc). Default: 1.
 * @param $tpl {string_chunkName|string} — Template for output (chunk name or code via “@CODE:” prefix). Available placeholders: [+id+]. Default: —.
 * @param $toPlaceholder {0|1} — Returns value to the placeholder. Default: 0.
 * @param $placeholderName {string} — Placeholder name. Default: 'ddParent'.
 * 
 * @link http://code.divandesign.biz/modx/ddgetparentid/1.1
 * 
 * @copyright 2011–2014 DivanDesign {@link http://www.DivanDesign.biz }
 */

$result = '';

require_once $modx->getConfig('base_path').'assets/libs/ddTools/modx.ddtools.class.php';

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
$parents = $modx->getParentIds($id);
$parents_len = count($parents);

//Если родители вообще есть
if ($parents_len > 0){
	//Если уровень задали больше, чем в принципе есть родителей, считаем, что нужен последний
	if ($level > $parents_len){$level = -1;}
	//Если уровень задаётся от начала (не от конца), то его надо бы декриминировать (т.к. самого себя в массиве $parents не будет)
	if ($level > 0){$level--;}
	
	//Получаем необходимого родителя
	$parents = array_slice($parents, $level, 1);
	$result = $parents[0];
}else{
	$result = $id;
}

//Если задан шаблон, выводим по шаблону
if (isset($tpl)){
	$result = ddTools::parseText([
		'text' => $modx->getTpl($tpl),
		'data' => ['id' => $result]
	]);
}

//Если надо, выводим в плэйсхолдер, или просто возвращаем
if ($toPlaceholder){
	$modx->setPlaceholder($placeholderName, $result);
	$result = '';
}

return $result;
?>