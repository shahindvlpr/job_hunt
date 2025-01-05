<?php
require_once('../../db.php');
$json = file_get_contents('php://input');
$data = json_decode($json);

$query = "INSERT INTO messages(isFromRecruiter, fromRecruiter, toSeeker, `text`) VALUES(" . $data->isFromRecruiter . ", " . $data->recruiter_id . ", " . $data->seeker_id . ", '" . $data->text . "')";
// mysqli_query($conn, $query);

echo json_encode(["msg" => $query]);
