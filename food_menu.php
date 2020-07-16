<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MENUCARD</title>
    <link rel="stylesheet" href="./food_menu.css">
</head>
<body>
    <table border="1" align="center">
        <thead style="background-color: cyan;">
            <th>Day</th>
            <th>Menu</th>
            <th>Do</th>
        </thead>
        <tbody>
        <?php
            //retrieve from food.txt
            $data=file_get_contents('food.txt');
            //convert to arr
            $data=json_decode($data);
            $ind=0;
            foreach($data as $row){
                echo "
                <tr>
                    <td>".$row->day."</td>
                    <td>".$row->starter."<br>--------------------<br>".$row->mcourse."<br>--------------------<br>".$row->dess."</td>
                    <td>
                        <a href='update_form.php?ind=".$ind."'>Update Menu</a>
                    </td>
                </tr>";
                $ind++;
            }
            //header("Location: ./update_form.php?day=".urlencode($row->dcode));
            //encode dcode to update menu
            //www.htmlexample.org/phpexample.php?varName=value&othervarName=othervalue
            //echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
            /*
            //PASSING VARIABLES VIA URL TO ANOTHER PAGE
                Inside "page1.php" or "page1.html":
                    // Send the variables myNumber=1 and myFruit="orange" to the new PHP page...
                    <a href="page2c.php?myNumber=1&myFruit=orange">Send variables via URL!</a> 
                    //OR as needed...
                    <a href='page2c.php?myNumber={$row[0]}&myFruit={$row[1]}'>Send variables</a>
                Inside "page2c.php":
                    // Retrieve the URL variables (using PHP).
                    $num=$_GET['myNumber'];
                    $fruit=$_GET['myFruit'];
                    echo"Number:".$num." Fruit:".$fruit;
            */
        ?>
        </tbody>
    </table>
    <?php
        //get index
        $ind=$_GET['ind'];
        //retrieve from food.txt
        $data=file_get_contents('food.txt');
        $data_array= json_decode($data);
        //assign data corr.to their index
        $row=$data_array[$ind];
    ?>

</body>
</html>