<?php 

$name = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["submit_status"]))
	{
		if($_POST["Status"] == "Going to Organise")
			$name = "Going to Organise";
		else
			$name = "Organised";
	}
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
//declaration of variables
$Type_Err = $Facname_Err = $Staffname_Err = $date_Err = $location_Err = $target_Err = $purpose_Err = NULL;
$Type = $Facname = $Staffname = $Tdate =  $Fdate = $location = $target = $purpose = $Organised = $GTOrganised = $FacultyFlag = NULL;
$success = NULL;
$TypeFlag = True;
$data = NULL;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["submit"]))
		{
			$validFlag = true;
			if(!empty($_POST["faculty_name"]))
				$Facname = $_POST["faculty_name"];
			if(!empty($_POST["staff_name"]))
				$Staffname = $_POST["staff_name"];
			if(!empty($_POST["from_date"]))
				$Fdate = $_POST["from_date"];
			if(!empty($_POST["to_date"]))
				$Tdate = $_POST["to_date"];
			if(!empty($_POST["location"]))
				$location = $_POST["location"];
			if(!empty($_POST["Target_Audiance"]))
				$target = $_POST["Target_Audiance"];
			if(!empty($_POST["Purpose"]))
				$purpose = $_POST["Purpose"];
			if(empty($_POST["select_staff"]))
			{
				$validFlag = false;
				$Type_Err = "This is a Required Field";
			}
			else
			{
				$FacultyFlag = $_POST["select_staff"];
			}
			
			if($FacultyFlag == "Faculty" && empty($_POST["faculty_name"]))
			{
				$validFlag = false;
				$Facname_Err =  "This is a Required Field";
			}

			if($FacultyFlag == "Staff" && empty($_POST["staff_name"]))
			{
				$validFlag = false;
				$Staffname_Err =  "This is a Required Field";
			}
			

			if(empty($_POST["from_date"]) || empty($_POST["to_date"])) 	
			{
				$validFlag = false;
				$date_Err = "This is a Required Field";
			}

			if(empty($_POST["location"]))
			{
				$validFlag = false;
				$location_Err = "This is a Required field";
			}

			if(($_POST["select_Activity"] == "Industrial Visit" || $_POST["select_Activity"] == "Guest Lecture" ) && empty($_POST["target_audiance"]))
			{
				$target_Err = "This is a Required field";
				$validFlag = false;
			}
			
			if(($_POST["select_Activity"] == "Industrial Visit" || $_POST["select_Activity"] == "Guest Lecture" ) && empty($_POST["Purpose"]))
			{
				$purpose_Err = "This is a Required field";
				$validFlag = false;
			}

			if($name == "Organised")
			{
				$Organised = "YES";
				$GTOrganised = "NO"; 
			}
			else
			{
				$Organised = "NO";
				$GTOrganised = "YES"; 
			}
			if($validFlag)
			{
				//$staff = $_POST["select_staff"];
				if($FacultyFlag == "Faculty")
				{
					if($_POST["select_Activity"] == "STTP" || $_POST["select_Activity"] == "Workshop" || $_POST["select_Activity"] == "Conference" || $_POST["select_Activity"] == "FDP")
					{
						$data = array($GTOrganised,$Organised,$_POST["faculty_name"],NULL,$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],NULL,NULL);
					}
					else if (($_POST["select_Activity"] == "Guest Lecture" || $_POST["select_Activity"] == "Industrial Visit"))
					{
						$data = array($GTOrganised,$Organised,$_POST["faculty_name"],NULL,$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],$_POST["target_audiance"],$_POST["Purpose"]);
					}
				}
				else if($FacultyFlag=="Staff")
				{
					if($_POST["select_Activity"] == "STTP" || $_POST["select_Activity"] == "Workshop" || $_POST["select_Activity"] == "Conference" || $_POST["select_Activity"] == "FDP")
					{
						$data = array($GTOrganised,$Organised,NULL,$_POST["staff_name"],$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],NULL,NULL);
					}
					else if (($_POST["select_Activity"] == "Guest Lecture" || $_POST["select_Activity"] == "Industrial Visit"))
					{
						$data = array($GTOrganised,$Organised,NULL,$_POST["staff_name"],$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],$_POST["target_audiance"],$_POST["Purpose"]);
					}
					//$data = array($GTOrganised,$Organised,NULL,$_POST["staff_name"],$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"]);
				}
				//echo count($data);
				$sql = "INSERT into teacher (GoingOrganise,Organised,Faculty_name,Staff_name,Activity,Event_Fdate,Event_Tdate,Location,TotalResPerson,Res1_name,Res1_Designation,Res2_name,Res2_Designation,Res3_name,Res3_Designation,Res4_name,Res4_Designation,Res5_name,Res5_Designation,Res6_name,Res6_Designation,Res7_name,Res7_Designation,Res8_name,Res8_Designation,Res9_name,Res9_Designation,Res10_name,Res10_Designation,Target_Audiance,Purpose) VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]')";  
				if ($conn->query($sql) === TRUE) 
				{
					$sql = "SELECT ID FROM teacher ORDER BY ID DESC LIMIT 1";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							//header("location:mainpage.php");
							$success = "Your Event has been scheduled with event ID: ".$row["ID"]."<br>To submit another Response press the back Button.";
							//echo $success;
							
						}
					}
					//$success = "Your Event has been scheduled.\n To submit another Response press the back Button.";
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
	}
}
?>

