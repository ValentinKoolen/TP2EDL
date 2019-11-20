<?php

require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof1
    private $nom="XXX1"; // a changer
    private $prenom="YYY1"; // a changer
    private $date_naissance="29-09-1980"; // a changer
    private $lieu_naissance="ZZZ1"; // a changer
    
     //prof2
   // private $nom="XXX2"; // a changer
    //private $prenom="YYY2"; // a changer
    //private $date_naissance="30-10-1981"; // a changer
    //private $lieu_naissance="ZZZ2"; // a changer
     
     //prof3
    //private $nom="XXX3"; // a changer
    //private $prenom="YYY3"; // a changer
    //private $date_naissance="31-12-1982"; // a changer
    //private $lieu_naissance="ZZZ3"; // a changer
    
    // cours
    private $intitule="***"; //a remplir
    private $duree="***";    //a remplir
    
        
    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom,$this->prenom,$this->date_naissance,$this->lieu_naissance));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
    }
    public function testAffichageProfAPI()
    {
        /*à completer*/
    }
     
    
    public function testAffichageCoursAVI()
    {
        /*à completer*/
    }
    public function testInsertC()
    {       
       
    }
    public function testAffichageCoursAPI()
    {
        /*à completer*/
    }

   
}
