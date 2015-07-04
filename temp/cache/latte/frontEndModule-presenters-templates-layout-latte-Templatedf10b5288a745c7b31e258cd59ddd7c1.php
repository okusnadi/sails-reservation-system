<?php
// source: /www/plavbyolomouc.cz/rezervace.plavbyolomouc.cz/app/frontEndModule/presenters/templates/@layout.latte

class Templatedf10b5288a745c7b31e258cd59ddd7c1 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('e8daa84b9d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb8e8e1f7857_head')) { function _lb8e8e1f7857_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbde4f87ff5b_scripts')) { function _lbde4f87ff5b_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Nette Sandbox</title>

	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/reset.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="author" content="Jakub Vitásek | jvitasek.cz">
	<meta name="robots" content="noindex,nofollow">
	<!-- favs -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://plavbyolomouc.cz/skin/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://plavbyolomouc.cz/skin/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://plavbyolomouc.cz/skin/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://plavbyolomouc.cz/skin/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://plavbyolomouc.cz/skin/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://plavbyolomouc.cz/skin/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://plavbyolomouc.cz/skin/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://plavbyolomouc.cz/skin/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://plavbyolomouc.cz/skin/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="http://plavbyolomouc.cz/skin/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://plavbyolomouc.cz/skin/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://plavbyolomouc.cz/skin/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://plavbyolomouc.cz/skin/fav/favicon-16x16.png">
	<link rel="manifest" href="http://plavbyolomouc.cz/skin/fav/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="http://plavbyolomouc.cz/skin/fav/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- end favs -->
	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
	<div class="container">
		<nav>
			<a class="navbar-brand" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
"><img class="logo" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/logo.png"></a>
			<ul class="nav nav-tabs">
				<li role="presentation"<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Homepage:*') ? 'active' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
">Hlavní stránka</a></li>
				<li role="presentation"><a href="http://plavbyolomouc.cz">Zpět na Ololoď</a></li>
			</ul>
		</nav>
<?php $iterations = 0; foreach ($flashes as $flash) { ?>		<div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
	</div>
	
<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
</body>
</html>
<?php
}}