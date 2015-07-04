<?php
// source: /www/plavbyolomouc.cz/rezervace.plavbyolomouc.cz/app/frontEndModule/presenters/templates/Plavba/rezervovat.latte

class Template3fc1f75e714d4973ac70c34a34fcccbd extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('bc492f79d9', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb5b3ec8f279_content')) { function _lb5b3ec8f279_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

	<p>Pro přihlášení na tuto plavbu od Vás potřebujeme nějaké informace. Vyplňte prosím formulář níže a bude Vám zaslán email, který potvrdíte kliknutím na odkaz v něm. V případě úspěšného ověření Vám přijde finální potvrzující email, rekapitulující rezervaci.</p>

	<form<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["bookForm"], array (
), FALSE) ?>>
		<div class="row">
			<div class="col-md-2">
				<label for="jmeno">Jméno</label><br>
				<input<?php $_input = $_form["jmeno"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->attributes() ?>>
			</div>
			<div class="col-md-2">
				<label for="prijmeni">Příjmení</label><br>
				<input<?php $_input = $_form["prijmeni"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->attributes() ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<label for="telefon">Telefon</label><br>
				<input<?php $_input = $_form["telefon"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->attributes() ?>>
			</div>
			<div class="col-md-2">
				<label for="email">Email</label><br>
				<input<?php $_input = $_form["email"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->attributes() ?>>
			</div>
		</div>
		<label for="count">Počet lidí</label><br>
		<input class="count"<?php $_input = $_form["count"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->addAttributes(array (
  'class' => NULL,
))->attributes() ?>><br>
		<input value="Odeslat"<?php $_input = $_form["submit"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->addAttributes(array (
  'value' => NULL,
))->attributes() ?>>
		<input value="<?php echo Latte\Runtime\Filters::escapeHtml($template->date($date, 'Y-m-d'), ENT_COMPAT) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($template->date($template->replace($time, '-', ':'), 'H:i:s'), ENT_COMPAT) ?>
"<?php $_input = $_form["timestamp"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->addAttributes(array (
  'value' => NULL,
))->attributes() ?>>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form, FALSE) ?></form>
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbc2b1598ddd_title')) { function _lbc2b1598ddd_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<h2>Plavba <?php echo Latte\Runtime\Filters::escapeHtml($date, ENT_NOQUOTES) ?>
 v <?php echo Latte\Runtime\Filters::escapeHtml($template->replace($time, '-', ':'), ENT_NOQUOTES) ?></h2>
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