<?PHP

	/*
		This PHP Script will randomly generate possible imgur URLs. 
		Refreshing the page will re-generate random images
	*/

	/*	Check for Mode setting in URL string, 
		if it is specified then use it otherwise default to "fast".
		fast mode = will not check to see if image exists. 
		This mode is much faster but will display many of the imgur error images.
		slow mode = this mode will only display actual images but is much slower 
		as it verifies each image first.
	*/
	$mode = isset($_GET['mode']) ? $_GET['mode'] : "fast";
	
	//	Check for image count setting in URL string, 
	//	if it is specified then use it otherwise default to 150.
	$count = isset($_GET['count']) ? $_GET['count'] : 150;
	
	//	Check for image size setting in URL string, 
	//	if it is specified then use it otherwise default to 100.
	$size = isset($_GET['size']) ? $_GET['size'] : 100;

	//	string of available characters
	$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	//	randomly loop through and generate random 5 character name 
	//	using only characters in $characters string
	//	then display it
	for($i = 0; $i < $count; $i++){
		
		$rndImage = "";
		for($p = 0; $p != 5; $p++){
			//get rand number
			$rndnumber = rand(1,strlen($characters));
			$rndImage .= substr($characters,$rndnumber,1);
		}
		
		//	Check which mode we are using
		switch($mode){
			case "fast":
				echo "<a href='http://i.imgur.com/$rndImage.jpg' target='_blank'><img src='http://i.imgur.com/$rndImage.jpg' border='0' height='$size' width='$size'></a>";
				break;
			case "slow":
				$imgpath1 = "http://i.imgur.com/" . $rndImage . ".jpg";
				$headers = get_headers("http://i.imgur.com/".$imgname.".jpg");
				if ($headers[0] == "HTTP/1.1 200 OK"){ // If image exists...
					echo "<a href='$imgpath1' target='_blank'><img src='$imgpath1' border='0' height='$size' width='$size'></a>";
				}
				break;
			}
	}
	
	//	Link for refresh
	echo "<a href='imgur_gen.php?size=$size&count=$count&mode=$mode'><img src='http://i.imgur.com/xBwJe.png' border='0' width='$size' height='$size'></a>";
?>

