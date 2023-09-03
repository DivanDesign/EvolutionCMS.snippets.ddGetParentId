# (MODX)EvolutionCMS.snippets.ddGetParentId changelog


## Version 1.4 (2023-09-04)
* \+ You can just call `\DDTools\Snippet::runSnippet` to run the snippet without DB and eval (see README → Examples).
* \+ README → Installation → Using (MODX)EvolutionCMS.libraries.ddInstaller.
* \+ README_ru, CHANGELOG_ru.
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.60 is required.


## Version 1.3.1 (2020-06-22)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.40.1 is required (not tested in older versions).
* \* Compatibility with new versions of (MODX)EvolutionCMS.libraries.ddTools.
* \* README, CHANGELOG: Style changes.
* \* README:
	* \- Home.
	* \+ Links.
* \* Composer.json → `require` → `dd/evolutioncms-libraries-ddtools`:
	* \* Renamed from `dd/modxevo-library-ddtools`.
	* \* Version format fixed.


## Version 1.3 (2020-03-02)
* \+ Empty items after parsing `result_itemTpl` will be ignored (you can calling third-party snippets in the template and set your own display conditions).
* \+ Composer.json → Require.


## Version 1.2.2 (2020-02-11)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.30 is required.
* \* Fixed a bug where `result_itemsNumber` was always equal to `'all'`.
* \* Refactoring and other changes.


## Version 1.2.1 (2018-12-09)
* \* Wrong variable name was fixed.


## Version 1.2 (2017-10-09)
* \+ Added support of the `@CODE:` keyword prefix in the `tpl` parameter.
* \+ Added an ability to return several parents (see the `result_itemsNumber` and `result_itemsGlue` parameters).
* \* The following parameters have been renamed (with backward compatibility):
	* \* `tpl` → `result_itemTpl`.
	* \* `toPlaceholder` → `result_toPlaceholder`.
	* \* `placeholderName` → `result_toPlaceholder_name`.
* \* The snippet result will be returned in anyway (empty string for empty result).
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS >= 1.1 is required.
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.20 is required.


## Version 1.1 (2014-11-05)
* \+ Negative values can now be passed to the `level` parameter for setting parent level from the end (`-1` — the last parent; `-2` — the parent before the last; etc).


## Version 1.0.1 (2013-08-10)
* \* The id of a current document will be returned if it has no parent (root document).


## Version 1.0 (2011-12-18)
* \+ The first release.


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
<style>ul{list-style:none;}</style>