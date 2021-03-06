var currentPlayList = [];
var shufflePlayList = [];
var tempPlayList = [];
var currentIndex = 0;
var audioElement;
var mouseDown = false;
var repeat = false;
var shuffle = false;
function formatTime(seconds){
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60);
    var seconds = time - (minutes*60);

    var extraZero;
    if(seconds<10){
        extraZero="0";
    }else{
        extraZero="";
    }

    return minutes + ":" + extraZero + seconds;
}
function updateProgressBarTime(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime)); 
    var progress = (audio.currentTime / audio.duration)*100;
    $(".playbackBar .progress").css("width",progress+"%");

}
function updateProgressBarVolume(audio){
    var volume = audio.volume*100;
    $(".volumeBar .progress").css("width",volume+"%");

}
function Audio(){
    this.currentlyPlaying;
    this.audio = document.createElement('audio');
    this.audio.addEventListener("ended",function(){
        nextSong();
    });
    this.audio.addEventListener("canplay",function(){
        $(".progressTime.remaining").text(formatTime(this.duration));     
    });
    this.audio.addEventListener("timeupdate",function(){
           if(this.duration){
               updateProgressBarTime(this);
           }
    });
    this.audio.addEventListener("volumechange",function(){
        updateProgressBarVolume(this);
    });
    this.setTrack = function(track){
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }
    this.play = function(){
        this.audio.play();
    }
    this.pause = function(){
        this.audio.pause();
    }
    this.setTime = function(seconds){
        this.audio.currentTime = seconds;
    }
}