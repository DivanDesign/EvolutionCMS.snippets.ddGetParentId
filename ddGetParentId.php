<?php
/**
 * ddGetParentId.php
 * @version 1.0.1 (2013-08-10)
 * 
 * @desc Gets the parent ID of the required level.
 * 
 * @param $id {integer} - Document Id. Default: [*id*].
 * @param $level {integer; string} - Parent level (1 — the immediate parent, 'ultimate' — the last). Default: 1.
 * @param $tpl {string} - Template (chunk name) for output. Available placeholders: [+id+]. Default: —.
 * @param $toPlaceholder {0; 1} - Returns value to the placeholder. Default: 0.
 * @param $placeholderName {string} - Placeholder name. Default: 'ddParent'.
 * 
 * @link http://code.divandesign.biz/modx/ddgetparentid/1.0.1
 * 
 * @copyright 2013, DivanDesign
 * http://www.DivanDesign.biz
 */

$id = isset($id) ? $id : $modx->documentIdentifier;
$level = isset($level) ? $level : 1;
$toPlaceholder = (isset($toPlaceholder) && $toPlaceholder == '1') ? true : false;
$placeholderName = isset($placeholderName) ? $placeholderName : 'ddParent';

//Если нужно получить самый последний, задаём глубину 10
if ($level == 'ultimate'){$level = 10;}

//Получаем последнего родителя
$parent = $modx->getParentIds($id, $level);

if (count($parent) > 0){
	$parent = array_pop($parent);
}else{
	$parent = $id;
}

//Если задан шаблон, выводим по шаблону
if (isset($tpl)){$parent = $modx->parseChunk($tpl, array('id' => $parent),'[+','+]');}

//Если надо, выводим в плэйсхолдер, или просто возвращаем
if ($toPlaceholder){
	$modx->setPlaceholder($placeholderName, $parent);
}else{
	return $parent;
}
?>