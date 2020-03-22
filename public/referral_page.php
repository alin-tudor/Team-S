<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
  <?php include(SHARED_PATH . '/validation.php'); ?>

<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
//$patient_ID = 2;
if (isset($_GET['id'])){
  $patient_ID = intval($_GET['id']);
  $user_set = find_user_by_id($patient_ID);
}
else $patient_ID = 2;
 $message = "";
        $isValid = true;
if(is_post_request()){
   
  $consultant_name = $_POST["consultantName"];
  $val = isOnlyCharacter($consultant_name);
            if($val!=1)
            {
                $message .= getMessage($val,"Consuttant Name");
                $isValid = false;
            }

  $consultant_specialty = $_POST["consultantSpecialty"];
if(!isset($consultant_specialty) || empty($consultant_specialty)){
                $isValid = false;
                $message .= "Consultant Specialty can not be empty";
            }
  $organisation_hospital_name = $_POST["orgName"];
  $val = isOnlyCharacter($organisation_hospital_name);
            if($val!=1)
            {
                $message .= getMessage($val,"Organiszation Hospital Name");
                $isValid = false;
            }
            
  $organisation_hospital_no = $_POST["orgNumber"];
  if(!isset($organisation_hospital_no) || empty($organisation_hospital_no)){
                $isValid = false;
                $message .= "Organiszation Hospital Name can not be empty";
            }


  $bleep_number = $_POST["bleepNumber"];
  if(!isset($bleep_number) || empty($bleep_number)){
                $isValid = false;
                $message .= "Bleep Number can not be empty";
            }

  $is_patient_aware = $_POST["isAware"];
  $is_interpreter_needed = $_POST["isInterpreterNeeded"];
  $interpreter_language = $_POST["interpreterLanguage"];
  $kch_doc_name = $_POST["kchDocName"];

  $current_issue = $_POST["currentIssue"];
if(!isset($current_issue) || empty($current_issue)){
                $isValid = false;
                $message .= "Current Issue can not be empty";
            }
  $history_of_present_complaint = $_POST["complaintHistory"];
if(!isset($history_of_present_complaint) || empty($history_of_present_complaint)){
                $isValid = false;
                $message .= "history of patient compliant can not be empty";
            }
  $family_history = $_POST["familyHistory"];
if(!isset($family_history) || empty($family_history)){
                $isValid = false;
                $message .= "Family History can not be empty";
            }
  $current_feeds = $_POST["currentFeeds"];
if(!isset($current_feeds) || empty($current_feeds)){
                $isValid = false;
                $message .= "Curren Feeds can not be empty";
            }
  $medications = $_POST["medications"];
if(!isset($medications) || empty($medications)){
                $isValid = false;
                $message .= "Medications can not be empty";
            }
  $other_investigations = $_POST["otherInvestigations"];
if(!isset($other_investigations) || empty($other_investigations)){
                $isValid = false;
                $message .= "Other Investigations can not be empty";
            }
  $datetime = $_POST["datetime"];
if(!isset($datetime) || empty($datetime)){
                $isValid = false;
                $message .= "Date Time can not be empty";
            }

  //if(count(array_filters($_POST))!=count($_POST)){
    //echo '<label class = "text-danger">Please fill in all required fields</label';
  //}
  //$result = find_member_by_nhsno($nhs_number);
  // list($usr, $domain) = explode('@', $email);

  // if (!($domain == 'kcl.ac.uk')) {
       // use gmail
     //  echo '<label class="text-danger">This is not a valid Kings College London email (@kcl.ac.uk domain)</label>';
  // } 
 // else {
        if($isValid){
           $result1 = insert_referral( $patient_ID ,$consultant_name, $consultant_speciality, $organisation_hospital_name, $organisation_hospital_no, 
           $bleep_number, $is_patient_aware, $is_interpreter_needed, $kch_doc_name, $current_issue, 
           $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations, $datetime);
           $new_id = mysqli_insert_id($db);
           redirect_to(url_for('referral_page.php?id=' . $new_id));
         }else{
          echo $message;
         }
       }
     //}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Referral Form</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
<body>
    <h1><b>REFERRAL FORM</b></h1>
    
<h3> <div>Patient Details(Please complete all fields) </div></h3>
<h3><b><div> Referral is NOT accepted without filling ALL Fields in this page </div></b></h3>
<br>
<!--<form class = "form" action="contactform.php" method="post">  -->
    <!-- patient details form -->

        <span id="alert_message" style="color:red"></span>

   <form method="post" id="form">    
      <!-- Consultant Name -->
          <div class="field-column">
            <label>Consultant Name</label>
            <input type="text" onfocusout="isOnlyCharacter(this,'Consultant Name')" id="consultantName" name="consultantName" placeholder="Required" required>
          </div>
          <!-- Consultant Specialty -->
          <div class="field-column">
            <label>Consultant Specialty</label>
            <input type="text" onfocusout="isOnlyCharacter(this,'Consultant Specialty')" id="consultantSpecialty" name="consultantSpecialty" required>
          </div>
          <!-- Organisation Name -->
          <div class="field-column">
             <label>Organisation Hospital Name</label>
             <input type="text" onfocusout="isOnlyCharacter(this,'Organisation Hospital Name')" id="orgName" name="orgName" required>
          </div>
         <!-- Organisation Hospital Number -->
          <div class="field-column">
            <label>Organisation Hospital Number</label>
            <input type="number" onfocusout="isOnlyNumber(this,'Organisation Hospital Number')" id="orgNumber" name="orgNumber" required>
          </div>
        <!-- Bleep Number -->
          <div class="field-column">
            <label>Bleep Number</label>
            <input type = "number"  onfocusout="isOnlyNumber(this,'Bleep Number')" id="bleepNumber" name = "bleepNumber" required>
          </div>

          <!-- Patient Aware -->
          <div class="field-column">
            <label>Is the patient aware of the referral?</label>
            <input type = "checkbox" id="isAware" name = "isAware" value='Y' >
          </div>

          <!-- Interpreter Needed -->
          <div class="field-column">
            <label>Will there be a language interpreter needed?</label>
            <input type = "checkbox" id="isInterpreterNeeded" name = "isInterpreterNeeded" value='Y'>
          </div>
          <!-- Interpreter Language -->
          <div class="field-column">
            <label>Interpreter language(To be left empty if no interpreter is needed)</label>
            <input type = "text"  id="interpreterLanguage" name = "interpreterLanguage">
          </div>
          <!-- Doctor at Kings -->
          <div class="field-column">
            <label>Doctor at King's College Hospital this case was discussed with(To be left empty if the case wasn't discussed with anyone at King's)</label>
            <input type="text" id="kchDocName" name="kchDocName">
          </div>

        <!-- Current Issue -->

          <div class="field-column">
            <label>Current Issue</label>
            <textarea id="currentIssue" required="" onfocusout="isEmpty(this,'Current Issue')" name= "currentIssue"> </textarea>
          </div>
