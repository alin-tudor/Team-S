<?php
  if(!isset($page_title)) { $page_title = 'Paediatric liver service KCL'; }
?>
<!doctype html>

<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/service.css'); ?>" />
  </head>

  <body>

  <navigation>
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">MAIN</a></li>
      
      <li><a href="<?php echo url_for('/register_patient.php'); ?>">REGISTER PATIENT</a></li> 
      <li><a href="<?php echo url_for('/user_login.php'); ?>">LOG IN</a></li>
        <li><a href="<?php echo url_for('/users.php'); ?>">Admin: STAFF MANAGEMENT</a></li>
       
        <li><a href="<?php echo url_for('/patients.php'); ?>">Staff: PATIENTS</a></li>
        <li><a href="<?php echo url_for('/appointments.php'); ?>">Appointments</a></li>
        <li><a href="<?php echo url_for('/register_member.php'); ?>">Staff: REFERRALS </a></li>
        <li><a href="<?php echo url_for('/register_member.php'); ?>">Patient: MY RESULTS </a></li>

    </ul>
  </navigation>

  <div>
