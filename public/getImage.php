<?php 

	$mountain_id = $_GET['mountain_id'];
	echo $mountain_id;

	$mountain = new Mountain($mountain_id);

	$image = $mountain->image_id;
	$img = new Image($image);
	$imageURL = $img->image_path;

echo json_encode($imageURL);
return json_encode($imageURL);
header('Content-Type: application/json'); 