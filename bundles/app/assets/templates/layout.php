<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap 4 -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

	<!-- Our own CSS, about that later -->
	<link rel="stylesheet" href="/bundles/app/main.css">

	<!-- If a child layout doesn't set the page title, we just use 'Quickstart' -->
	<title><?=$_($this->get('pageTitle', 'Quickstart'))?></title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<div class="container">

		<!-- Link to the frontpage -->
		<a class="navbar-brand  mr-auto" href="<?=$this->httpPath('app.frontpage')?>">Quickstart</a>
	</div>
</nav>

<!-- Here is where the child template content will be inserted -->
<?php $this->childContent(); ?>


<!-- Bootstrap dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

</body>
</html>