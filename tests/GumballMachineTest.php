<?php

require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof1
    private $nom="XXX1"; // a changer
    private $prenom="YYY1"; // a changer
    private $date_naissance="1980-09-29"; // a changer
    private $lieu_naissance="ZZZ1"; // a changer
    
     //prof2
    private $nom1="XXX2"; // a changer
    private $prenom1="YYY2"; // a changer
    private $date_naissance1="1981-10-30"; // a changer
    private $lieu_naissance1="ZZZ2"; // a changer
     
     //prof3
    private $nom2="XXX3"; // a changer
    private $prenom2="YYY3"; // a changer
    private $date_naissance2="1982-12-31"; // a changer
    private $lieu_naissance2="ZZZ3"; // a changer
    
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
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom1,$this->prenom1,$this->date_naissance1,$this->lieu_naissance1)); 
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom2,$this->prenom2,$this->date_naissance2,$this->lieu_naissance2));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+3,$max__id2);
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
