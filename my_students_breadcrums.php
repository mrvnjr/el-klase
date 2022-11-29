	 <!-- breadcrumb -->
	<?php $class_query = mysqli_query($conn,"select * from teacher_class
	LEFT JOIN class ON class.class_id = teacher_class.class_id
	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
	where teacher_class_id = '$get_id'")or die(mysqli_error());
	$class_row = mysqli_fetch_array($class_query);
	?>
				
	<ul class="breadcrumb">
		<li><?php echo $class_row['class_name']; ?><span class="divider"> / </span></li>
		<li><?php echo $class_row['subject_code']; ?> <span class="divider mr-2"> / </span></li>
		<li>School Year: <?php echo $class_row['school_year']; ?> </li>
		
	</ul>
	<!-- end breadcrumb -->