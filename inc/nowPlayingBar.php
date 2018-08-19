<?php
   $songQuery = mysqli_query($con,"SELECT id FROM songs ORDER BY RAND() LIMIT 10");
   $resultArray = array();
   while($row = mysqli_fetch_array($songQuery)){
       array_push($resultArray,$row['id']);
   }
   $jsonArray = json_encode($resultArray);
?>

<script>
    $(document).ready(function(){
        currentPlayList = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlayList[0],currentPlayList,false);

        //Music player control Bar
        $("#playbackBar .progressBar").mousedown(function(){
            mouseDown = true;
        });
        $("#playbackBar .progressBar").mousemove(function(e){
            if(mouseDown){
                timeFromOffset(e,this);
            }
        });
        $("#playbackBar .progressBar").mouseup(function(e){
                timeFromOffset(e,this);
        });

        //Music player control Bar
        $(".volumeBar .progressBar").mousedown(function(){
            mouseDown = true;
        });
        $(".volumeBar .progressBar").mousemove(function(e){
            if(mouseDown){
                var percentage = e.offsetX / $(this).width();
                if(percentage>=0 && percentage <=1){
                    audioElement.audio.volume = percentage;
                }
            }
        });
        $(".volumeBar .progressBar").mouseup(function(e){
            var percentage = e.offsetX / $(this).width();
            if(percentage>=0 && percentage <=1){
                audioElement.audio.volume = percentage;
            }
        });
        
        $(document).mouseup(function(){
            mouseDown = false;
        });

    });
    function timeFromOffset(mouse,progressBar){
        var percentage = (mouse.offsetX / $(this).width())*100;
        var seconds = audioElement.audio.duration*(percentage/100);
        audioElement.setTime(seconds);
    }
    function setTrack(trackId,newPlayList,play){
        //Ajax Req to get Song
        $.post("inc/handlers/ajax/getSongsJson.php",{songId : trackId}, function(data){
            let track = JSON.parse(data);
            $(".trackName span").text(track.title);
            //Ajax Req to get Artist
            $.post("inc/handlers/ajax/getArtistJson.php",{artistId : track.artist}, function(data){
             let artist = JSON.parse(data);
             $(".artistName span").text(artist.name);
            });
            //Ajax Req to get Album
            $.post("inc/handlers/ajax/getAlbumJson.php",{albumId : track.album}, function(data){
             let album = JSON.parse(data);
             $(".albumLink img").attr("src",album.artworkPath);
            });
            audioElement.setTrack(track);
            if(play){
               playSong();
            }
        });
        
        
    }
    function playSong(){
        audioElement.play();
        if(audioElement.audio.currentTime == 0){
            $.post("inc/handlers/ajax/updatePlaysJson.php",{songId : audioElement.currentlyPlaying.id});
        }
           

        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }
    function pauseSong(){
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
            <span class="albumLink">
                <img src="https://i.ytimg.com/vi/rb8Y38eilRM/maxresdefault.jpg" alt="" class="albumArt">
            </span>
            <div class="trackInfo">
                <span class="trackName">
                    <span></span>
                </span>
                <span class="artistName">
                    <span></span> 
                </span>
            </div>
            </div>
        </div>
        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button">
                        <img src="assets/images/icons/shuffle.png" alt="shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous Button">
                        <img src="assets/images/icons/previous.png" alt="previous">
                    </button>
                    <button class="controlButton play" title="Play Button" onClick="playSong()">
                        <img src="assets/images/icons/play.png" alt="play">
                    </button>
                    <button class="controlButton pause" title="Pause Button" style="display: none;" onClick="pauseSong()">
                        <img src="assets/images/icons/pause.png" alt="pause">
                    </button>
                    <button class="controlButton next" title="Next Button">
                        <img src="assets/images/icons/next.png" alt="next">
                    </button>
                    <button class="controlButton repeat" title="Repeat Button">
                        <img src="assets/images/icons/repeat.png" alt="repeat">
                    </button>
                </div>
                <div id="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress" style="padding: 1px; background-color: #a0a0a0;"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>
                </div>
            </div>
        </div>
        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume control">
                    <img src="assets/images/icons/volume.png" alt="repeat">
                </button>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>