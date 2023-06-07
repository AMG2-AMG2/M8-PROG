<?php
class Product {
    public function __construct(private string $naam, private string $beschrijving, private int $prijs) {}
    
    public function setName(string $naam): void {
        $this->naam = $naam;
    }
    
    public function getName(): string {
        return $this->naam;
    }
}

?>