<?php

class Hotel {
    private $nom;
    private $capacite;
    private $chambres = array();
    private $diponible;
    private $complet = false;
    private $appartements = array();


    public function __construct($nom, $capacite){
        if(is_numeric($capacite)&&$capacite>0){
            $this->nom = $nom;
            $this->capacite = $capacite;
        } else {
            $this->nom = 'nom';
            $this->capacite = 0;
        }
    }
    public function getNom(){
        return $this->nom;
    }
    public function getCapacite(){
        return $this->capacite;
    }
    private function chambreDisponible(){
        $this->disponible = $this->capacite - $this->totalChambres() - $this->totalApps();
        return $this->disponible;
    }
    public function estComplet() {
        if($this->chambreDisponible() == 0){
            $this->complet = true;
        }
        return $this->complet;
    }
    public function totalChambres() {
        return count($this->chambres);
    }
    public function totalApps() {
        return count($this->appartements);
    }
    public function reserverChambre($num, $size, $orient) {
        if(!$this->estComplet()){
            if(Chambre::Verification($num, $size, $orient)){
                $chambre = new Chambre($num, $size, $orient);
                $this->chambres[] = $chambre;
                echo "Une nouvelle reservation<br><br>";
                return $this;
                
            }else{
                echo "La chambre n'est pas valide<br><br>";
            }
        }else{
            echo "Aucune chambre disponible<br><br>";
        }
    }
    public function reserverApp($num, $size, $orient, $pieces, $balcon) {
        if(!$this->estComplet()){
            if(Appartement::VerificationApp($num, $size, $orient, $pieces, $balcon)){
                $app = new Appartement($num, $size, $orient, $pieces, $balcon);
                $this->appartements[] = $app;
                echo "Une nouvelle reservation<br><br>";
                return $this;
                
            }else{
                echo "L'appartement n'est pas valide<br><br>";
            }
        }else{
            echo "Aucune appartement disponible<br><br>";
        }
    }
    public function afficher(){
        echo "Le nom de l'hotel: {$this->getNom()};<br>
                Le nombre de chambres reservees: {$this->totalChambres()};<br>
                Le nombre de appartements reserves: {$this->totalApps()};<br>
                Le nombre de chambres et appartements disponibles: {$this->chambreDisponible()};<br>
                Le detail de reservations:<br>";
                if(!$this->totalChambres()== 0||!$this->totalApps()== 0){
                    foreach($this->chambres as $chambre){
                      echo "{$chambre->afficher()}<br>"; 
                    }
                    foreach($this->appartements as $app){
                        echo "{$app->afficher()}<br>";
                    }
                    echo "<br>";
                }else{
                   echo "Aucune reservation<br><br>"; 
                }
                
    }    
}