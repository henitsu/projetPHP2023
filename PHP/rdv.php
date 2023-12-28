<?php
    // Création de la classe RDV
    class RDV{
        private $date;
        private $heure;
        private $idMedecin;
        private $idPatient;
        private $duree;

        // Constructeur
        public function __construct($date, $heure, $duree, $idMedecin, $idPatient){
            $this->date = $date;
            $this->heure = $heure;
            $this->idMedecin = $idMedecin;
            $this->idPatient = $idPatient;
            $this->duree = $duree;
        }

        // Getters
        public function getDate(){
            return $this->date;
        }

        public function getHeure(){
            return $this->heure;
        }

        public function getIdMedecin(){
            return $this->idMedecin;
        }

        public function getIdPatient(){
            return $this->idPatient;
        }

        public function getDuree(){
            return $this->duree;
        }

        // Setters
        public function setDate($date){
            $this->date = $date;
        }

        public function setHeure($heure){
            $this->heure = $heure;
        }

        public function setIdMedecin($idMedecin){
            $this->idMedecin = $idMedecin;
        }

        public function setIdPatient($idPatient){
            $this->idPatient = $idPatient;
        }

        public function setDuree($duree){
            $this->duree = $duree;
        }
    }
?>