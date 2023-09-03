<?php
/**
 * ddGetParentId
 * @version 1.4 (2023-09-04)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddgetparentid
 * 
 * @copyright 2011–2023 Ronef {@link https://Ronef.ru }
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