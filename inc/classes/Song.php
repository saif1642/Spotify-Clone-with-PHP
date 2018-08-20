<?php
   
    class Song 
    {
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $albumId;
        private $mysqliData;
        private $duration;
        private $path;
        private $genre;
    	public function __construct($con,$id)
    	{
            $this->con = $con;
            $this->id = $id;
           
            $songQuery = mysqli_query($this->con,"SELECT * FROM songs WHERE id='$this->id'");
            $this->mysqliData = mysqli_fetch_array($songQuery);

            $this->title = $this->mysqliData['title'];
            $this->artistId = $this->mysqliData['artist'];
            $this->albumId = $this->mysqliData['album'];
            $this->genre = $this->mysqliData['genre'];
            $this->duration = $this->mysqliData['duration'];
            $this->path = $this->mysqliData['path'];

        }
        public function getID(){
            return $this->id;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getAlbum(){
           return new Album($this->con,$this->albumId);
        }
        public function getArtist(){
            return new Artist($this->con,$this->artistId);
        }
        public function getPath(){
            return $this->path;
        }
        public function getDuration(){
            return $this->duration;
        }
        public function getMysqlData(){
            return $this->mysqliData;
        }
        public function getGenre(){
            return $this->genre;
        }
       
       
    }



 ?>