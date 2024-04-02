<?php
// classe è un insieme - creo una CLASSIFICAZIONE, descrivendo delle caratteristiche comuni. In base a queste caratteristiche un oggetto fa parte o meno di quella classe
//BLOCCHI DI CODICE RIUTILIZZABILI

class NomeClasse
{ //! singolare, iniziale maiuscola, inglese
    //descrizione delle caratteristiche

    //1. ATTRIBUTI o PROPRIETA' - le caratteristiche in comune degli oggetti 
    //2. METODO COSTRUTTORE 
    //3. METODI o COMPORTAMENTI 
}

class Animal
{
    // attributi
    public $species;
    public $name;
    public $age;

    //ATTRIBUTO STATICO - parte dalla CLASSE e non dall'oggetto
    public static $counter = 0;

    //metodo costruttore
    public function __construct($specie, $nome, $eta) //NOME SPECIFICO _ _ CONSTRUCT
    {
        //this - del singolo oggetto
        // -> OPERATORE 
        //species - ATTRIBUTO
        //$specie PARAMETRO FORMALE
        $this->species = $specie;
        $this->name = $nome;
        $this->age = $eta;
        self::$counter++; //:: - scope resolution operator
    }

    //metodo o comportamento

    public function info()
    {
        echo "E' un animale di specie $this->species, si chiama $this->name e ha $this->age anni \n";
    }
}

// echo "Numero di animali prima di crearli: " . Animal::$counter . "\n";
//creare un oggetto
$dylan = new Animal('cane', 'Dylan', 15);
// echo "Numero di animali dopo Dylan: " . Animal::$counter . "\n";

$titina = new Animal('tartaruga', "Titina", 20);
// echo "Numero di animali dopo Titina: " . Animal::$counter . "\n";

$pilù = new Animal('Gatto', 'Pilu', 15);
// print_r($dylan);
// echo $pilù->name;

// $dylan->info();
// $pilù->info();

// echo "Numero di animali dopo averli creati: " . Animal::$counter . "\n";

//! EREDITARIETA' 
// SINGOLA - sottoclasse deriva da UN'UNICA classe PARENT   
//multipla - permette di comporre classi derivanti da PIU' classi parent (C++, Python)


//CLASSE FIGLIA ANIMALE DOMESTICO (PET), caratteristiche in più (città, proprietario)

class Pet extends Animal
{
    //attributi
    public $city;
    public $owner;
    public static $petCounter = 0;
    //costruttore

    public function __construct($specie, $nome, $eta, $citta, $proprietario)
    {
        // $this->species = $specie;
        // $this->name = $nome;
        parent::__construct($specie, $nome, $eta);
        $this->city = $citta;
        $this->owner = $proprietario;
        self::$petCounter++;
    }
    //metodi

    public function petInfo()
    {
        $this->info();
        echo "Il suo proprietari* è $this->owner e vivono insieme a $this->city \n";
    }
}

$luna = new Pet('Gatto', 'Luna', 2, 'Bari', 'Bruno');
var_dump($luna);
// echo $luna->name;

// $luna->info();
// $luna->petInfo();
// echo "gli animali in totale sono: " .  Animal::$counter . "\n";
// echo "gli animali domestici sono: " .  Pet::$petCounter . "\n";

class Wildlife extends Animal
{
    protected $habitat;
    public $researcher;

    public function __construct($specie, $nome, $eta, $habitat, $ricercatore)
    {
        parent::__construct($specie, $nome, $eta);
        $this->habitat = $habitat;
        $this->researcher = $ricercatore;
    }

    public function getHabitat()
    { //GETTER
        echo $this->habitat;
    }

    public function setHabitat($value) //SETTER
    {
        $this->habitat = $value;
    }
}

$leone = new Wildlife('Leone', 'Simba', 5, 'Savana', 'Andrea');
var_dump($leone);

//! ACCESS MODIFIER  - modificatore di accesso, la keyword che mettiamo prima  di un attributo o metodo di una classe. VISIBILITA', il punto del programma dove può essere richiamato 

// public - PUBBLICO in LETTURA E SCRITTURA
// PROTECTED - protetto, DATA HIDING - accessibile in lettura e scrittura SOLO all'interno della classe
//PRIVATE - ha lo stesso comportamento di PROTECTED MA LE CLASSI FIGLIE NON EREDITANO

$leone->setHabitat('Africa');
$leone->getHabitat();

