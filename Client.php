<?php
namespace Site;
class Client
{

    private $id;
    private $prenom;
    private $nom;
    private $adresse;
    private $codepostal;
    private $ville;
    private $loue;
    private $location;
    private $idvehicule;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->$id = $id;
    }
    public function getIdVehicule()
    {
        return $this->idvehicule;
    }

    public function setIdVehicule($idvehicule)
    {
        $this->$idvehicule = $idvehicule;
    }
    
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->$nom = $nom;
    }
    
    
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->$prenom = $prenom;
    }
    
    
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->$adresse = $adresse;
    }
    
    
    
    public function getCodePostal()
    {
        return $this->codepostal;
    }

    public function setCodePostal($codepostal)
    {
        $this->$codepostal = $codepostal;
    }
    
    
    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->$ville = $ville;
    }
    
    
    public function getLoue()
    {
        return $this->loue;
    }

    public function setLoue($loue)
    {
        $this->$loue = $loue;
    }

    
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->$location = $location;
    }
    
    public function __construct($prenom,$nom,$adresse,$codepostal,$ville,$loue,$location,$idvehicule)
    {
        $this->$prenom = $prenom;
        $this->$nom = $nom;
        $this->$adresse = $adresse;
        $this->$codepostal = $codepostal;
        $this->$ville = $ville;
        $this->$loue = $loue;
        $this->$location = $location;
        $this->$idvehicule=$idvehicule;
    }
    
    public function retournerClient()
    {
        return $this;
    }
    
}
?>