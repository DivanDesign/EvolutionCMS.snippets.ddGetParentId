# (MODX)EvolutionCMS.snippets.ddGetParentId

Gets document parent ID(s) of the required level.


## Requires
* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.biz/modx/ddtools) >= 0.30


## Documentation


### Installation

Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddGetParentId`.
2. Description: `<b>1.3</b> Gets document parent ID(s) of the required level.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddGetParentId_snippet.php` file from the archive.


### Parameters description

* `id`
	* Desctription: Document Id.
	* Valid values: `integer`
	* Default value: `[*id*]` (current document)
	
* `level`
	* Desctription: Parent level
		* `1` — the immediate parent
		* `2` — the parent of the immediate parent
		* `-1` — the last parent
		* `-2` — the parent before the last
		* etc.
	* Valid values: `integer`
	* Default value: `1`
	
* `result_itemsNumber`
	* Desctription: The number of parents that will be returned.
	* Valid values:
		* `integer`
		* `'all'`
	* Default value: `1`
	
* `result_itemTpl`
	* Desctription: Template for output.  
		Empty items after parsing the template will be ignored (you can calling third-party snippets in the template and set your own display conditions).  
		Available placeholders:
		* `[+id+]` — Parent ID.
	* Valid values:
		* `string_chunkName`
		* `string` — use inline templates starting with `@CODE:`
	* Default value: `'@CODE:[+id+]'`
	
* `result_itemsGlue`
	* Desctription: The string that combines items while rendering.
	* Valid values: `string`
	* Default value: `''`
	
* `result_toPlaceholder`
	* Desctription: Returns value to the placeholder.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `result_toPlaceholder_name`
	* Desctription: Placeholder name.
	* Valid values: `string`
	* Default value: `'ddParent'`


## Links

* [Home page](https://code.divandesign.biz/modx/ddgetparentid)
* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />