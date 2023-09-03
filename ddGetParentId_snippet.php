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

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddGetParentId',
	'params' => $params
]);
?>