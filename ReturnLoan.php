<?php
include "connection.php";
include_once "loginProgram.php";

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "UPDATE Onloan SET due_DATE = SYSDATE() WHERE user_ID = '".$_SESSION['User']."' AND fm_ID = '".$id."';";
    $sql1 = "UPDATE Films SET fm_AVAILABILITY = 'Available WHERE fm_ID = '".$id."';";

    if ($conn->query($sql) === TRUE) {
        echo "Film returned successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
