
<?php
include('dbcon.php');
if (isset($_POST['classroom_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
     mysqli_query($conn,"DELETE from teacher_class  where  teacher_class_id = '$id[$i]' ")or die(mysqli_error());
     mysqli_query($conn,"DELETE from teacher_class_student  where  teacher_class_id = '$id[$i]' ")or die(mysqli_error());
     mysqli_query($conn,"DELETE from teacher_class_announcements  where  teacher_class_id = '$id[$i]' ")or die(mysqli_error());
     mysqli_query($conn,"DELETE from teacher_notification  where  teacher_class_id = '$id[$i]' ")or die(mysqli_error());
     mysqli_query($conn,"DELETE from class_subject_overview where  teacher_class_id = '$id[$i]' ")or die(mysqli_error());
     
	 //mysqli_query($conn,"DELETE FROM teacher_class_student where student_id='$id[$i]'");
}
header('location:add_class_teacher.php');
}
?>