<!doctype html>
<html class='no-js' lang='<?=$lang?>'>
<head>
<meta charset='utf-8'/>
<title><?=$title . $title_append?></title>
<?php if(isset($favicon)): ?><link rel='icon' href='<?=$this->url->asset($favicon)?>'/><?php endif; ?>
<?php foreach($stylesheets as $stylesheet): ?>
<link rel='stylesheet' type='text/css' href='<?=$this->url->asset($stylesheet)?>'/>
<?php endforeach; ?>
<?php if(isset($style)): ?><style><?=$style?></style><?php endif; ?>
<script src='<?=$this->url->asset($modernizr)?>'></script>
</head>

<body>

<div id="wrapper">
	<?php if ($this->views->hasContent('header')) : ?>
	<div id='header'><?php $this->views->render('header')?></div>
	<?php endif; ?>
	
	<?php if ($this->views->hasContent('navbar')) : ?>
	<div id='navbar'><?php $this->views->render('navbar')?></div>
	<?php endif; ?>

	<?php if ($this->views->hasContent('flash_1')) : ?>
	<div id='flash_1'><?php $this->views->render('flash_1')?></div>
	<?php endif; ?>


	<?php if ($this->views->hasContent('featured')) : ?>
	<div id='wrap-featured'>
	<?php $this->views->render('featured')?>
	</div>
	<?php endif; ?>
	<?php if ($this->views->hasContent('featured-1', 'featured-2', 'featured-3')) : ?>
    <div id='wrap-featured'>
	<div id='triptych-1'><?php $this->views->render('featured-1')?></div>
    <div id='triptych-2'><?php $this->views->render('featured-2')?></div>
    <div id='triptych-3'><?php $this->views->render('featured-3')?></div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->views->hasContent('flash_2')) : ?>
	<div id='flash_2'><?php $this->views->render('flash_2')?></div>
	<?php endif; ?>
	
	
	<?php if ($this->views->hasContent('main_1')) : ?>
	<div id='main_1'><?php $this->views->render('main_1')?></div>
	<?php endif; ?>


	<?php if ($this->views->hasContent('main_2')) : ?>
	<div id='main_2'><?php $this->views->render('main_2')?></div>
	<?php endif; ?>
	
	<?php if ($this->views->hasContent('main')) : ?>
	<div id='main'><?php $this->views->render('main')?></div>
	<?php endif; ?>
	
	<?php if ($this->views->hasContent('sidebar')) : ?>
	<div id='sidebar'><?php $this->views->render('sidebar')?></div>
	<?php endif; ?>
	
	<img id="img" src="../img/flash_3.jpg" />
	
	<?php if ($this->views->hasContent('triptych')) : ?>
	<div id='wrap-triptych'>
		<?php $this->views->render('triptych')?>
	</div>
	<?php endif; ?>
	<?php if ($this->views->hasContent('triptych-1', 'triptych-2', 'triptych-3')) : ?>
	<div id='wrap-triptych'>
		<div id='triptych-1'><?php $this->views->render('triptych-1')?></div>
		<div id='triptych-2'><?php $this->views->render('triptych-2')?></div>
		<div id='triptych-3'><?php $this->views->render('triptych-3')?></div>
	</div>
	<?php endif; ?>

	

	<?php if ($this->views->hasContent('footer')) : ?>
	<div id='footer'><?php $this->views->render('footer')?></div>
	<?php endif; ?>
	
</div>	
	
</body>
</html>
