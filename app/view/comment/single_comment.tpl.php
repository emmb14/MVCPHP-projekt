<div class="comment_wrapp">
	<header class="comment_header">
		<img class="comment_img" src="http://www.gravatar.com/avatar/<?=md5($comment->email);?>.jpg?s=50"  />
		<p class="comment_name"><p># <?=$comment->id?>:</p>
			<a href="http://<?=$comment->homepage?>"><?=$comment->name ?> </a> - 
			<small><?=$comment->created?></small>
			| <a href='<?=$this->url->create('comment/edit/' . $comment->id)?>'>redigera</a>
			| <a href='<?=$this->url->create('comment/deleteSingle/' . $comment->id)?>'>ta bort</a> |
		</p>
	</header>
	<div>
		<p><?echo $comment->comment?></p>
	</div>
</div>
