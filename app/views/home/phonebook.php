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
            <p>The Phone Book</p>
        </div>
		<form action="/home/filterPhonebook" method="post">
		 <div class="col-lg-12">
            <p>Filter Phone Book By Name</p>
			<input type="text" name="pname">
			<input type="submit" value="Submit">
        </div>
		
		</form>
    </div>

	<?php 
	$result = $data['book'];
	echo "<table class='table'>";
    echo "<thead>";
      echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Phone</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
	foreach($result as $row)
	{
		echo "<tr>";
		echo "<td> {$row['name']} </td>";
		echo "<td> {$row['phone']} </td>";
		echo "</tr>";
	}

    echo "</tbody>";
    echo "</table>";
	?>
    <?php require_once '../app/views/templates/footer.php' ?>
