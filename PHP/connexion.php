<?php
    // récupération des identifiants de connexion
    class Connexion{
        private $identifiant;
        private $servname;
        private $dbname;
        private $user;
        private $pass;
        private $nom;
        private $prenom;

        public function __construct($identifiant, $servname, $dbname, $user, $pass){
            $this->identifiant = $identifiant;
            $this->servname = $servname;
            $this->dbname = $dbname;
            $this->user = $user;
            $this->pass = $pass;

            try{
                // connexion à la base de données
                $conn = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT nom, prenom FROM secretaire WHERE login = $identifiant";
                $result = $conn->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $this->nom = $row['nom'];
                $this->prenom = $row['prenom'];
            } catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }

        // récupération du nom et prénom des secrétaires
        public function affichage(){
            echo $this->nom . " " . $this->prenom;
        }
    }
?>