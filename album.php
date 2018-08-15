<?php 
   include('inc/header.php');
   
   if(isset($_GET['id'])){
       $albumId = $_GET['id'];
   }else{
       header("Location: index.php");
   }
   
   $album = new Album($con,$albumId);
   $artist = $album->getArtist();

?>
<div class="entityInfo">
    <div class="leftSection">
       <img src="<?php echo $album->getArtWorkPath(); ?>" alt="Art Work">
    </div>
    <div class="rightSection">
       <h2><?php echo $album->getTitle(); ?></h2>
       <span>By <?php echo $artist->getName(); ?></span>
       <br>
       <span><?php echo $album->getNumberofSongs(); ?> songs</span>
    </div>
</div>
<div class="trackListContainer">
    <ul class="trackList">
        <?php
            $songIdArray = $album->getSongsIds();
            $i=1;
            foreach($songIdArray as $songId){
                $albumSong = new Song($con,$songId);
                $albumArtist = $albumSong->getArtist();

                echo "<li class='trackListRow'>
                        <div class='trackCount'>
                           <img class='play' src='assets/images/icons/play-white.png'>
                           <span class='trackNumber'>$i<span>
                        </div>
                        <div class='trackInfo'>
                           <span class='trackName'>" .$albumSong->getTitle(). "<span>
                           <span class='artistName'>" .$albumArtist->getName(). "<span>
                        </div>
                        <div class='trackOptions'>
                           <img class='optionButton' src='assets/images/icons/more.png'>
                        </div>
                        <div class='trackDuration'>
                           <span class='duration'>" .$albumSong->getDuration(). "</span>
                        </div>
                     </li>";

                $i++;
                
            }
        
        ?>


    </ul>
</div>

<?php include('inc/footer.php'); ?>
