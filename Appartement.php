<?php
require_once 'Chambre.php';
class Appartement extends Chambre{
    private $pieces;
    private $balcon;
    
    public function __construct($num, $size, $orient, $pieces, $balcon){
        parent::__construct($num, $size, $orient);
        $this->pieces = $pieces;
        $this->balcon = $balcon;
    }
    public static function VerificationApp($num, $size, $orient, $pieces, $balcon){
        $verification = true;
        $ver1 = Chambre::Verification($num, $size, $orient);
        if(!$ver1||!is_numeric($pieces)||$pieces<0||!is_bool($balcon)){
            $verification = false;
        }
        return $verification;
    }
    public function afficher() {
        return "L'appartement numero: {$this->num}, superficie: {$this->superficie}, orientation: {$this->orientation}, nombre de pieces: {$this->pieces}, balcon: {$this->balcon}";
    }
}