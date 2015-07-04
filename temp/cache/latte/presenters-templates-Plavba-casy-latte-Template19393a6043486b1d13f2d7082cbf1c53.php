<?php
// source: /www/jvitasek.cz/test.jvitasek.cz/app/frontEndModule/presenters/templates/Plavba/casy.latte

class Template19393a6043486b1d13f2d7082cbf1c53 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('209556467c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbc4c4a083f7_content')) { function _lbc4c4a083f7_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ; if ($times['passed']) { ?>
		<p>Na proběhlé plavby už se bohužel přihlásit nemůžete. Leda, že byste měli stroj času :)</p>
		<img width="100%" height="100%" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/delorean.jpg" title="Back to Future" alt="Back to Future">
<?php } else { ?>
		<p>Zde se nachází seznam možných časů poznávacích plaveb, které se po naplnění uskuteční ve Vámi vybraném dni.
		Stačí kliknout na požadovaný čas v levém sloupečku tabulky a dostanete se na stránku,
		kde můžete provést rezervaci.</p><p>Pokud je na plavbě volné místo, číslo obsazenosti je zbarveno <b class="ok">zeleně</b>.
		Pokud již na plavbě není místo, zmizí proklik na rezervaci a číslo obsazenosti se zbarví <b class="full">červeně</b>.</p>
		<p>Pokud je obsazenost nižší než 5, loď nevyplouvá. Nebojte se ale, že přijdete a nepojedeme – jestliže se zarezervujete, dáme
		Vám o tom, že se plavba nekoná, včas vědět telefonicky či emailem.</p>

		<table class="table table-striped">
			<thead>
				<th>Čas</th>
				<th>Obsazenost</th>
			</thead>
<?php $iterations = 0; foreach ($times['times'] as $time) { ?>			<tr>
				<td><?php if ($_l->ifs[] = ($time['obsazenost'] != $max && $time['passed'] == false)) { ?>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Plavba:rezervovat", array($times['date'], $time['time_url'])), ENT_COMPAT) ?>
"><?php } echo Latte\Runtime\Filters::escapeHtml($time['time'], ENT_NOQUOTES) ;if (array_pop($_l->ifs)) { ?>
</a><?php } ?>
</td>
				<td><b class="<?php echo Latte\Runtime\Filters::escapeHtml($time['obsazenost'] == $max ? 'full' : 'ok', ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($time['obsazenost'], ENT_NOQUOTES) ?>
</b>/<?php echo Latte\Runtime\Filters::escapeHtml($max, ENT_NOQUOTES) ?></td>
			</tr>
<?php $iterations++; } ?>
		</table>
<?php } 
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lba71ba0fec5_title')) { function _lba71ba0fec5_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<h2>Plavba <?php echo Latte\Runtime\Filters::escapeHtml($times['date'], ENT_NOQUOTES) ?>
 (<?php echo Latte\Runtime\Filters::escapeHtml($template->lower($times['day_of_the_week']), ENT_NOQUOTES) ?>)</h2>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}