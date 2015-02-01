<div id="question">

	<div id="question-header">
		<h2><?=$question->questionTitle?></h2>
		<p>av: <?=$user->acronym?> datum: <?=$question->created?></p>
	</div>
	
	<div id="question-body">
		<p><?=$this->textFilter->doFilter( $question->question, 'shortcode, markdown');?></p>
	</div>
	
	
	
	<div id="question-footer">
		<?php if(isset($tags)) : ?>
			<p>taggar:
			<?php foreach ($tags as $tag) : ?>
				<? //echo $tag->id ?>
				<a href=" <?=$this->url->create('tags/id/' . $tag->id)?> "><?=$tag->tag?></a>
			<?php endforeach; ?>
			</p>
		<?php endif; ?>
		
	</div>
	
	
	<p><a href="<?=$this->url->create('questions/addCommenttoQuestion/' . $question->id)?>">Kommentera den här frågan</a></p>
		<div class="comments">
							
			<!-- Get all the comments that belongs to the answer and print it out -->
			<?$allComments = $comments->findCommentstoAnswers($question->id, 'question'); ?>
			
			<?foreach ($allComments as $comment) : ?>
								
				<div class="comment">
					<p><?=$this->textFilter->doFilter( $comment->commentText, 'shortcode, markdown');?> - <?=$comment->userAcronym?> <?=$comment->created?></p>
				</div>
						
			<?php endforeach; ?>
						
		</div>
	<hr/>
	

</div>

<div id="answers">

	<h3><?= count($answers) . " svar"?></h3>
	<?php if(isset($answers)) : ?>
		<!-- Get all theanswers that belongs to the question and print it out -->
		<?php foreach ($answers as $answer) : ?>
			<div class="answer">
				<div class="answer-header">
					<p>av: <?=$answer->userAcronym?> datum:<?=$answer->created?></p> 
				</div>
				
				<div class="answer-body">
					<?=$this->textFilter->doFilter( $answer->answer, 'shortcode, markdown');?>
				</div>
				<p><a href="<?=$this->url->create('questions/addCommenttoAnswer/' . $answer->id . '/' . $question->id)?>">Kommentera det här svaret</a></p>
				
				<div class="comments">
						
						<!-- Get all the comments that belongs to the answer and print it out -->
						<?$allComments = $comments->findCommentstoAnswers($answer->id, 'answer');
						foreach ($allComments as $comment) : ?>
							
							<div class="comment">
								<p><?=$this->textFilter->doFilter( $comment->commentText, 'shortcode, markdown');?> - <?=$comment->userAcronym?> <?=$comment->created?></p>
							</div>
					
						<?php endforeach; ?>
					
				</div>
	
			</div>
			<hr/>
		<?php endforeach; ?>
	<?php endif; ?>
	<p><a href="<?=$this->url->create('questions/addAnswer/' . $question->id)?>">Besvara frågan</a></p>
</div>