<html>
	<head>
		<title>
			<?php
				echo $name;
			?>
		</title>
		<style>
		.class_p1,.class_p2,.class_p3,.class_p4,.class_p5,.class_p6,.class_p7,.class_p8,.class_p9,.class_p10,.class_ip1,.class_ip2,.class_ip3,.class_ip4,.class_ip5,.class_ip6,.class_ip7,.class_ip8,.class_ip9,.class_ip10{
			display:none;
		}
		</style>
		<script>
			function SelectFnc()
			{
				var selection = document.getElementById("selectStaff").value;
				
				if(selection == "Faculty")
				{
					document.getElementById("ipFaculty").disabled = false;
					document.getElementById("ipStaff").disabled = true;
					document.getElementById("selectActivity").disabled = false;
					document.getElementById("fromdate").disabled = false;
					document.getElementById("todate").disabled = false;
					document.getElementById("loctn").disabled = false;
					document.getElementById("ResourcePerson").disabled = false;
				}
				else if(selection == "Staff")
				{
					document.getElementById("ipFaculty").disabled = true;
					document.getElementById("ipStaff").disabled = false;
					document.getElementById("selectActivity").disabled = false;
					document.getElementById("fromdate").disabled = false;
					document.getElementById("todate").disabled = false;
					document.getElementById("loctn").disabled = false;
					document.getElementById("ResourcePerson").disabled = false;
				}
			}
			
			function SelectFncActivity()
			{
				var selection = document.getElementById("selectActivity").value;
				
				if(selection == "STTP" || selection == "Workshop" || selection == "Conference" || selection == "FDP")
				{
					document.getElementById("targetAudiance").disabled = true;
					document.getElementById("purpose").disabled = true;
				}
				else if(selection == "Guest Lecture" || selection == "Industrial Visit")
				{
					document.getElementById("targetAudiance").disabled = false;
					document.getElementById("purpose").disabled = false;
				}
			}
			function GetResourcePerson()
			{
				var number = document.getElementById("ResourcePerson").value;
				var n;
				var i;
				for(n = 0;n<10;n++)
				{
					document.getElementById('p'+(n+1)).style.display = "none";
					for(i = 0;i<2;i++)
					{	
						document.getElementById('p'+(n+1)+(i+1)).style.display = "none";
						document.getElementById('ip'+(n+1)+(i+1)).style.display = "none";
					}
				}
				var m;
				var j;
				for(m = 0;m<number;m++)
				{
					document.getElementById('p'+(m+1)).style.display = "block";
					for(j = 0;j<2;j++)
					{	
						document.getElementById('p'+(m+1)+(j+1)).style.display = "inline";
						document.getElementById('ip'+(m+1)+(j+1)).style.display = "inline";
					}
				}
			}
			</script>
			<link rel="stylesheet" type="text/css" href="append.css">
	</head>
	<body>
	<div id="div1">
	<table>
	<tr>
	<td><img src="logo_2.png" id="logo"></td>
	<td id="td1"><p id="psom">K.J.Somaiya College of engineering</p></td>
	<td><img src="trust_logo" id="trustlogo"></td>
	
	</table>
	</div>
	<table id="t2" ALIGN="center" cellspacing="17">
	<tr>
	<td class="tdc1"><a class="tdc1" href="mainpage.php">HOME</a></td>
	<td class="tdc1"><a class="tdc1" href="event.php">EVENTS</a></td>
	<td class="tdc1"><a class="tdc1" href="library.php">LIBRARY</a></td>
	<td class="tdc1"><a class="tdc1" href="eventorg.php">SCHEDULE EVENTS</td>
	</tr>
	</table>
	<br>
	<div id="div2">
	<div id="div3">
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> 
			<p class="pgrp">Type of Organiser</p> <select onChange = "SelectFnc()" id="selectStaff" name = "select_staff"> 
				<option value = "Faculty"> Faculty </option>
				<option> Staff </option>
			</select><span style="color:red;"> * <?php echo $Type_Err; ?> </span><br>
			<p class="pgrp">Faculty Name</p> <input type="text" placeholder="Enter the Faculty Name"name="faculty_name" id = "ipFaculty" value = "<?php echo $Facname ?>"><span style="color:red;"> * <?php echo $Facname_Err; ?> </span><br><br>
				
			<p class="pgrp">Staff Name</p>  <input type="text" placeholder="Enter the Staff Name"name="staff_name" id = "ipStaff" value = "<?php echo $Staffname ?>" disabled><span style="color:red;"> * <?php echo $Staffname_Err; ?> </span><br><br>
			<p class="pgrp">Activity</p>  <select onChange = "SelectFncActivity()" id="selectActivity" name = "select_Activity"> 
				<option> STTP </option>
				<option> Workshop </option>
				<option> Conference </option>
				<option> FDP </option>
				<option> Guest Lecture </option>
				<option> Industrial Visit </option>
			</select><span style="color:red;"> * </span><br><br>
			<p class="pgrp2">Event Details</p>
			<p class="pgrp">Date</p> <input placeholder="From" type = "date" name="from_date" id="fromdate" value = "<?php echo $Fdate ?>" > <input  placeholder="To" type = "date" name="to_date" id="todate" value = "<?php echo $Tdate ?>"><span style="color:red;"> * <?php echo $date_Err; ?> </span><br><br>
			<input placeholder="Enter the Location" type = "text" name="location" id="loctn" value = "<?php echo $location ?>"><span style="color:red;"> * <?php echo $location_Err; ?> </span><br><br>
			<p class="pgrp2">Co-ordinator Information</p>
			
			<p class="pgrp">Resource Person</p>  <select onChange = "GetResourcePerson()" id="ResourcePerson" name = "resource_person">
			<option> 0 </option>
			<option> 1 </option>
			<option> 2 </option>
			<option> 3 </option>
			<option> 4 </option>
			<option> 5 </option>
			<option> 6 </option>
			<option> 7 </option>
			<option> 8 </option>
			<option> 9 </option>
			<option> 10 </option>
			</select><span style="color:red;"> * </span><br>
			
			<p class="class_p1" id="p1"  name = "Res1"> Ressource Person 1: </p>
			<p class="class_p1" id="p11"  name = "Res11"> Name : </p> <input class="class_ip1" id="ip11" type="text" name="Res1_name">
			<p class="class_p1" id="p12"  name = "Res12">    Designation/Organization : </p> <input class="class_ip1" id="ip12" type="text" name="Res1_designation">
			
			<p class="class_p2" id="p2"  name = "Res2"> Ressource Person 2: </p>
			<p class="class_p2" id="p21"  name = "Res21"> Name : </p> <input class="class_ip2" id="ip21" type="text" name="Res2_name">
			<p class="class_p2" id="p22"  name = "Res22">    Designation/Organization : </p> <input class="class_ip2" id="ip22" type="text" name="Res2_designation">
			
			<p class="class_p3" id="p3"  name = "Res3"> Ressource Person 3: </p>
			<p class="class_p3" id="p31"  name = "Res31"> Name : </p> <input class="class_ip3" id="ip31" type="text" name="Res3_name">
			<p class="class_p3" id="p32"  name = "Res32">    Designation/Organization : </p> <input class="class_ip3" id="ip32" type="text" name="Res3_designation">
			
			<p class="class_p4" id="p4"  name = "Res4"> Ressource Person 4: </p>
			<p class="class_p4" id="p41"  name = "Res41"> Name : </p> <input class="class_ip4" id="ip41" type="text" name="Res4_name">
			<p class="class_p4" id="p42"  name = "Res42">    Designation/Organization : </p> <input class="class_ip4" id="ip42" type="text" name="Res4_designation">
			
			<p class="class_p5" id="p5"  name = "Res5"> Ressource Person 5: </p>
			<p class="class_p5" id="p51"  name = "Res51"> Name : </p> <input class="class_ip5" id="ip51" type="text" name="Res5_name">
			<p class="class_p5" id="p52"  name = "Res52">    Designation/Organization : </p> <input class="class_ip5" id="ip52" type="text" name="Res5_designation">
			
			<p class="class_p6" id="p6"  name = "Res6"> Ressource Person 6: </p>
			<p class="class_p6" id="p61"  name = "Res61"> Name : </p> <input class="class_ip6" id="ip61" type="text" name="Res6_name">
			<p class="class_p6" id="p62"  name = "Res62">    Designation/Organization : </p> <input class="class_ip6" id="ip62" type="text" name="Res6_designation">
			
			<p class="class_p7" id="p7"  name = "Res7"> Ressource Person 7: </p>
			<p class="class_p7" id="p71"  name = "Res71"> Name : </p> <input class="class_ip7" id="ip71" type="text" name="Res7_name">
			<p class="class_p7" id="p72"  name = "Res72">    Designation/Organization : </p> <input class="class_ip7" id="ip72" type="text" name="Res7_designation">
			
			<p class="class_p8" id="p8"  name = "Res8"> Ressource Person 8: </p>
			<p class="class_p8" id="p81"  name = "Res81"> Name : </p> <input class="class_ip8" id="ip81" type="text" name="Res8_name">
			<p class="class_p8" id="p82"  name = "Res82">    Designation/Organization : </p> <input class="class_ip8" id="ip82" type="text" name="Res8_designation">
			
			<p class="class_p9" id="p9"  name = "Res9"> Ressource Person 9: </p>
			<p class="class_p9" id="p91"  name = "Res91"> Name : </p> <input class="class_ip9" id="ip91" type="text" name="Res9_name">
			<p class="class_p9" id="p92"  name = "Res92">    Designation/Organization : </p> <input class="class_ip9" id="ip92" type="text" name="Res9_designation">
			
			<p class="class_p10" id="p10"  name = "Res10"> Ressource Person 10: </p>
			<p class="class_p10" id="p101"  name = "Res101"> Name : </p> <input class="class_ip10" id="ip101" type="text" name="Res10_name">
			<p class="class_p10" id="p102"  name = "Res102">    Designation/Organization : </p> <input class="class_ip10" id="ip102" type="text" name="Res10_designation">
			<br><br>
			<p class="pgrp">Target Audiance</p>   <input type="text" id="targetAudiance" name="target_audiance" value = "<?php echo $target ?>" disabled><span style="color:red;"> * <?php echo $target_Err;?> </span>  <br><br>
			<p class="pgrp">Purpose</p>  <input type="text" id="purpose" name="Purpose" value = "<?php echo $purpose ?>" disabled><span style="color:red;" > * <?php echo $purpose_Err; ?> </span> <br><br>
			<input class="cl3" type="submit" name = "submit">
		</form>
		<form action = "<?php echo htmlspecialchars("mainpage.php");?>" method="post">
			<input class="cl3" type="submit" name = "submit_back" value="Back">
		</form>
		<?php echo $success; ?>
		</div>
		</div>
		<div ALIGN="left">
<p class="divassign" id="downp">K. J. Somaiya College of Engineering<br>
Vidyanagar, Vidyavihar(E), Mumbai - 400 077, Maharashtra.<br>
Phone 91-22-66449191<br>
Fax : 91-22-21025272</p>
</div>
<div ALIGN="right">
<p class="divassign">Website : www.somaiya.edu/vidyavihar/kjsce/<br>
Email : enquiry@engg.somaiya.edu</p>
</div>
		
		
	</body>
</html>