<?php include('inc/header.php'); ?>

<h1 class="pageHeadingBig">Musics You May Like</h1>
<div class="gridViewContainer">
	 <?php 
		 $albumQuery = mysqli_query($con,"SELECT * FROM albums ORDER BY RAND()");
		 while($row = mysqli_fetch_array($albumQuery)){
			 echo "<div class='gridViewItem'>
			        <a href='album.php?id=".$row['id']."'>
						<img src='".$row['artworkPath']."' >
						<div class='gridViewInfo'>"
							.$row['title'].
						"</div>
					</a>  
			      </div>";

		 }
	 ?>

</div>
<?php include('inc/footer.php'); ?>

			