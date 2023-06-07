<?php

declare(strict_types=1);

class BankAccount {
    protected string $banknummer;
    protected float $saldo;

    public function __construct(string $banknummer, float $saldo = 0.0) {
        $this->banknummer = $banknummer;
        $this->saldo = $saldo;
    }

    public function getBanknummer(): string {
        return $this->banknummer;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    protected function setSaldo(float $saldo): void {
        $this->saldo = $saldo;
    }

    public function toevoegen(float $bedrag): void {
        $this->setSaldo($this->getSaldo() + $bedrag);
    }

    public function onttrekken(float $bedrag): void {
        $nieuwSaldo = $this->getSaldo() - $bedrag;
        if ($nieuwSaldo < 0) {
            throw new Exception('Saldo mag niet laag gaan.');
        }
        $this->setSaldo($nieuwSaldo);
    }
}
    
class BankAccountPlus extends BankAccount {
    private float $boeterente;

    public function __construct(string $banknummer, float $boeterente = 0.0, float $saldo = 0.0) {
        parent::__construct($banknummer, $saldo);
        $this->boeterente = $boeterente;
    }

    public function getBoeterente(): float {
        return $this->boeterente;
    }

    public function toevoegen(float $bedrag): void {
        parent::toevoegen($bedrag);
        $this->berekenBoete();
    }

    public function onttrekken(float $bedrag): void {
        parent::onttrekken($bedrag);
        $this->berekenBoete();
    }

    private function berekenBoete(): void {
        if ($this->getSaldo() < 0) {
            $boetebedrag = abs($this->getSaldo()) * $this->boeterente;
            $this->setSaldo($this->getSaldo() - $boetebedrag);
        }
    }
}
