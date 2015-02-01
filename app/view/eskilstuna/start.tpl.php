<div id="latest-questions">
	<h3>Senaste frågorna</h3>
	<?php foreach ($latestQuestions as $question) : ?>
		<ul>
			<li><a href="<?=$this->url->create('questions/id/' . $question->id)?>"><?=$question->questionTitle?></a></li>
			
		</ul> 
	<?php endforeach; ?>
	
</div>

<div id="most-popular-tags">
	<h3>Populäraste taggarna</h3>
	
	<?php foreach ($mostPopularTags as $tag) : ?>
		<ul>
			<li><a href="<?=$this->url->create('tags/id/' . $tag->id)?>"><?=$tag->tagName?></a></li>
		</ul> 
	<?php endforeach; ?>
</div>

<div id="most-active-users">
	<h3>Mest aktiva användarna</h3>
	<?php foreach ($mostActiveUsers as $user) : ?>
		<ul>
			<li><a href="<?=$this->url->create('users/id/' . $user->id)?>"><?=$user->acronym?></a></li>
		</ul> 
	<?php endforeach; ?>
</div>
