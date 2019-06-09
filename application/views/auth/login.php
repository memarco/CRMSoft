<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM | Gestion des dossiers clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php
echo form_open("auth/login");
?>

<div class="form-group">
   <label for="identity">Login:</label>
   <input type="text" class="form-control" id="identity" name="identity">
 </div>
 <div class="form-group">
   <label for="password">Password:</label>
   <input type="password" class="form-control" id="password" name="password" >
 </div>
 <div class="checkbox">
   <label><input  type="checkbox" name="remember" value="1"  id="remember" > Remember me</label>
 </div>
 <input type="submit" name="submit" value=" &nbsp; &nbsp;Login &nbsp; &nbsp;" class="btn btn-primary" />



<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
