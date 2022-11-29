<?php
include('dbcon.php');
$teacher_class_id= $_POST['teacher_class_id'];
$session_id = $_POST['session_id'];
$subject_id = $_POST['subject_id'];
$class_id = $_POST['class_id'];
$school_year = $_POST['school_year'];
$query = mysqli_query($conn,"select * from teacher_class where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
$count = mysqli_num_rows($query);
if ($count > 0){ 
echo "true";
}else{

mysqli_query($conn,"update teacher_class set teacher_id='$session_id',subject_id='$subject_id',class_id='$class_id',thumbnails='admin/uploads/thumbnails.jpg',school_year='$school_year' where teacher_class_id='$teacher_class_id'")or die(mysqli_error());

$teacher_class = mysqli_query($conn,"select * from teacher_class order by teacher_class_id DESC")or die(mysqli_error());
$teacher_row = mysqli_fetch_array($teacher_class);
$teacher_id = $teacher_row['teacher_class_id'];


$insert_query = mysqli_query($conn,"select * from student where class_id = '$class_id'")or die(mysqli_error());
while($row = mysqli_fetch_array($insert_query)){
$id = $row['student_id'];
mysqli_query($conn,"update teacher_class_student set teacher_id='$session_id',student_id='$id',teacher_class_id='$teacher_id' where teacher_class_student_id='$teacher_class_id' ")or die(mysqli_error());
echo "yes";
}
}
?>