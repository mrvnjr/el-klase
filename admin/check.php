<?php

include 'config.php';

if(isset($_POST['username'])){
	$username = $_POST['username'];

	// Check username
	$stmt = $conn->prepare("SELECT count(*) as cntUser FROM users WHERE username=:username");
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute(); 
	$count = $stmt->fetchColumn();

	
	if($count > 0){
        ?><script>document.getElementById("save").disabled = true;</script><?php
		$response = "<span style='color: red;'>Not Available.</span>";
        
	}else{
        ?><script>document.getElementById("save").disabled = false;</script><?php
        $response = "<span style='color: green;'>Available.</span>";
    }
	
	echo $response;
	exit;
}

if(isset($_POST['usrname'])){
	$usrname = $_POST['usrname'];

	// Check username
	$stmt = $conn->prepare("SELECT count(*) as cntUser FROM users WHERE username=:usrname");
	$stmt->bindValue(':usrname', $usrname, PDO::PARAM_STR);
	$stmt->execute(); 
	$count = $stmt->fetchColumn();

	
	if($count > 0){
        ?><script>document.getElementById("update").disabled = true;</script><?php
		$response = "<span style='color: red;'>Not Available.</span>";
        
	}else{
        ?><script>document.getElementById("update").disabled = false;</script><?php
        $response = "<span style='color: green;'>Available.</span>";
    }
	
	echo $response;
	exit;
}