function Audio(){
    this.currentPlaying;
    this.audio = document.createElement('audio');

    this.getTrack = function(src){
        this.audio.src = src;
    }
}