<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="menu.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<div class="dropdown col">
	<button class="btn bg-transparent dropdown-toogle" type="button" id="menuRole" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Menu Role 
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" aria-labelledby="menuRole">
		<li><a class="dropdown-item" href='index2.php?vue=role&action=ajouter'>Ajouter un Role</a></li>
		<li><a class="dropdown-item" href='index2.php?vue=role&action=visualiser'>Visualiser un Role</a></li>
	</ul>
</div>
		<div class="container">
			<div class="row">
				<div class ="col-md-2 col-xs-12 infosComplementaires">
				</div>
				<div class="col-md-10 col-xs-12 scrollable-roles">