<article class="article">
<?=$content?>
 
<?php if(isset($byline)) : ?>
<footer class="byline">
<img src='<?=$this->url->asset("img/me.jpg")?>' alt="bild på emma malmkjell"/>
<p><?=$byline?></p>
</footer>
<?php endif; ?>
 
</article>