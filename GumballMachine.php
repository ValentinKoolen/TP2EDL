<?php
//test
class GumballMachine
{

	private $gumballs;	
	private $bdd;
	/* Paramètre de connexion à la base de données*/
	private $servername="localhost";
	private $db_name="mydb28"; //a remplir
	private $db_user="myuser28"; //a remplir
	private $db_pass="mypassword28"; //a remplir
	
	
	function __construct()
	{
	    try
	    {
	        $this->bdd =  new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->db_user, $this->db_pass);
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql="CREATE TABLE  IF NOT EXISTS prof( id INT NOT NULL AUTO_INCREMENT , nom VARCHAR(25) NOT NULL , prenom VARCHAR(25) NOT NULL , date_naissance DATE NOT NULL , lieu_naissance TEXT NOT NULL , PRIMARY KEY (id)) ";
	        $this->bdd->exec($sql);
	        $sql="CREATE TABLE  IF NOT EXISTS cours( id INT NOT NULL AUTO_INCREMENT , intitule VARCHAR(50) NOT NULL , duree INT NOT NULL , id_prof INT NOT NULL , PRIMARY KEY (id), FOREIGN KEY (id_prof) REFERENCES prof(id)) ";
	        $this->bdd->exec($sql);
	    }
	    
	    catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	}

    public function getDB()
    {
        return $this->bdd;
    }
	
	public function AffichageProf($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from prof");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Last Name: " . $row["nom"]. " First Name: " . $row["prenom"]. " Birth Date: " . $row["date_naissance"]. " birth Place: " . $row["lieu_naissance"] ."\n";
	    }
	    return true;
	    
	}
	public function AffichageCours($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from cours");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Name: " . $row["intitule"]. " Time: " . $row["duree"]. " Id Prof: " . $row["id_prof"] ."\n";
	    }
	    return true;
	}
	
	public function InsertP($bdd, $nom, $prenom , $date_naissance,$lieu)
	{  
	    try 
	    {
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('$nom','$prenom', '$date_naissance','$lieu')";
	       $bdd->exec($sql);
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	    
	}
	
	public function GetIdP($nom,$prenom)
	{
	    $stmt = $this->bdd->prepare("select id from prof where nom=? and prenom=?");
	    $stmt->execute([$nom,$prenom]); 
	    $user = $stmt->fetch();
	    return $user['id'];
	
	}
	
	public function GetLastIDP()
	{
	    $stmt = $this->bdd->prepare("select max(id) as maximum from prof");
	    $stmt->execute();
	    $user = $stmt->fetch();
	    return $user['maximum'];
	}
	public function GetLastIDC()
	{
	    $stmt = $this->bdd->prepare("select max(id) as maximum from cours");
	    $stmt->execute();
	    $user = $stmt->fetch();
	    return $user['maximum'];
	}
	
	public function InsertC($bdd, $intitule, $duree , $id_prof)
	{
	    try
	    {
	        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "INSERT INTO cours (intitule, duree, id_prof) VALUES ('$intitule','$duree', '$id_prof')";
	        $bdd->exec($sql);
	        return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	    }
	    
	}
	
	public function DropData()
	{
	    try
	    {
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "DELETE from cours";
	        $this->bdd->exec($sql);
		$sql = "DELETE from prof";
		$this->bdd->exec($sql); 
	        return "good job";
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	    }
	    
	}
	public function UpdateP($bdd, $nom, $Nom )
	{
	     try 
	    {
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "UPDATE prof SET nom='$Nom' WHERE nom='$nom' ";
	       $bdd->exec($sql);
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	}
	public function UpdateC($bdd, $IntituleInitial, $INTITULE )
	{
	     try 
	    {
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "UPDATE cours SET intitule='$INTITULE' WHERE intitule='$IntituleInitial' ";
	       $bdd->exec($sql);
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	}
	
	public function DeleteP($bdd, $Id)
	{
		 try 
	    {
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "DELETE FROM prof WHERE id='$Id' ";
	       $bdd->exec($sql);
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	}
	public function DeleteC($bdd, $INTITULE)
	{
	     try 
	    {
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "DELETE FROM cours WHERE intitule='$INTITULE' ";
	       $bdd->exec($sql);
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	}
	
	    
	
}
