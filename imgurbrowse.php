<?
  /*
    This PHP Script will scan through imgur image URLs by generating the image name 
    in a sequential order ( 11111.jpg, 11112.jpg... or aaaaa.jpg aaaab.jpg). 
    the URL will user a GET method so you could save and resume your progress.
    I accomplished this using a string with available characters to use in the image name,
    and rotating through them.
  */


  /*  Here we are checking to see if we are continuing progress or starting at the beginning
      If it detects variables passed in the URL then it will use those values, otherwise it will
      start at 0 
  */
	$location = explode(',',$_GET['location']);
	$sc1 = isset($location[0]) ? $location[0] : 0;
	$sc2 = isset($location[1]) ? $location[1] : 0;
	$sc3 = isset($location[2]) ? $location[2] : 0;
	$sc4 = isset($location[3]) ? $location[3] : 0;
	
	// If size for the thumbnails is specified then use it, otherwise default to 150px
	$size = isset($_GET['size']) ? $_GET['size'] : 150;
	
	//  echo out for debugging purposes
	echo "\n<!-- Values: \n SC1: $sc1 \n SC2: $sc2 \n SC3: $sc3 \n SC4: $sc4 \n SC5: $sc5 \n SIZE: $size -->";
	
	//  String to hold possible characters
	$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	//  Check if the location is past the end of the available characters, and increase the "next level" 
	//  example aaaaZ.jpg -> aaaba.jpg (based on above character string)
	if($sc4 > (strlen($characters) - 1)){ $sc4 = 0; $sc3++; }
	if($sc3 > (strlen($characters) - 1)){ $sc3 = 0; $sc2++; }
	if($sc2 > (strlen($characters) - 1)){ $sc2 = 0; $sc1++; }
	if($sc1 > (strlen($characters) - 1)){ $sc1 = (strlen($characters) - 1); }
	
	//  echo out for debugging purposes
	echo "\n<!-- Values: \n SC1: $sc1 \n SC2: $sc2 \n SC3: $sc3 \n SC4: $sc4 \n SC5: $sc5 \n SIZE: $size -->";
	
	//  Function to generate the image name and echo it out
	function genimgname($n1,$n2,$n3,$n4,$n5,$size,$characters){
		
		//  Build image name string from characters string location
		$imgname = substr($characters,$n1,1);
		$imgname .= substr($characters,$n2,1);
		$imgname .= substr($characters,$n3,1);
		$imgname .= substr($characters,$n4,1);
		$imgname .= substr($characters,$n5,1);
	
	  //  echo out for debugging purposes
		echo "$imgname.jpg -->\n";
		
		//  echo out image name
		echo "<a href='http://i.imgur.com/$imgname.jpg' target='_blank'><img src='http://i.imgur.com/$imgname.jpg' border='0' height='$size' width='$size'></a>";
		
	}
	
	//  Loop through entire characters string for the 5th character of the image name
	for($sc5 = 0; $sc5 <= (strlen($characters) - 1); $sc5++){
	  //echo out for debugging purposes
		echo "\n<!-- genimagename($sc1,$sc2,$sc3,$sc4,$sc5,$size,$characters) = ";
		genimgname($sc1,$sc2,$sc3,$sc4,$sc5,$size,$characters);
	}
	
	//  increase 4th character of the image name location
	$sc4++;
	
	//  Link to next page
	echo "<a href='imgur_gendb.php?location=$sc1,$sc2,$sc3,$sc4&size=$size'><img src='http://i.imgur.com/kstqS.png' border='0' width='$size' height='$size'></a>";
	
?>
