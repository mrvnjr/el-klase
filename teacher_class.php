

<ul	 id="da-thumbs" class="da-thumbs">
		<?php $query = mysqli_query($conn,"select * from teacher_class
			LEFT JOIN class ON class.class_id = teacher_class.class_id
			LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
			where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
			$count = mysqli_num_rows($query);
			if ($count > 0){
			while($row = mysqli_fetch_array($query)){
			$id = $row['teacher_class_id'];
		?>
			<li id="del<?php echo $id; ?>" class="m-1 card">
				<a href="my_students.php<?php echo '?id='.$id; ?>">
						<!-- <img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt=""> -->
						<i class="fas fa-chalkboard-teacher fa-5x m-2"></i>
					<div>
					<span><p><?php echo $row['class_name']; ?></p></span>
					</div>
				</a>
				<p class="class"><?php echo $row['class_name']; ?></p>
				<p class="subject"><?php echo $row['subject_code']; ?></p>
					
			</li>
		<?php include("delete_class_modal.php"); ?>
	<?php } }else{ ?>
	<div class="alert alert-info"><i class="icon-info-sign"></i> No Class Currently Added</div>
	<?php  } ?>
</ul>