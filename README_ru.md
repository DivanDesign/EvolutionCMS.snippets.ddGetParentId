# (MODX)EvolutionCMS.snippets.ddGetParentId

Получает ID родителя(ей) необходимого уровня.


## Использует
* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60


## Установка


### Используя [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Просто вызовите следующий код в своих исходинках или модуле [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Подключение (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Установка (MODX)EvolutionCMS.snippets.ddGetParentId
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetParentId',
	'type' => 'snippet'
]);
```

* Если `ddGetParentId` отсутствует на вашем сайте, `ddInstaller` просто установит его.
* Если `ddGetParentId` уже есть на вашем сайте, `ddInstaller` проверит его версию и обновит, если нужно. 


### Вручную


#### 1. Элементы → Сниппеты: Создайте новый сниппет со следующими параметрами

1. Название сниппета: `ddGetParentId`.
2. Описание: `<b>1.3.1</b> Получает ID родителя(ей) необходимого уровня.`.
3. Категория: `Core`.
4. Анализировать DocBlock: `no`.
5. Код сниппета (php): Вставьте содержимое файла `ddGetParentId_snippet.php` из архива.


#### 2. Элементы → Управление файлами

1. Создайте новую папку `assets/snippets/ddGetParentId/`.
2. Извлеките содержимое архива в неё (кроме файла `ddGetParentId_snippet.php`).


## Описание параметров

* `id`
	* Описание: ID документа.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `[*id*]` (текущий документ)
	
* `level`
	* Описание: Уровень родителя.
	* Допустимые значения:
		* `1` — непосредственный родитель
		* `2` — родитель родителя
		* `-1` — последний родитель
		* `-2` — предпоследний родитель
		* `integer` — etc
	* Значение по умолчанию: `1`
	
* `result_itemsNumber`
	* Описание: Количество возвращаемых родителей.
	* Допустимые значения:
		* `integer`
		* `'all'`
	* Значение по умолчанию: `1`
	
* `result_itemTpl`
	* Описание: Шаблон (имя чанка) для вывода.  
		Пустые элементы после парсинга шаблона будут игнорироваться (можно вызывать сторонние сниппеты в шаблоне и задавать свои условия отображения).  
		Доступные плейсхолдеры:
		* `[+id+]` — Parent ID.
	* Допустимые значения:
		* `stringChunkName`
		* `string` — передавать код напрямую без чанка можно начиная значение с `@CODE:`
	* Значение по умолчанию: `'@CODE:[+id+]'`
	
* `result_itemsGlue`
	* Описание: Строка, объединяющая элементы при рендеринге.
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`
	
* `result_toPlaceholder`
	* Описание: Возвращать значение в плэйсхолдер.
	* Допустимые значения:
		* `0`
		* `1`
	* Значение по умолчанию: `0`
	
* `result_toPlaceholder_name`
	* Описание: Имя плэйсхолдера.
	* Допустимые значения: `string`
	* Значение по умолчанию: `'ddParent'`


## Примеры

### Запустить сниппет через `\DDTools\Snippet::runSnippet` без DB и eval

```php
//Подключение (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//Запуск (MODX)EvolutionCMS.snippets.ddGetParentId
\DDTools\Snippet::runSnippet([
	'name' => 'ddGetParentId',
	'params' => [
		'level' => -1
	]
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/ddgetparentid)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddgetparentid)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetParentId)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />