<?php require_once '../app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?=$_SESSION['name']?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p>Your Staff Members</p>
        </div>
		<form action="/managerhome/filterMembers" method="post">
		 <div class="col-lg-12">
            <p>Filter Members By Age</p>
			<select name="age">
				<option value="greater">Greater Than 30</option>
				<option value="less">Less Than 30</option>
			</select>
			<input type="submit" value="Submit">
        </div>
		
		</form>
    </div>

	<?php 
	$members = $data['members'];
	echo "<table class='table'>";
    echo "<thead>";
      echo "<tr>";
        echo "<th>Name</th>";
		echo "<th>Email</th>";
        echo "<th>Phone</th>";
		echo "<th>DOB</th>";
        echo "<th>City</th>";
		echo "<th>Province</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
	foreach($members as $row)
	{
		echo "<tr>";
		echo "<td> {$row['name']} </td>";
		echo "<td> {$row['email']} </td>";
		echo "<td> {$row['phone']} </td>";
		echo "<td> {$row['dob']} </td>";
		echo "<td> {$row['city']} </td>";
		echo "<td> {$row['provincename']} </td>";
		echo "</tr>";
	}
    echo "</tbody>";
    echo "</table>";
	?>
    <?php require_once '../app/views/templates/footer.php' ?>
