<?php
// source: /Applications/MAMP/htdocs/rezervace/sandbox/app/frontEndModule/presenters/templates/Homepage/default.latte

class Template94841b30ccba160b355786d27d8220cb extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3283b9670d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbbc920cae93_content')) { function _lbbc920cae93_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
		<div class="col-md-6">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
			<table class="table table-striped uvod">
				<thead>
					<th>Datum</th>
					<th>Den</th>
					<th>Vyplouváme v</th>
				</thead>
<?php $iterations = 0; foreach ($sails as $sail) { ?>				<tr>
					<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Plavba:casy", array($sail['date_url'])), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($sail['date'], ENT_NOQUOTES) ?></a></td>
					<td><?php echo Latte\Runtime\Filters::escapeHtml($sail['day_of_the_week'], ENT_NOQUOTES) ?></td>
					<td><?php echo Latte\Runtime\Filters::escapeHtml($sail['sail_times'], ENT_NOQUOTES) ?></td>
				</tr>
<?php $iterations++; } ?>
			</table>
		</div>
		<div class="col-md-6 uvodnik">
			<h3>O rezervacích</h3>
			<p>V rámci této podstránky se můžete zarezervovat na jednotlivé časy plaveb v dané dny. Vlevo vidíte
			seznam všech plaveb až do konce sezóny. Plavby v týdnu se konají v časech 14:55, 16:00 a 17:00. Plavby
			o víkendu zase od 10:00 do 17:00 po hodině.</p>
			<p>Jakmile si vyberete termín, stačí kliknout na datum plavby a dostanete se do výběru času plavby. Tam 
			rovněž najdete další instrukce. Nyní stačí kliknout na požadovaný čas v levém sloupečku tabulky a dostanete
			se na finální podstránku, kde můžete provést rezervaci pod svým jménem.</p>
			<p>Pokud je na plavbě volné místo, číslo obsazenosti je zbarveno <b class="ok">zeleně</b>. Pokud již na plavbě
			není místo, zmizí proklik na rezervaci a číslo obsazenosti se zbarví <b class="full">červeně</b>. Pokud je
			obsazenost nižší než 5, loď nevyplouvá. Nebojte se ale, že přijdete a nepojedeme – jestliže se zarezervujete,
			dáme Vám o tom, že se plavba nekoná, včas vědět telefonicky či emailem.</p>
			<p>Pro přihlášení na plavbu od Vás také potřebujeme nějaké informace. Vyplníte formulář na finální stránce a bude
			Vám zaslán email, který potvrdíte kliknutím na odkaz v něm. V případě úspěšného ověření Vám přijde potvrzující email,
			rekapitulující rezervaci.</p>
			<a href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/images/rezervace-img1.jpg"><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/rezervace-img1.jpg" width="100%" height="100%" title="Rezervace – Ololoď" alt="Rezervace – Ololoď"></a>
		</div>
	</div>
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbb137a5b942_title')) { function _lbb137a5b942_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>			<h3>Výběr plavby</h3>
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