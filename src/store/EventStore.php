<?php

session_start();

$_SESSION["user"] = "admin";

include '../../src/common/DBConnection.php';

$conn=new DBConnection();

$eventChildsname=$_POST['eventSubject'];
$eventDate=$_POST['eventDate'];
$eventTime=$_POST['eventTime'];
$eventDesc=$_POST['eventDesc'];

$result=$conn->execute("INSERT INTO live_events (event_childsname, event_date, event_time, description, insert_by, insert_date) 
     VALUES ('".$eventChildsname."', '".$eventDate."', '".$eventTime."', '".$eventDesc."', '".$_SESSION["user"]."', CURRENT_TIMESTAMP)");

if($result) {
    header("Location: " ."../../views/admin/sendLiveEvent.php?message=success");
    die();
} else {
    header("Location: " ."../../views/admin/sendLiveEvent.php?message=failed");
    die();
}

class EventStore
{

}