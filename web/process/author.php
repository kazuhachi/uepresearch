<?php

    class Author{

        public $firstName = '';
        public $middleName = '';
        public $lastName = '';
        public $phoneNum = '';
        public $email = '';
        public $address = '';
        public $college = '';

        function setFirstname($firstName){
            $this -> firstName = $firstName;
        }

        function setMiddlename($middleName){
            $this -> middleName = $middleName;
        }

        function setLastname($lastName){
            $this -> lastName = $lastName;
        }

        function setPhoneNum($phoneNum){
            $this -> phoneNum = $phoneNum;
        }
        function setEmail($email){
            $this -> email = $email;
        }

        function setAddress($address){
            $this -> address = $address;
        }
        function setCollege($college){
            $this -> college = $college;
        }


        

        function getFullname(){
            // return `$this -> firstname} ${$this -> middlename} ${$this -> lastname}`;
            return $this -> firstName . " " . $this -> middleName . " " . $this -> lastName;
        }

    }

?>