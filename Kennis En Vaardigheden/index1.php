<?php

ini_set('log_errors', 'On');
ini_set('error_log', '/path/to/application_errors.log');


function keer_om($string)
{
    return strrev($string);
} 

function reverse_case($string)
{
    return strtr($string, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
}


function check_invoer($invoer)
{
    if (is_array($invoer)) {
        return 'array';
    } else {
        return 'string';
    }
}

function keer_om_array($array)
{
    return array_reverse($array);
}

function keer_om_invoer($invoer)
{
    if (is_array($invoer)) {
        return keer_om_array($invoer);
    } else {
        return keer_om($invoer);
    }
}


$namen = array('Neo', 'Halil', 'Roan', 'Kiet', 'Igor', 'Mathijs', 'Mert', 'Bilal', 'Amir', 'Uday');


function zoekNaam($naam, $namen)
{
    $gevonden = array_search(strtolower($naam), array_map('strtolower', $namen));
    if ($gevonden !== false) {
        return $gevonden;
    } else {
        return -1;
    }
}

echo zoekNaam("Mathijs", $namen); // geeft 1 terug
echo zoekNaam("Igor", $namen); // geeft -1 terug
echo zoekNaam("Neo", $namen); // geeft 3 terug (de functie kan hoofdletters en kleine letters verwerken)

class Bankrekening
{
    private $banknummer;
    protected $bedragen;

    public function __construct($banknummer, $bedragen)
    {
        $this->banknummer = $banknummer;
        $this->bedragen = $bedragen;
    }

    public function voegGeldToe($bedragen)
    {
        $this->bedragen += $bedragen;
    }

    public function haalGeldAf($bedragen)
    {
        if ($bedragen <= $this->bedragen) {
            $this->bedragen -= $bedragen;
        } else {
            echo "Je hebt niet genoeg geld op de rekening.";
        }
    }
}


class BankrekeningPlus extends Bankrekening
{
    private $limiet = 1000;


    public function haalGeldAf($bedragen)
    {
        if ($bedragen <= ($this->bedragen + $this->limiet)) {
            $this->bedragen -= $bedragen;
        } else {
            echo "De opname Limiet is bereikt";
        }
    }

    public function berekenBoete()
    {
        if ($this->bedragen < 0) {
            $boete = abs($this->bedragen) * 0.05;
            return $boete;
        } else {
            return 0;
        }
    }

    public function toonBoeteEnSaldo()
    {
        $boete = $this->berekenBoete();
        $saldo = $this->bedragen;
        $datum = date("Y-m-d H:i:s");
        echo "Boete: " . $boete . " EUR<br>";
        echo "Saldo: " . $saldo . " EUR<br>";
        echo "Datum/tijd: " . $datum . "<br>";
    }
}


?>