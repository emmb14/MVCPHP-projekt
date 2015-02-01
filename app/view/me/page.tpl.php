<article class="article">
 
<?=$content?>
 
<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
<img src='<?=$this->url->asset("img/me.jpg")?>' alt="bild på emma malmkjell"/>
</footer>
<?php endif; ?>
 
</article>