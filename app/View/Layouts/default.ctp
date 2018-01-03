<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
// $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
	<div id="container">
		<div id="header">
		</div>

		
	</div>

</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Storage Units</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/cake">Home</a></li>
      <li><a href="http://localhost/cake/users/index">Users</a></li>
      <li><a href="http://localhost/cake/groups/index">Privilegues</a></li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">All ITEMS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        	<li><a href="http://localhost/cake/items/select">ADD Items</a></li>
          <li><a href="http://localhost/cake/items/index">Items</a></li>
          <li><a href="http://localhost/cake/materials/index">Materials</a></li>
          <li><a href="#">SICS</a></li>
          <li><a href="#">PGPKSKS</a></li>
          <li><a href="#">Semi-products</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="http://localhost/cake/users/add"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      <?php
      	if(AuthComponent::user()){
		echo "<li><a href='http://localhost/cake/users/logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";	
		}else {
		echo "<li><a href='http://localhost/cake/users/login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";	
	
		}
		
		?>

    </ul>
  </div>
</nav> 

		<div id="content">

			<?php echo $this->Flash->render(); ?>
			<?php echo $this->Flash->render('auth'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>

</html>


