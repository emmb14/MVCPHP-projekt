<article class="article">
<pre><?/*=var_dump($_SESSION)*/?></pre>
<?/*echo $_SESSION['userId'];*/?>
	<h1><?=$title?></h1>
	<p>Är du inte medlem än? <a href="<?=$this->url->create('users/add')?>"> Klicka här</a></p>
	<form method=post>
	  <fieldset>
		  <p><label>Användare:<br/><input type='text' name='acronym' value=''/></label></p>
		  <p><label>Lösenord:<br/><input type='text' name='password' value=''/></label></p>
		  <p><input type='submit' name='login' value='Logga in' onClick="this.form.action = '<?=$this->url->create('users/login')?>'"/></p>
		  <output><b><?=$output?></b></output>
		  <p><a href="<?=$this->url->create('users/logout/')?>">Logga ut</a></p>
	  </fieldset>
	</form>
 
</article>