<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$appointment_set = find_all_appointments();

settype($var, 'integer');
$var = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_appointment($var);
    header('Location: appointments.php');
}
?>
        <style>

            tr:nth-child(odd) {background-color: #f2f2f2;}

            table {
                border-collapse: collapse;
                width: 50%;
            }
        </style>

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>


        <center>

                <h1>Appointments</h1>
                <table>
                    <tr>
                        <th><b>ID</b></th>
                        <th><b>Patient ID</b></th>
                        <th><b>Date</b></th>
                        <th><b>Time</b></th>
                        <th colspan="3"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($appointment = mysqli_fetch_assoc($appointment_set)) {
                        echo "<tr><td >" . $appointment["id"] . "</td>
                    <td>" . $appointment["patient_id"] . "</td>
                    <td>" . $appointment["date"] . "</td>
                    <td>" . $appointment["time"] . "</td>
                <td><a href=#>Edit</a></td>
                <td><a href=?delete=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to delete this Appointment?');\">Delete</a></td></tr>";
                    } ?>

                </table>
            <br><td><a href=add_appointment.php>Add an appointment</a></td>

        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>