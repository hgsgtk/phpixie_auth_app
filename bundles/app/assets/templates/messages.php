<?php
// Define parent layout
$this->layout('app:layout');

// Set the pageTitle variable
// that is used by the parent template uses to display page title
$this->set('pageTitle', 'Messages');
?>

<div class="container content">
	<?php foreach($pager->getCurrentItems() as $message): ?>

		<blockquote class='blockquote'>
			<p class="mb-0"><?=$_($message->text)?></p>
			<footer class="blockquote-footer">
				posted by <?=$_($message->user()->name) ?> /posted at <?=$this->formatDate($message->date, 'j M Y, H:i')?>
			</footer>
		</blockquote>

	<?php endforeach; ?>
</div>
