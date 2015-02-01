<div class='center'>
	<a href="<?=$this->url->create('')?>"><img class='sitelogo' src='<?=$this->url->asset("img/logo.png")?>' alt='Allt om eskilstuna logo'/></a>

	<div class='right login'>
		<p><a href="<?=$this->url->create('about')?>">Om oss</a> |
		<?if(isset($_SESSION['userId'])) :?>
		 <a href="<?=$this->url->create('users/profile/' . $_SESSION['userId']); ?>">Min sida</a> |
		 <a href="<?=$this->url->create('users/logout/')?>">Logga ut</a>		|</p>
		<?else :?>
		<a href="<?=$this->url->create('users/add')?>">Bli medlem</a> | 
		<a href="<?=$this->url->create('users/login')?>">Logga in</a>
		</p>
		<?php endif; ?>
	</div>
</div>