# (MODX)EvolutionCMS.snippets.ddGetParentId

Gets document parent ID(s) of the required level.


## Requires
* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60


## Installation


### Using [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Just run the following PHP code in your sources or [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Include (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Install (MODX)EvolutionCMS.snippets.ddGetParentId
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetParentId',
	'type' => 'snippet'
]);
```

* If `ddGetParentId` is not exist on your site, `ddInstaller` will just install it.
* If `ddGetParentId` is already exist on your site, `ddInstaller` will check it version and update it if needed.


### Manually


#### 1. Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddGetParentId`.
2. Description: `<b>1.3.1</b> Gets document parent ID(s) of the required level.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddGetParentId_snippet.php` file from the archive.


#### 2. Elements → Manage Files

1. Create a new folder `assets/snippets/ddGetParentId/`.
2. Extract the archive to the folder (except `ddGetParentId_snippet.php`).


## Parameters description

* `id`
	* Desctription: Document Id.
	* Valid values: `integer`
	* Default value: `[*id*]` (current document)
	
* `level`
	* Desctription: Parent level.
	* Valid values:
		* `1` — the immediate parent
		* `2` — the parent of the immediate parent
		* `-1` — the last parent
		* `-2` — the parent before the last
		* `integer` — etc
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
		* `stringChunkName`
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


## Examples


### Run the snippet through `\DDTools\Snippet::runSnippet` without DB and eval

```php
//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//Run (MODX)EvolutionCMS.snippets.ddGetParentId
\DDTools\Snippet::runSnippet([
	'name' => 'ddGetParentId',
	'params' => [
		'level' => -1
	]
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/ddgetparentid)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddgetparentid)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetParentId)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />