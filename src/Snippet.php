<?php
namespace ddGetParentId;

class Snippet extends \DDTools\Snippet {
	protected
		$version = '1.4.0',
		
		$params = [
			//Defaults
			'id' => 0,
			'result_itemsNumber' => 1,
			'result_itemTpl' => '@CODE:[+id+]',
			'result_itemsGlue' => '',
			'result_toPlaceholder' => false,
			'result_toPlaceholder_name' => 'ddParent',
			'level' => 1,
		],
		
		$paramsTypes = [
			'id' => 'integer',
			'result_toPlaceholder' => 'boolean',
		],
		
		$renamedParamsCompliance = [
			'result_itemTpl' => 'tpl',
			'result_toPlaceholder' => 'toPlaceholder',
			'result_toPlaceholder_name' => 'placeholderName',
		]
	;
	
	/**
	 * prepareParams
	 * @version 1.0 (2023-09-04)
	 * 
	 * @param $params {stdClass|arrayAssociative|stringJsonObject|stringHjsonObject|stringQueryFormatted}
	 * 
	 * @return {void}
	 */
	protected function prepareParams($params = []){
		//Call base method
		parent::prepareParams($params);
		
		//ID is not set or invalid
		if ($this->params->id <= 0){
			$this->params->id = \ddTools::$modx->documentIdentifier;
		}
		
		$this->params->result_itemTpl = \ddTools::getTpl($this->params->result_itemTpl);
		
		//For backward compatibility
		if ($this->params->level == 'ultimate'){
			$this->params->level = -1;
		}else{
			$this->params->level = intval($this->params->level);
		}
	}
	
	/**
	 * run
	 * @version 1.0 (2023-09-04)
	 * 
	 * @return {string|object|array}
	 */
	public function run(){
		$result = '';
		
		$parents = \ddTools::getDocumentParentIds([
			'docId' => $this->params->id,
			'level' => $this->params->level,
			'totalResults' => $this->params->result_itemsNumber
		]);
		
		foreach (
			$parents as
			$parentIndex =>
			$parentId
		){
			//Parse item
			$parents[$parentIndex] = \ddTools::parseText([
				'text' => $this->params->result_itemTpl,
				'data' => [
					'id' => $parentId
				]
			]);
			
			//Remove empty items
			if (empty($parents[$parentIndex])){
				unset($parents[$parentIndex]);
			}
		}
		
		$result = implode(
			$this->params->result_itemsGlue,
			$parents
		);
		
		//Если надо, выводим в плэйсхолдер
		if ($this->params->result_toPlaceholder){
			\ddTools::$modx->setPlaceholder(
				$this->params->result_toPlaceholder_name,
				$result
			);
			
			$result = '';
		}
		
		return $result;
	}
}