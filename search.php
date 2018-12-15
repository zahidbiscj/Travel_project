

<!-- new code-->
<link rel="stylesheet" type="text/css" href="style.css">
<?php
$conn=mysqli_connect("localhost","root","","book");
$set=$_POST['search_name'];
$set2=$_POST['search_area'];
$set3=$_POST['search_source'];

if (!$conn)
{
	die('Could not connect: ' . mysql_error());
}

if (@$_POST['submit']=="SEARCH") 
	{
		if(empty($set))//if bname is empty
		{
			$src= "SELECT * FROM `bookinfo` WHERE location LIKE '%$set2%' AND src='$set3'";
			$result=mysqli_query($conn,$src);
			$count = mysqli_num_rows($result);

    	     if ($count==0) {
         	
				echo "NOT FOUND........";
							}
			else
				{
				
				?>
				<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>

    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];
			//$serial=(int)$serial;
			//echo $serial; 

           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";

		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />
			</form>

		<?php 
			echo "</td>";
			echo "</tr>";
			
       }
	

	 if ($count>0) 
	 {
				echo "<br/>";
          echo "</table>";
				?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
				
			}


		}// end of if bname is empty

//------------------------------------------------------------------------------------
		//if bname & location is empty
		elseif (empty($set) && empty($set2)) 
		{
			$src= "SELECT * FROM `bookinfo` WHERE src='$set3'";
			$result=mysqli_query($conn,$src);
			$count = mysqli_num_rows($result);
			if ($count==0) {
         	
				echo "NOT FOUND........";
			}
			else
			{
				
		?>
		<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];

           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
			
		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">

				<input type="submit" value="ADD" name="sub" />
				
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";
           
          
       }
	

	 	if ($count>0) 
	 		{
				echo "</table>";
				?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php

			}

			
		}// end of if bname and location is empty

		//---------------------------------------
		//starting of all input empty
		elseif (empty($set) && empty($set2) && empty($set3))
		{
			echo "NO INPUT";

		}//END OF ALL EMPTY
//-------------------------------------------------------------------------------------------------------
	//IF BNAME AND SOURCE IS EMPTY

		elseif(empty($set) && empty($set3))
			{
				$src= "SELECT * FROM `bookinfo` WHERE location LIKE'%$set2%'";
				$result=mysqli_query($conn,$src);
		        
		         $count = mysqli_num_rows($result);
		         if ($count==0) 
		         	{
						echo "NOT FOUND........";
					}
				else
					{
				
		?>
		<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];

           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
			
		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />	
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";  
       		}

			 if ($count>0) 
			 	{
					echo "</table>";
					?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
				}

			}//ENDING OF IF BOOK AND SOURCE IS EMPTY

	//-------------------------------------------------------------------------------------------------
	//IF LOCATION AND SOURCE IS EMPTY
		elseif (empty($set2) && empty($set3))
		{
			$src= "SELECT * FROM `bookinfo` WHERE bname LIKE '%$set%'";
			$result=mysqli_query($conn,$src);
	        
	         $count = mysqli_num_rows($result);
	         if ($count==0) {
	         	
					echo "NOT FOUND........";
		}
			else
			{
				
				?>
				<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];
			
           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />		
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";  
       		}
	

			 if ($count>0) 
			 {
				echo "</table>";
				?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
			 }
			}//ENDING OF IF LOCATION AND SOURCE IS EMPTY

	//-----------------------------------------------------------------------------------
	 //IF LOCATION IS EMPTY
		elseif (empty($set2))
		{
			$src= "SELECT * FROM `bookinfo` WHERE bname LIKE '%$set%' AND src='$set3'";
			$result=mysqli_query($conn,$src);
	         $count = mysqli_num_rows($result);
	         if ($count==0) 
	         	{
	         		echo "NOT FOUND........";
				}
			else
			{
				
		?>
		<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];
			
           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";  
       }
	
			 if ($count>0) 
			 {
						echo "</table>";
						?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
					}
			}// ENDING IF LOCATION IS EMPTY
			//----------------------------------------------------------------------
		 //IF SOURCE IS EMPTY
			elseif (empty($set3))
				{
			$src= "SELECT * FROM `bookinfo` WHERE bname LIKE '%$set%' AND location LIKE '%$set2%'";
			$result=mysqli_query($conn,$src);
        
	         $count = mysqli_num_rows($result);
	         if ($count==0) 
	         {
	       		echo "NOT FOUND........";
			 }
			else
			{
				
		?>
		<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];
			
           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
			
		?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";  
       		}
			 if ($count>0) 
			 	{
					echo "</table>";
					?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
				}
	}// ENDING OF SOUCE IS EMPTY

////////////////////////////////////////////////////////////
		else
		{//and of 3 condition
			$src= "SELECT * FROM `bookinfo` WHERE bname LIKE '%$set%' AND location LIKE '%$set2%' AND src='$set3'";
			$result=mysqli_query($conn,$src);
        	$count = mysqli_num_rows($result);
         if ($count==0) 
         	{
				echo "NOT FOUND........";
			}
			else
				{
				
		?>
		<h1 class="heading"><b>Readers Circle</b></h1>
				<table id="design">
			    	<tr>
			    		<th>Book Name</th>
			    		<th>Writer Name</th>
			    		<th>Location</th>
			    		<th>Phone</th>
			    		<th>Owner</th>
			    		<th>Email</th>
			    		<th>Resource</th>
			    		<th>Cart</th>
			    	</tr>
    <?php }

		while ($rows=mysqli_fetch_array($result))
		{
			$serial = array();
			$serial=$rows['id'];
			
           	echo "<tr>";
			echo "<td>";
			echo $rows['bname'];
			echo "</td>";
			echo "<td>";
			echo $rows['wname'];
			echo "</td>";
			echo "<td>";
			echo $rows['location'];
			echo "</td>";
			echo "<td>";
			echo $rows['phone'];
			echo "</td>";
			echo "<td>";
			echo $rows['owner'];
			echo "</td>";
			echo "<td>";
			echo $rows['email'];
			echo "</td>";
			echo "<td>";
			echo $rows['src'];
			echo "</td>";
			echo "<td>";
			
			
			?>
			<form method="post" id="nameform" action="cart.php">
				<input type="hidden" name="bkid" value="<?php echo $rows['id'];?>">
				<input type="submit" value="ADD" name="sub" />
			</form>

		<?php
			echo "</td>";
			echo "</tr>";
			echo "<br/>";          
       }

		 if ($count>0) 
		 	{
				echo "</table>";
				?>
			<form method="post" id="nameform" action="index.php">
				<input type="submit" value="Home" name="sub" class="button2" /><br>
			</form>
			<form method="post" id="nameform" action="cartlist.php">
				<input type="submit" value="Cart List" name="sub" class="button2" /><br>
			</form>

		<?php
			}
		}//3 condition and
	}
?>