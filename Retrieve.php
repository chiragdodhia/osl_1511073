
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$id = $Error = NULL;
	$flag = 0;
	$FileUploadErr = NULL;
	$FacName= $NameDesignation = $Activity = $TotalResPerson = $Res_name = $Res_Desig = NULL;
	$Permission = $BrochureAttendance = $Report = $Certificate = NULL;
	$success  = False;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 
		if($id == NULL && isset($_POST['submit']))
		{
			$id=$_POST["event_id"];
		}
		else if(isset($_POST['submit_file']))
		{
			$Upload = true;
			$id = $_POST['event_id'];
			$sql="SELECT * FROM teacher WHERE ID = $id";
			$result=$conn->query($sql);
			while($row = mysqli_fetch_assoc($result))
			{
				$Permission = $row["PermissionLetter"];
				$Report = $row["Report"];
				$Certificate = $row["Certificate"];
				$BrochureAttendance = $row["BrochureAttendance"];
			}
			if($_FILES['Permission_copy']['name'] != NULL && $_POST["event_id"] != NULL && $Permission == NULL)
			{
				$name     = $_FILES['Permission_copy']['name'];
	            $tmpName  = $_FILES['Permission_copy']['tmp_name'];
	            $error    = $_FILES['Permission_copy']['error'];
	            $size     = $_FILES['Permission_copy']['size'];
	            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	            $valid = true;
		        //validate file extensions
		        if ( !in_array($ext, array('jpg','jpeg','png','gif','pdf','txt','doc','docx')) ) {
		            $valid = false;
		            $response = 'Invalid file extension.';
		        }
		        //validate file size
		        if ( $size/1024/1024 > 2 ) {
		            $valid = false;
		            $response = 'File size is exceeding maximum allowed size.';
		            echo $response;
		        }
		        //upload file
		        if ($valid) {
		            $targetPath = "uploads/PermissionLetter_".$id.".".$ext;
		            move_uploaded_file($tmpName,$targetPath);
		            $sql= "UPDATE  teacher SET PermissionLetter = '$targetPath' WHERE ID = $id";
		            mysqli_query($conn,$sql);
		        }
        	}
        	if($_FILES['Certificate']['name'] != NULL && $_POST["event_id"] != NULL && $Certificate == NULL)
			{
				$name     = $_FILES['Certificate']['name'];
	            $tmpName  = $_FILES['Certificate']['tmp_name'];
	            $error    = $_FILES['Certificate']['error'];
	            $size     = $_FILES['Certificate']['size'];
	            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	            $valid = true;
		        //validate file extensions
		        if ( !in_array($ext, array('jpg','jpeg','png','gif','pdf','txt','doc','docx')) ) {
		            $valid = false;
		            $response = 'Invalid file extension.';
		        }
		        //validate file size
		        if ( $size/1024/1024 > 2 ) {
		            $valid = false;
		            $response = 'File size is exceeding maximum allowed size.';
		            echo $response;
		        }
		        //upload file
		        if ($valid) {
		            $targetPath = "uploads/Certificate_".$id.".".$ext;
		            move_uploaded_file($tmpName,$targetPath);
		            $sql= "UPDATE  teacher SET Certificate = '$targetPath' WHERE ID = $id";
		            mysqli_query($conn,$sql);
		        }
        	}
        	if($_FILES['Report']['name'] != NULL && $_POST["event_id"] != NULL && $Report == NULL)
			{
				$name     = $_FILES['Report']['name'];
	            $tmpName  = $_FILES['Report']['tmp_name'];
	            $error    = $_FILES['Report']['error'];
	            $size     = $_FILES['Report']['size'];
	            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	            $valid = true;
		        //validate file extensions
		        if ( !in_array($ext, array('jpg','jpeg','png','gif','pdf','txt','doc','docx')) ) {
		            $valid = false;
		            $response = 'Invalid file extension.';
		        }
		        //validate file size
		        if ( $size/1024/1024 > 2 ) {
		            $valid = false;
		            $response = 'File size is exceeding maximum allowed size.';
		            echo $response;
		        }
		        //upload file
		        if ($valid) {
		            $targetPath = "uploads/Report_".$id.".".$ext;
		            move_uploaded_file($tmpName,$targetPath);
		            $sql= "UPDATE  teacher SET Report = '$targetPath' WHERE ID = $id";
		            mysqli_query($conn,$sql);
		        }
        	}
        	if($_FILES['Brochure']['name'] != NULL && $_POST["event_id"] != NULL  && $BrochureAttendance == NULL)
			{
				$name     = $_FILES['Brochure']['name'];
	            $tmpName  = $_FILES['Brochure']['tmp_name'];
	            $error    = $_FILES['Brochure']['error'];
	            $size     = $_FILES['Brochure']['size'];
	            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	            $valid = true;
		        //validate file extensions
		        if ( !in_array($ext, array('jpg','jpeg','png','gif','pdf','txt','doc','docx')) ) {
		            $valid = false;
		            $response = 'Invalid file extension.';
		        }
		        //validate file size
		        if ( $size/1024/1024 > 2 ) {
		            $valid = false;
		            $response = 'File size is exceeding maximum allowed size.';
		            echo $response;
		        }
		        //upload file
		        if ($valid) {
		            $targetPath = "uploads/Brochure_".$id.".".$ext;
		            move_uploaded_file($tmpName,$targetPath);
		            $sql= "UPDATE  teacher SET BrochureAttendance = '$targetPath' WHERE ID = $id";
		            mysqli_query($conn,$sql);
		        }
        	}
        	if($Permission == NULL || $BrochureAttendance == NULL || $Certificate == NULL || $Report == NULL)
        	{
				$flag = 1;	
        		$FileUploadErr = "Some files are not Selected.";
        	}
		}
		else if(isset($_POST['submit_file1']))
		{

		}

	}
