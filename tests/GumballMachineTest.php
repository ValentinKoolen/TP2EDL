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
    private $intitule="IOT"; //a remplir
    private $duree="10";    //a remplir
   
    
     // cours1
    private $intitule1="IA"; //a remplir
    private $duree1="12";    //a remplir

    
     // cours2
    private $intitule2="C++"; //a remplir
    private $duree2="18";    //a remplir
    
    
     // cours3
    private $intitule3="EDL"; //a remplir
    private $duree3="30";    //a remplir
    
    
    public static function setUpBeforeClass()
    {
    }
        
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
        $this->gumballMachineInstance->DropData();
        
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom,$this->prenom,$this->date_naissance,$this->lieu_naissance));
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom1,$this->prenom1,$this->date_naissance1,$this->lieu_naissance1)); 
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom2,$this->prenom2,$this->date_naissance2,$this->lieu_naissance2));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+2,$max__id2);
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
        
        
        $this->assertEquals(true,$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),$this->intitule,$this->duree,$this->gumballMachineInstance->GetIdP($this->nom,$this->prenom)));
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),$this->intitule1,$this->duree1,$this->gumballMachineInstance->GetIdP($this->nom1,$this->prenom1)));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),$this->intitule2,$this->duree2,$this->gumballMachineInstance->GetIdP($this->nom2,$this->prenom2)));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),$this->intitule3,$this->duree3,$this->gumballMachineInstance->GetIdP($this->nom2,$this->prenom2)));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+3,$max__id2);
    }
  
    public function testAffichageCoursAPI()
    {
        /*à completer*/
    }
    
    

    public function testUpdateP()
    {
       
       $this->assertEquals(true,$this->gumballMachineInstance->UpdateP($this->gumballMachineInstance->getDB(),$this->nom,$Nom="Joe"));
        
      
       
    }
   
}
