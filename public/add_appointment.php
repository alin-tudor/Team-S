<?php require_once('../private/initialise.php'); 
$patients = find_all_patients();
?>
<?php $page_title = 'Register patient'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {

	insert_appointment_member($_POST);
	redirect_to(url_for('add_appointment.php?success'));

}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Referral Form</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
	<style>

tr:nth-child(odd) {background-color: #f2f2f2;}

table {
	border-collapse: collapse;
	width: 50%;
}
</style>
<body>
    <h1><b>PATIENT APPOINTMENT</b></h1>

<h3> <div> 
	<?php if (isset($_GET['success'])){ echo "Appointment has been created"; } ?>
 </div></h3>
<h3><b><div> </div></b></h3>
<br>


<?php if(isset($_GET['patient_id'])){ ?>
    <!-- patient details form -->
    <form action="<?php echo url_for("/add_appointment.php"); ?>" method="post"> 
      <div class="field-column">
      <label>Selected Patient ID</label>
		<input type="text" name="patient_id" value="<?=$_GET['patient_id']?>"  readonly/>
		</div>

    <!-- Patient's forename -->
    <div class="field-column">
      <label>Date</label>
       <input type="date" value="<?=$_GET['date']?>" name="date" required  readonly>
    </div>
			<center>
	<?php 
	$times =	get_time_slots($_GET['date']);
	if($times){
	?>
	<table>
		<thead>
			<tr>
				<th colspan="3">Select one available slot</th>
			</tr>
		</thead>
			<tbody>
				<?php
					foreach($times as $k=>$time){
				?>
				<tr>
					<td><?=($k+1)?></td>
					<td><input type="text" value="<?=date("h:i:sa", strtotime($time))?>" readonly /></td>
					<td><input type="radio" name="time" value="<?=$time?>" required /></td>
				</tr>
					<?php } ?>
			</tbody>

	</table>
	<?php } else { ?>
		<h5>Sorry! there is no time slot available</h5>
	<?php } ?>
	</center>


	<!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">
     <button type="submit" name="submit">Submit</button>
	</div>
     <!-- reset button -->
     <div class="field-column">
     <button type="reset" name="reset">Reset</button>
    </div>
	</form>

	<?php } else { ?>


    <!-- patient details form -->
    <form action="<?php echo url_for("/add_appointment.php"); ?>" method="get">    <!-- Patient's Surname -->
      <div class="field-column">
      <label>Select Patient</label>
		<select name="patient_id" required>
			<option></option
			<?php while($patient = mysqli_fetch_assoc($patients)) { ?>
			<option value="<?= $patient['ID'] ?>"><?= $patient["first_name"].' '.$patient["last_name"] ?></option>
			<?php } ?>
		</select>
        </div>
    <!-- Patient's forename -->
    <div class="field-column">
      <label>Date</label>
       <input type="date" name="date" min="<?= date('yy-m-d') ?>" required >
    </div>

	<!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">
     <button type="submit" name="submit">Submit</button>
	</div>
     <!-- reset button -->
     <div class="field-column">
     <button type="reset" name="reset">Reset</button>
    </div>
</form>

	<?php } ?>


<?php include(SHARED_PATH . '/footer.php'); ?>