?>
<html>
<!--<link rel="stylesheet" type="text/css" href="Style.css">-->
<link rel="stylesheet" type="text/css" href="append.css">
	<head>
		<title>
			Organised Events
		</title>
		<style>
		.c1
		{
			display:none;
		}
		</style>
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
		<form action="retrieve.php" method = "POST" enctype="multipart/form-data">
			<br>	
			<p class="pgrp">Please Enter the Event ID </p><input type="text" id="eventID" name="event_id" value = "<?php echo $id;?>" ><span style="color:Red" autofocus> * <?php echo $Error; ?></span><br><br>
			<input class="cl3" type = "submit" name="submit" value="Submit"><br><br>
			
			<?php 
			if($id != NULL)
			{
				echo '
				<label class="pgrp"> Event Details :  </label><br><br>
				<table class="tableret">
				<tr class="tr1">
					<th class="bordertd"> Event ID </th>
					<th class="bordertd"> Event Status</th>
					<th class="bordertd"> Name </th>
					<th class="bordertd"> Designation</th>
					<th class="bordertd"> Activity Name </th>
					<th class="bordertd"> From Date/time </th>
					<th class="bordertd"> To Date/Time </th>
					<th class="bordertd"> Location </th>
					<th class="bordertd"> Target Audiance </th>
					<th class="bordertd"> Purpose </th>
				</tr>';
				
				
				$sql="SELECT * FROM teacher WHERE ID = $id";
				$result=$conn->query($sql);
				while($row = mysqli_fetch_assoc($result))
				{
					//echo $id;
					$status = NULL;
					$Activity = $row["Activity"];
					$TotalResPerson = $row["TotalResPerson"];
					if($row["GoingOrganise"] == "YES")
						$status = "Going To Organise";
					else if ($row["Organised"] == "YES")
						$status = "Organised";
					if($row["Faculty_name"] == "")
					{
						$FacName = $row["Staff_name"];
						$NameDesignation = "Staff";
					}
					else if($row["Staff_name"] == "")
					{
						$FacName = $row["Faculty_name"];
						$NameDesignation = "Faculty";
					}
					echo '<tr class="tr1">
						<td class="bordertd"> '. $row["ID"] .'</td>
						<td class="bordertd"> '. $status .'</td>
						<td class="bordertd"> '. $FacName .'</td>
						<td class="bordertd"> '. $NameDesignation .' </td>
						<td class="bordertd"> '.	$Activity.'</td>
						<td class="bordertd"> '.$row["Event_Fdate"].'</td>
						<td class="bordertd">  '.$row["Event_Tdate"].' </td>
						<td class="bordertd">  '.$row["Location"].'  </td>
						<td class="bordertd">  '.$row["Target_Audiance"].'  </td>
						<td class="bordertd">  '.$row["Purpose"].'  </td>
						</tr>
					</table><br>';
					if($TotalResPerson > 0)
					{
						echo '<p class="pgrp">Resource Person Details</p><br>
							  <label style="font-weight : bold;"> Total Number : '.$TotalResPerson.' </label><br><br>';
							  for($i = 1 ; $i <= $TotalResPerson;$i++)
							  {
							  	$Res_name = "Res".$i."_name";
							  	$Res_Desig = "Res".$i."_Designation";
							  	echo '<label style="font-weight : bold;"> Resource Person '.$i.' </label><br>
							  		<label>'.$row[$Res_name].','.$row[$Res_Desig].'</label><br><br>
							  	';
							  }


					}
					if($Activity == "STTP" || $Activity == "Workshop" ||$Activity == "Conference" || $Activity == "FDP")
					{
						echo '<p class="pgrp">Kindly Attach the Following Documents.</p><br>';
						if(!empty($row["PermissionLetter"]))
						{
							echo '<a href="'.$row["PermissionLetter"].'" name = "Permission_copy"> Permission Letter </a><br><br>';
						}
						else
						{
							echo 'Attach Permission Letter Copy  : <input type="file" name="Permission_copy" value="nayan"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["Certificate"]))
						{
							echo '<a href="'.$row["Certificate"].'"  name = "Certificate"> Certificate </a><br><br>';
						}
						else
						{
							echo 'Certificate copy : <input type="file" name="Certificate" id="Certificate_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["Report"]))
						{
							echo '<a href="'.$row["Report"].'" name = "Report"> Report </a><br><br>';
						}
						else
						{
							echo 'Report copy : <input type="file" name="Report" id="Report_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["BrochureAttendance"]))
						{
							echo '<a href="'.$row["BrochureAttendance"].'" name = "Brochure"> Brochure </a><br><br>';
						}
						else
						{
							echo 'Brochure : <input type="file" name="Brochure" id="Brochure_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						echo '<input class="cl3" type = "submit" name="submit_file" value="Upload"><span style="color:Red" autofocus></span><br><br>';
									
					}
					else if($Activity == "Guest Lecture" || $Activity == "Industrial Visit")
					{
						echo '<p class="pgrp">Kindly Attach the Following Documents.</p><br>';
						if(!empty($row["PermissionLetter"]))
						{
							echo '<a href="'.$row["PermissionLetter"].'" name = "Permission_copy"> Permission Letter </a><br><br>';
						}
						else
						{
							echo 'Permission Letter : <input type="file" name="Permission_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["Certificate"]))
						{
							echo '<a href="'.$row["Certificate"].'" name = "Certificate"> Certificate </a><br><br>';
						}
						else
						{
							echo 'Certificate : <input type="file" name="Certificate" id="Certificate_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["Report"]))
						{
							echo '<a href="'.$row["Report"].'" name = "Report"> Report </a><br><br>';
						}
						else
						{
							echo 'Report : <input type="file" name="Report" id="Report_copy"><span style="color:Red" autofocus>*</span><br><br>';
						}
						if(!empty($row["BrochureAttendance"]))
						{
							echo '<a href="'.$row["BrochureAttendance"].'" name = "Brochure"> Attendance </a><br><br>';
						}
						else
						{
							echo 'Attendance Letter : <input type="file" name="Brochure"><span style="color:Red" autofocus>*</span><br><br>';
						}
						echo '<input class="cl3" type = "submit" name="submit_file" value = "Upload"><span style="color:Red" autofocus></span><br><br>';			
					}
				}
			}
			else
			{
				$Error = "This is a required field";
			}
		?>
		<form action = "<?php echo htmlspecialchars("mainpage.php");?>" method="post">
			<input class="cl3" type="submit" name = "submit_back" value="Back">
		</form>
		</form>
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