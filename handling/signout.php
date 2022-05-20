<?php
session_start();
include('../database/connect.php');
$ret = mysqli_query($con, "UPDATE accounts SET account_status=1 WHERE account_id='" . $_SESSION['account_id'] . "';");
session_destroy();
?>
<script language="javascript">
    document.location = "../signin.php";
</script>
