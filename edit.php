<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$id = $Error = NULL;
	$flag = 0;
	$GTO = $Org = $FacName= $StaffName = $Activity = $Fdate = $TDate = $Loc = $TotalResPerson = $Target = $Purpose = $Res1_name = $Res1_Desig = $Res2_name = $Res2_Desig = $Res3_name = $Res3_Desig = $Res4_name = $Res4_Desig = $Res5_name = $Res5_Desig = $Res6_name = $Res6_Desig = $Res7_name = $Res7_Desig = $Res8_name = $Res8_Desig = $Res9_name = $Res9_Desig = $Res10_name = $Res10_Desig = NULL;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 
		else
		{
			if(isset($_POST['submit_eventID']))
			{
				if($_POST["event_id"] != "")
				{
					$flag = 1;
					$id=$_POST["event_id"];
					$sql="SELECT * FROM teacher WHERE ID = $id";
					$result=$conn->query($sql);
					if ($result->num_rows == 1) 
					{
						while($row = mysqli_fetch_assoc($result)) 
						{
							$GTO = $row["GoingOrganise"];
							$Org = $row["Organised"];
							$FacName = $row["Faculty_name"];
							$StaffName = $row["Staff_name"];
							$Activity = $row["Activity"];
							$Fdate = $row["Event_Fdate"];
							$TDate = $row["Event_Tdate"];
							$Loc = $row["Location"];
							$TotalResPerson = $row["TotalResPerson"];
							$Res1_name = $row["Res1_name"];
							$Res1_Desig = $row["Res1_Designation"];
							$Res2_name = $row["Res2_name"];
							$Res2_Desig = $row["Res2_Designation"];
							$Res3_name = $row["Res3_name"];
							$Res3_Desig = $row["Res3_Designation"];
							$Res4_name = $row["Res4_name"];
							$Res4_Desig = $row["Res4_Designation"];
							$Res5_name = $row["Res5_name"];
							$Res5_Desig = $row["Res5_Designation"];
							$Res6_name = $row["Res6_name"];
							$Res6_Desig = $row["Res6_Designation"];
							$Res7_name = $row["Res7_name"];
							$Res7_Desig = $row["Res7_Designation"];
							$Res8_name = $row["Res8_name"];
							$Res8_Desig = $row["Res8_Designation"];
							$Res9_name = $row["Res9_name"];
							$Res9_Desig = $row["Res9_Designation"];
							$Res10_name = $row["Res10_name"];
							$Res10_Desig = $row["Res10_Designation"];
							$Target = $row["Target_Audiance"];
							$Purpose = $row["Purpose"];
						}
						if($FacName==NULL)
						{
						$name1=$StaffName;
						$who="Staff";
						}
					    else
						{
						$name1=$FacName;
						$who="Faculty";
						}
					}
				}
				else
				{
					$Error = "This is a required field";
				}
			}
		}
		
	}
