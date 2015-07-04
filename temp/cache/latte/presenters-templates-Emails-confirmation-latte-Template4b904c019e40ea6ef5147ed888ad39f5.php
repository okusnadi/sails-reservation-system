<?php
// source: /Applications/MAMP/htdocs/rezervace/sandbox/app/frontEndModule/presenters/templates/Emails/confirmation.latte

class Template4b904c019e40ea6ef5147ed888ad39f5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d17bc2447d', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Ololoď – potvrzení rezervace</title>
</head>
<body>
	<h2>Rezervace na plavbu <?php echo Latte\Runtime\Filters::escapeHtml($date, ENT_NOQUOTES) ?>
 v <?php echo Latte\Runtime\Filters::escapeHtml($time, ENT_NOQUOTES) ?></h2>
	<p>Přihlásili jste se na plavbu na Ololoďi. Pro potvrzení vaší rezervace prosím klikněte na tento odkaz:</p>
	<p><a href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($conf_url), ENT_COMPAT) ?>
" target="_blank"><?php echo Latte\Runtime\Filters::escapeHtml($conf_url, ENT_NOQUOTES) ?></a></p>
	<p>Pokud o tuto plavbu nemáte již zájem nebo tento email nepatří vám, rezervaci prosím nepotvrzujte.</p>
	<b>Ololoď – plavby Olomouc</b><br>
	<a href="http://plavbyolomouc.cz" target="_blank">http://plavbyolomouc.cz</a><br>
</body>
</html><?php
}}