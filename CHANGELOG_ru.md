# (MODX)EvolutionCMS.snippets.ddGetParentId changelog


## Версия 1.4 (2023-09-04)
* \+ Запустить сниппет без DB и eval можно через `\DDTools\Snippet::runSnippet` (см. README → Примеры).
* \+ README → Установка → Используя (MODX)EvolutionCMS.libraries.ddInstaller.
* \+ README_ru, CHANGELOG_ru.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.60.


## Версия 1.3.1 (2020-06-22)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.40.1 (не тестировался с более ранними версиями).
* \* Совместимость с новыми версиями (MODX)EvolutionCMS.libraries.ddTools.
* \* README, CHANGELOG: Изменения стиля.
* \* README:
	* \- Home.
	* \+ Links.
* \* Composer.json → `require` → `dd/evolutioncms-libraries-ddtools`:
	* \* Переименована из `dd/modxevo-library-ddtools`.
	* \* Исправлен формат версии.


## Версия 1.3 (2020-03-02)
* \+ Пустые элементы после парсинга `result_itemTpl` будут игнорироваться (можно вызывать сторонние сниппеты в шаблоне и задавать свои условия отображения).
* \+ Composer.json → Require.


## Версия 1.2.2 (2020-02-11)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.30.
* \* Исправлена ошибка, при которой `result_itemsNumber` всегда было равно `'all'`.
* \* Рефакторинг и прочие изменения.


## Версия 1.2.1 (2018-12-09)
* \* Исправлено неправильное имя переменной.


## Версия 1.2 (2017-10-09)
* \+ Добавлено указание шаблона `tpl` без чанка, через префикс `@CODE:`
* \+ Добавлена возможность возвращать несколько родителей (см. параметры `result_itemsNumber` и `result_itemsGlue`).
* \* Следующие параметры были переименованы (с обратной совместимостью):
	* \* `tpl` → `result_itemTpl`.
	* \* `toPlaceholder` → `result_toPlaceholder`.
	* \* `placeholderName` → `result_toPlaceholder_name`.
* \* Результат сниппета возвращается всегда (пустой для пустой строки).
* \* Внимание! Требуется PHP >= 5.4.
* \* Внимание! Требуется (MODX)EvolutionCMS >= 1.1.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.20.


## Версия 1.1 (2014-11-05)
* \+ Параметр `level` теперь может принимать отрицательные значения, чтобы задать уровень родителя с конца (`-1` соответствует последнему; `-2` — предпоследнему и т.д.).


## Версия 1.0.1 (2013-08-10)
* \* Если родителя нет (документ в корне), возвращается ID текущего документа.


## Версия 1.0 (2011-12-18)
* \+ Первый релиз.


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
<style>ul{list-style:none;}</style>