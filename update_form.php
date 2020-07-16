<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FormUpdate</title>
	<link rel="stylesheet" href="./update_form.css">
</head>
<body>
	<?php
		$data=file_get_contents('food.txt');
		//convert to arr
		$data=json_decode($data);
		$ind=$_GET['ind'];
		echo $ind;
		foreach($data as $row){
			if($ind==$row->dcode){
				echo $row->dcode;
				$tday=$row->day;
				$tstarter=$row->starter;
				$tmcourse=$row->mcourse;
				$tdess=$row->dess;
				

			}
		}
		echo $tday;	
	?>

	<div class="update">
		<h1 id="heads"><span>Update Menu</span></h1>
		<form action="./update.php" method="POST">
		   	<b>Day:</b><input type="text" name="day" placeholder="<?php echo $tday?>"><br/>
			<b>Starter:</b><input type="text" name="starter" placeholder="<?php echo $tstarter?>"><br/>
			<b>Main course:</b><input type="text" name="mcourse" placeholder="<?php echo $tmcourse?>"><br/>
			<b>Dessert:</b><input type="text" name="dess" placeholder="<?php echo $tdess?>"><br/>
        	<input type="submit" value="UPDATE" name="save">
         	<a href="./food_menu.php"><p id="back" style="color: crimson;">Back to menu</p></a>
		</form>
	</div>

	<?php
		$ind=$_GET['ind'];
		//$tdcode=$_GET['dc'];
		/*Retrieve the URL variables (using PHP).
                    $num=$_GET['myNumber'];
                    $fruit=$_GET['myFruit'];
                    echo"Number:".$num." Fruit:".$fruit;
		*/

		if(isset($_POST['save'])){
			//set the updated values
			$input=array(
				'day'=>$_POST['day'],
				'starter'=>$_POST['starter'],
				'mcourse'=>$_POST['mcourse'],
				'dess'=>$_POST['dess']
			);
			//update selected index
			$data_array[$ind]=$input;
			//convert back to text file
			$data=json_encode($data_array,JSON_PRETTY_PRINT);
			file_put_contents('food.txt', $data);
			header('location:food.php');
    	}
	?>
	
</body>
</html>