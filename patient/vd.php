<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styledoc.css">
        
    </head>
    <body>
    	<div class="abid">
        <nav class="navdoc">
                <ul>            
                            
                    <li><a class="home" href="index.php">Home</a></li>
                    <li><a class="about" href="about.php">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#news">News Update</a></li>
                   
                    </ul>
                  }

            </nav>
    	<?php
          include ("dbconnect.php");
        ?>
        <table>
            <th>Doctor Name</th>
            <th>Mobile</th>
            <th>Specialist</th>
             <?php
            $sql="SELECT name,mobile,specialist from doctor";
            $query=mysqli_query($conn,$sql);
            while($info=mysqli_fetch_array($query)){
              ?>
                <tr>
                    <td><?php echo $info['name']; ?> </td>
                    <td><?php echo $info['mobile']; ?> </td>
                    <td><?php echo $info['specialist']; ?> </td>
                </tr>  
           <?php
            }
            ?>
            
            
        </table>   
        </div> 
    </body>
 </html> 	