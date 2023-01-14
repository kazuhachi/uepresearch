<?php  
  
  class Research{
        public $Id;
        public $title;
        public $authors;
        public $keywords;
        public $status;
        public $campus;
        public $dateStarted;
        public $dateFinished;
        public $IsPresented;
        public $isFunded;
        public $isPatented;

        //set

        // public function setId($id){
        //     $this->$id = $id;
        // }

        // public function setTItle($title){
        //     $this-> $title =  $title;
        // }

        // public function setAuthors($authors){
        //     $this->$authors = $authors;
        // }

        // public function setKeywords($keywords){
        //     $this->$keywords = $keywords;
        // }

        // public function setStatus($status){
        //     $this->$status = $status;
        // }
        
        // public function setCampus($campus){
        //     $this->$campus = $campus;
        // }

        // public function setDateStarted($dateStarted){
        //     $this->$dateStarted = $dateStarted;
        // }

        // public function setdateFinished($dateFinished){
        //     $this->$dateFinished = $dateFinished;
        // }

    

        // //get
        // public function getId($id){
        //     return $this-> $id;
        // }

        // public function getTItle($title){
        //     return $this-> $title;
        // }

        // public function getAuthors($authors){
        //     return $this->$authors;
        // }

        // public function getKeywords($keywords){
        //     return $this->$keywords;
        // }

        // public function getStatus($status){
        //     return $this->$status;
        // }
        // public function getCampus($campus){
        //     return $this->$campus;
        // }

        // public function getDateStarted($dateStarted){
        //     return $this->$dateStarted;
        // }

        // public function getdateFinished($dateFinished){
        //     return $this->$dateFinished;
        // }

    }


    $research = new Research();
    echo $research -> Id;
    
?>