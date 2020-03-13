<?php
 function find_member_by_nhsno($nhs_number) {
  global $db;

  $sql = "SELECT * FROM Patient ";
  $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
  $result = mysqli_query($db, $sql);
 
  return $result;
}
function insert_member($nhs_number, $first_name, $last_name, $dob, $sex, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number) {
    global $db;

    $sql = "INSERT INTO Patient ";
    $sql .= "(nhs_number, first_name, last_name, date_of_birth, sex, home_address, postcode, home_phone, mobile_phone, gp_address, gp_phone) ";
    $sql .= "VALUES (";
    $sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $first_name . "', ";
    $sql .= "'" . $last_name . "', ";
    $sql .= "'" . $dob . "', ";
    $sql .= "'" . $sex . "', ";
 
    $sql .= "'" . $home_address . "', ";
    $sql .= "'" . $postcode . "', ";
    $sql .= "'" . $home_phone . "', ";
    $sql .= "'" . $mobile_phone . "', ";
    //$sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $gp_address . "', ";
    $sql .= "'" . $gp_number . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


function find_all_users() {
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

 function find_user_by_id($userID) {
     global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE id='" . $userID . "'";
     $result = mysqli_query($db, $sql);
        return $result;
}

function edit_user($id, $new_username,$new_name,$new_surname,$new_email, $new_userLevel) {
    global $db;
    $sql = "UPDATE User SET username='$new_username', name='$new_name',surname='$new_surname',email='$new_email',userLevel='$new_userLevel' WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function find_user_by_username($username) {
    global $db;

    $sql = "SELECT * FROM User ";
    $sql .= "WHERE username='" . $username . "'";
    $result = mysqli_query($db, $sql);
  
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;
    

  }

function edit_password($id, $new_password)
{
    global $db;
    $sql = "UPDATE User SET password='$new_password' WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }}

    function delete_user($userID)
    {
        global $db;
        $sql = "DELETE FROM User ";
        $sql .= "WHERE id='" . db_escape($db, $userID) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            // DELETE failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }


function add_user($username,$name,$surname,$email,$password, $userLevel) {
    global $db;
    $sql = "INSERT INTO User VALUES (null, '$username','$password','$name','$surname','$email', '$userLevel')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function find_all_patients() {
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function delete_patient($userID)
{
    global $db;
    $sql = "DELETE FROM Patient ";
    $sql .= "WHERE id='" . db_escape($db, $userID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function edit_patient($id, $new_nhs_number, $new_first_name, $new_last_name, $new_date_of_birth,$new_sex,$new_home_address,$new_postcode,$new_home_phone,$new_mobile_phone,$new_gp_address,$new_gp_phone) {
    global $db;
    $sql = "UPDATE `Patient` SET `nhs_number`='$new_nhs_number',`first_name`='$new_first_name',`last_name`='$new_last_name',`date_of_birth`='$new_date_of_birth',`sex`='$new_sex',`home_address`='$new_home_address',`postcode`='$new_postcode',`home_phone`='$new_home_phone',`mobile_phone`='$new_mobile_phone',`gp_address`='$new_gp_address',`gp_phone`='$new_gp_phone' WHERE ID=$id";
    echo($sql);
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
        echo '<script>window.location.replace("patients.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function find_all_appointments() {
    global $db;
    $sql = "SELECT * FROM appointments ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function delete_appointment($id)
{
    global $db;
    $sql = "DELETE FROM appointments ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function get_time_slots($date) {
    global $db;
    $sql = "SELECT * FROM `appointments` ";
    $sql .= "where `date` = '".db_escape($db, $date)."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $appointments =    mysqli_fetch_all($result);

    $times = [];
    for ($i=1; $i <= 7; $i++) { 
        $add = true;
        foreach($appointments as $appointment){
             if(strtotime($i.":00") == strtotime($appointment[3])){
                $add = false;    
            } 
        }
        if($add){
            $times[] = $i.':00';
        }
     }
     return $times;
}

function insert_appointment_member($data) {
    global $db;

    $sql = "INSERT INTO appointments ";
    $sql .= "(patient_id, date, time) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $data['patient_id']) . "', ";
    $sql .= "'" . db_escape($db, $data['date']) . "', ";
    $sql .= "'" . db_escape($db, $data['time']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

  ?>