?>
<?php 



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
//declaration of variables
$faculty_name_Err=$staff_name_Err=$from_date_Err=$to_date_Err=$location_Err=$ResPerson_name_1_Err=$ResPerson_name_2_Err=$ResPerson_name_3_Err=$ResPerson_name_4_Err=$ResPerson_name_5_Err = NULL;
$ResPerson_name_6_Err=$ResPerson_name_7_Err=$ResPerson_name_8_Err=$ResPerson_name_9_Err=$ResPerson_name_10_Err = NULL;
$ResPerson_designation_1_Err=$ResPerson_designation_2_Err=$ResPerson_designation_3_Err=$ResPerson_designation_4_Err=$ResPerson_designation_5_Err = NULL;
$ResPerson_designation_6_Err=$ResPerson_designation_7_Err=$ResPerson_designation_8_Err=$ResPerson_designation_9_Err=$ResPerson_designation_10_Err = NULL;
$target = $purpose = NULL;
$Organised=$GTOrganised=$FacultyFlag = NULL;
$success = NULL;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	if(isset($_POST["submit"]))
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			$FacultyFlag = $_POST["select_staff"];

			//$staff = $_POST["select_staff"];
			if($FacultyFlag == "Faculty")
			{
				if($_POST["select_Activity"] == "STTP" || $_POST["select_Activity"] == "Workshop" || $_POST["select_Activity"] == "Conference" || $_POST["select_Activity"] == "FDP")
				{
					$data = array($GTOrganised,$Organised,$_POST["faculty_name"],NULL,$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],NULL,NULL);
				}
				else if ($_POST["select_Activity"] == "STTP" || $_POST["select_Activity"])
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
				else if ($_POST["select_Activity"] == "STTP" || $_POST["select_Activity"])
				{
					$data = array($GTOrganised,$Organised,NULL,$_POST["staff_name"],$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"],$_POST["target_audiance"],$_POST["Purpose"]);
				}
				//$data = array($GTOrganised,$Organised,NULL,$_POST["staff_name"],$_POST["select_Activity"],$_POST["from_date"],$_POST["to_date"],$_POST["location"],$_POST["resource_person"],$_POST["Res1_name"],$_POST["Res1_designation"],$_POST["Res2_name"],$_POST["Res2_designation"],$_POST["Res3_name"],$_POST["Res3_designation"],$_POST["Res4_name"],$_POST["Res4_designation"],$_POST["Res5_name"],$_POST["Res5_designation"],$_POST["Res6_name"],$_POST["Res6_designation"],$_POST["Res7_name"],$_POST["Res7_designation"],$_POST["Res8_name"],$_POST["Res8_designation"],$_POST["Res9_name"],$_POST["Res9_designation"],$_POST["Res10_name"],$_POST["Res10_designation"]);
			}
			//echo count($data);
			$sql = "UPDATE teacher SET Faculty_name='$data[2]',Staff_name='$data[3]',Activity='$data[4]',Event_Fdate='$data[5]',Event_Tdate='$data[5]',Location='$data[6]',TotalResPerson='$data[7]',Res1_name='$data[8]',Res1_Designation='$data[9]',Res2_name='$data[10]',Res2_Designation='$data[11]',Res3_name='$data[12]',Res3_Designation='$data[13]',Res4_name='$data[14]',Res4_Designation='$data[15]',Res5_name='$data[16]',Res5_Designation='$data[17]',Res6_name='$data[18]',Res6_Designation='$data[19]',Res7_name='$data[20]',Res7_Designation='$data[21]',Res8_name='$data[22]',Res8_Designation='$data[23]',Res9_name='$data[24]',Res9_Designation='$data[25]',Res10_name='$data[26]',Res10_Designation='$data[27]',Target_Audiance='$data[28]',Purpose='$data[29]' WHERE ID=$_POST[id]";  
			if ($conn->query($sql) === TRUE) 
			{
				$sql = "SELECT ID FROM teacher ORDER BY ID DESC LIMIT 1";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$success = "Your Event has been scheduled with event ID: ".$row["ID"]."<br>To submit another Response press the back Button.";
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
	</head>
	<body>
		<form action="edit.php" method="POST"> 
			Type of Organiser : <select onChange = "SelectFnc()" id="selectStaff" name = "select_staff" selected="<?php echo $who ?>"> 
				
				<option value = "Faculty"> Faculty </option>
				<option> Staff </option>
			</select><br><br>
			Faculty Name : <input type="text" name="faculty_name" id = "ipFaculty" value=<?php echo $FacName; ?> disabled><br><br>
			ID:<p id="pss" name="idd"><?php echo $id; ?>
			Staff Name : <input type="text" name="staff_name" id = "ipStaff" value=<?php echo $StaffName; ?> disabled><br><br>
			Activity : <select onChange = "SelectFncActivity()" id="selectActivity" name = "select_Activity" selected="<?php echo $Activity ?>" disabled> 
				<option> STTP </option>
				<option> Workshop </option>
				<option> Conference </option>
				<option> FDP </option>
				<option> Guest Lecture </option>
				<option> Industrial Visit </option>
			</select><br><br>
			****************************Event Details******************************<br><br>
			Date <br> From :  <input type = "date" name="from_date" id="fromdate" value=<?php echo $Fdate; ?>  disabled> To :  <input type = "date" name="to_date" id="todate" value=<?php echo $TDate; ?>  disabled><br><br>
			Location : <input type = "text" name="location" id="loctn" value=<?php echo $Loc; ?> disabled><br><br>
			**********************Co-ordinator Information*************************<br><br>
			
			Resource Person : <select onChange = "GetResourcePerson()" id="ResourcePerson" name = "resource_person" selected="<?php echo $TotalResPerson ?>" disabled>
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
			</select><br>
			
			<p class="class_p1" id="p1"  name = "Res1"> Ressource Person 1: </p>
			<p class="class_p1" id="p11"  name = "Res11"> Name : </p> <input class="class_ip1" id="ip11" type="text" name="Res1_name" value=<?php echo $Res1_name; ?>>
			<p class="class_p1" id="p12"  name = "Res12">    Designation/Organization : </p> <input class="class_ip1" id="ip12" type="text" name="Res1_designation" value=<?php echo $Res1_Desig; ?>>>
			
			<p class="class_p2" id="p2"  name = "Res2"> Ressource Person 2: </p>
			<p class="class_p2" id="p21"  name = "Res21"> Name : </p> <input class="class_ip2" id="ip21" type="text" name="Res2_name" value=<?php echo $Res2_name; ?>>
			<p class="class_p2" id="p22"  name = "Res22">    Designation/Organization : </p> <input class="class_ip2" id="ip22" type="text" name="Res2_designation" value=<?php echo $Res2_Desig; ?>>
			
			<p class="class_p3" id="p3"  name = "Res3"> Ressource Person 3: </p>
			<p class="class_p3" id="p31"  name = "Res31"> Name : </p> <input class="class_ip3" id="ip31" type="text" name="Res3_name" value=<?php echo $Res3_name; ?>>
			<p class="class_p3" id="p32"  name = "Res32">    Designation/Organization : </p> <input class="class_ip3" id="ip32" type="text" name="Res3_designation" value=<?php echo $Res3_Desig; ?>>
			
			<p class="class_p4" id="p4"  name = "Res4"> Ressource Person 4: </p>
			<p class="class_p4" id="p41"  name = "Res41"> Name : </p> <input class="class_ip4" id="ip41" type="text" name="Res4_name" value=<?php echo $Res4_name; ?>>
			<p class="class_p4" id="p42"  name = "Res42">    Designation/Organization : </p> <input class="class_ip4" id="ip42" type="text" name="Res4_designation" value=<?php echo $Res4_Desig; ?>>
			
			<p class="class_p5" id="p5"  name = "Res5"> Ressource Person 5: </p>
			<p class="class_p5" id="p51"  name = "Res51"> Name : </p> <input class="class_ip5" id="ip51" type="text" name="Res5_name" value=<?php echo $Res5_name; ?>>
			<p class="class_p5" id="p52"  name = "Res52">    Designation/Organization : </p> <input class="class_ip5" id="ip52" type="text" name="Res5_designation" value=<?php echo $Res5_Desig; ?>>
			
			<p class="class_p6" id="p6"  name = "Res6"> Ressource Person 6: </p>
			<p class="class_p6" id="p61"  name = "Res61"> Name : </p> <input class="class_ip6" id="ip61" type="text" name="Res6_name" value=<?php echo $Res6_name; ?>>
			<p class="class_p6" id="p62"  name = "Res62">    Designation/Organization : </p> <input class="class_ip6" id="ip62" type="text" name="Res6_designation" value=<?php echo $Res6_Desig; ?>>
			
			<p class="class_p7" id="p7"  name = "Res7"> Ressource Person 7: </p>
			<p class="class_p7" id="p71"  name = "Res71"> Name : </p> <input class="class_ip7" id="ip71" type="text" name="Res7_name" value=<?php echo $Res7_name; ?>>
			<p class="class_p7" id="p72"  name = "Res72">    Designation/Organization : </p> <input class="class_ip7" id="ip72" type="text" name="Res7_designation" value=<?php echo $Res7_Desig; ?>>
			
			<p class="class_p8" id="p8"  name = "Res8"> Ressource Person 8: </p>
			<p class="class_p8" id="p81"  name = "Res81"> Name : </p> <input class="class_ip8" id="ip81" type="text" name="Res8_name" value=<?php echo $Res8_name; ?>>
			<p class="class_p8" id="p82"  name = "Res82">    Designation/Organization : </p> <input class="class_ip8" id="ip82" type="text" name="Res8_designation" value=<?php echo $Res8_Desig; ?>>
			
			<p class="class_p9" id="p9"  name = "Res9"> Ressource Person 9: </p>
			<p class="class_p9" id="p91"  name = "Res91"> Name : </p> <input class="class_ip9" id="ip91" type="text" name="Res9_name" value=<?php echo $Res9_name; ?>>
			<p class="class_p9" id="p92"  name = "Res92">    Designation/Organization : </p> <input class="class_ip9" id="ip92" type="text" name="Res9_designation" value=<?php echo $Res9_Desig; ?>>
			
			<p class="class_p10" id="p10"  name = "Res10"> Ressource Person 10: </p>
			<p class="class_p10" id="p101"  name = "Res101"> Name : </p> <input class="class_ip10" id="ip101" type="text" name="Res10_name" value=<?php echo $Res10_name; ?>>
			<p class="class_p10" id="p102"  name = "Res102">    Designation/Organization : </p> <input class="class_ip10" id="ip102" type="text" name="Res10_designation" value=<?php echo $Res10_Desig; ?>>
			<br><br>
			Target Audiance :  <input type="text" id="targetAudiance" name="target_audiance" value=<?php echo $Target; ?> disabled><br><br>
			Purpose : <input type="text" id="purpose" name="Purpose" value=<?php echo $Purpose; ?> disabled><br><br>
			<input type="submit" name = "submit">
		</form>
		<form action = "mainpage.php" method="post">
			<input type="submit" name = "submit_back" value="Back">
		</form>
		<?php echo $success ?>
	</body>
</html>