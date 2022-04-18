<?php
class Personnage
{
    private $_id;
    private $_nom;
    private $_force = 1;
    private $_degats = 0;
    private $_niveau = 1;
    private $_experience = 1;
    private $_coupsPortes =0 ;
    private $_dernierCoup;
    private $_derniereConnexion;

const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
const COUPS_MAX =4;

public function __construct(array $donnees)
{
    $this->hydrate($donnees);
}
public function frapper(Personnage $perso)
{
    if ($perso->id() == $this->_id)
    {
        return self::CEST_MOI;
    }
 // On indique au personnage qu'il doit recevoir des dégâts.
 // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $perso->recevoirDegats();
    $this->GainXP();
    $this->GainNiveau();
    $this->_coupsPortes += 1;
    $h = date('Y-m-d H:i:s');
    $this->_dernierCoup = $h;
}

public function hydrate(array $donnees)
{
    foreach ($donnees as $key => $value)
    {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method))
        {
            $this->$method($value);
        }
    }
}

public function recevoirDegats()
{
    $this->_degats += 5;
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if ($this->_degats >= 100)
    {
        return self::PERSONNAGE_TUE;
    }
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
}



public function Regenerer()
{
        // Nommage de variables pour la Premiere Condition avec "if"
        $format = 'Y-m-d H:i:s';
 
        $dCo = $this->_derniereConnexion;
        $date1 = DateTime::CreateFromFormat($format, $dCo);
        $date = new DateTime($dCo);
        $date->add(new DateInterval('P1D'));
 
        $heureActuelle = date('Y-m-d H:i:s');
 
        // Premiere Condition AVEC "if"
        if ($this->_degats >= 10 && strtotime($heureActuelle) >= strtotime($date->format('Y-m-d H:i:s')))
        {
            $this->_degats = $this->_degats - 10;
            $this->setDerniereConnexion(date('Y-m-d H:i:s'));
            echo 'Vous avez bénéficier de soins, vos dégâts ont diminué de 10, vous avez en désormais : ', $this->_degats;
        }
 
        // Nommage de variables pour la Deuxieme Condition avec "if"
        $dCoup = $this->_dernierCoup;
        $date2 = DateTime::CreateFromFormat($format, $dCoup);
        $dateobj = new DateTime($dCoup);
        $dateobj->add(new DateInterval('P1D'));
 
        // Deuxieme Condition AVEC "if"
        if (strtotime($heureActuelle) >= strtotime($dateobj->format('Y-m-d H:i:s')))
        {
            $this->_coupsPortes = 0;
            $this->setDernierCoup(date('Y-m-d H:i:s'));
        }
}


public function GainXP()
{
        //$this->_experience = $this->_experience + 1;
        if ($this->_experience < 100)
        {
            $this->_experience = $this->_experience + 1;
        }
}
 
public function GainNiveau()
{
        if ($this->_experience == 100)
        {
            if ($this->_niveau < 100)
            {
                $this->_niveau = $this->_niveau + 1;
                echo '<p>Félicitations ! Vous gagnez un niveau grâce à vos 100 points d\'expérience, vous êtes désormais au niveau : ', $this->_niveau;
                $this->_experience -= 100;
                echo '<br>Votre expérience a été remise à : ', $this->_experience, '</p>';
                $this->_force = $this->_niveau;
                echo 'Votre nouvelle force est de : ', $this->_force;
            }
            else
            {
                echo '<p>Vous avez déjà atteint le niveau 100 qui est le niveau maximum.</p>';
            }
        }
} // FIN DE "public function GainNiveau() "

// GETTERS //

public function id() { return $this->_id; }
public function nom() { return $this->_nom; }
public function force() { return $this->_force; }
public function degats() { return $this->_degats; }
public function niveau() { return $this->_niveau; }
public function experience() { return $this->_experience; }
public function coupsPortes() { return $this->_coupsPortes; }
public function dernierCoup() { return $this->_dernierCoup; } 
public function derniereConnexion() { return $this->_derniereConnexion; }


public function setDegats($degats)
{
    $degats = (int) $degats;
    if ($degats >= 0 && $degats <= 100)
    {
        $this->_degats = $degats;
    }
}

public function setId($id)
{
    $id = (int) $id;
    if ($id > 0)
    {
        $this->_id = $id;
    }
}

public function setNom($nom)
{
    if (is_string($nom))
    {
        $this->_nom = $nom;
    }
}

public function setForce($force)
{
    $force = (int) $force;
    if ($force >= 1 && $force <= 100)
    {
        $this->_force = $force;
    }
}

public function setNiveau($niveau)
{
    // On convertit l'argument en nombre entier. (= Transtypage)
    // lire cette instruction de droite à gauche
    $niveau = (int) $niveau;
 
    if ($niveau >= 1 && $niveau <= 100)
    {
        $this->_niveau = $niveau;
    }
}
 
public function setExperience($experience)
{
    // On convertit l'argument en nombre entier. (= Transtypage)
    // lire cette instruction de droite à gauche
    $experience = (int) $experience;
 
    if ($experience >= 0 && $experience <= 100)
    {
        $this->_experience = $experience;
    }
}

public function setCoupsportes($coupsportes)
 {
        // On convertit l'argument en nombre entier. (= Transtypage)
        // lire cette instruction de droite à gauche
        $coupsportes = (int) $coupsportes;
 
        if ($coupsportes >= 0 && $coupsportes <= 3)
        {
            $this->_coupsPortes = $coupsportes;
        }
}
 

public function setDernierCoup($derniercoup)
{
    $this->_dernierCoup = $derniercoup;
}
 
public function setDerniereConnexion($derniereconnexion)
{
    $this->_derniereConnexion = $derniereconnexion;
}




public function nomValide()
{
    return !empty($this->_nom);
}
}

?>