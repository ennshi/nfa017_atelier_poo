<?php
class Chambre {
    protected $num;
    protected $superficie;
    protected $orientation; 
    static $orientations = array('Est', 'Nord', 'Ouest', 'Sud');

    public function __construct($num, $size, $orient){
        $this->num = $num;
        $this->superficie = $size;
        $this->orientation = ucfirst(strtolower($orient));

    }
    public function afficher() {
        return "La chambre numero: {$this->num}, superficie: {$this->superficie}, orientation: {$this->orientation}";
    }
    public static function Verification($num, $size, $orient){
        $verification = true;
        if(!is_numeric($num)||$num<0||!is_numeric($size)||$size<0||!in_array(ucfirst(strtolower($orient)), self::$orientations)){
          $verification = false;  
        }
        return $verification;
    }
}