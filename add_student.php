<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"SMS");
$query="insert into students values(NULL,$_POST[roll_no],'$_POST[name]','$_POST[father_name]',$_POST[class],'$_POST[mobile]','$_POST[email]',
'$_POST[password]')";
$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Student Added Successfully");
    window.location.href="admin_dashboard.php";
</script>
