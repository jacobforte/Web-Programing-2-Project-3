<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Some Title</title>
    </head>
    <body class="container-fuild">
        <?php include("php/header.php"); ?>
		<?php include_once("php/dbconnection.function.php"); ?>
		
		<?php
		
			if(isset($_GET['id'])){
				
				$id = $_GET['id'];
				
				
				$row = dbconnection("spSelectPosts(NULL, '$id')");
				
				$user = $row[0]['UID'];
				
				$row2 = dbconnection("spSelectUser('$user')");

		
			
		?>

        <main class="container-fuild col-sm-12 ">
		
			<h1><?php echo $row[0]['Title']; ?></h1>
		
			<div class="row" >
			
				<div class="container-fuild col-sm-10"  >
					
					<p><?php echo $row[0]['Message']; ?>
				
				</div>
				<div class="container-fuild col-sm-2" >
				
					
						
						<div class="row">
							<div class="container-fuild">
								<button onclick="" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-heart"></span>Add to Favorites List</button>
							</div>
						</div>
						<br></br>
						
						<div class="row">
						
							<div class="container-fuild">
								<ul class="list-group">
									<h2 class="list-group-item active">Post Details</h2>
									<li class="list-group-item"><strong>Date:</strong> <?php echo $row[0]['PostTime']; ?></li>
									<li class="list-group-item"><strong>Posted By:</strong> <?php echo $row2[0]['FirstName'];?> <?php echo $row2[0]['LastName'];?></li>
								</ul>
							</div>
						
						</div>
						
					
					
				</div>
			
			</div>
			<br></br>
			
				<h2>Travel Images</h2>
				<br></br>
				
			<div class="row">
				
				
				
					<?php
						
						$row3 = dbconnection("spSelectImages('$user')");
						
						foreach($row3 as $image){
					
					?>
					<div class="col-sm-2" style="padding-bottom: 10px; ">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<div class="thumbnail">
								<img src="travel-images/square-medium/<?php echo $image['Path'];  ?>" alt="database down">
							</div>
							<div>
								<p> <?php echo $image['Title'];  ?></p>
							</div>
							<div>
								<a href="#<?php //echo $image['ImageID']; ?>" class="btn btn-primary">View</a> <a href="#" class="btn btn-primary">Favorites</a>
							</div>
						</div>	
					</div>
					</div>
					
					<?php	}	?>

				
					
			</div>
				
			
			
			<?php	}
					else{
						
						echo '<div class="col-sm-12"><h1>No Post has been selected</h1></div>';
						
					}

			?>

        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>
