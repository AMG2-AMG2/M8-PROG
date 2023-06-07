<?php
class BankAccount {
    private $accountNumber;
    private $balance;
    
    public function __construct($accountNumber) {
        $this->accountNumber = $accountNumber;
        $this->balance = 0;
    }
    
    public function deposit($amount) {
        // Code voor storten
    }
    
    public function withdraw($amount) {
        // Code voor opnemen
    }
    
    public function getBalance() {
        // Code om saldo op te vragen
    }
}

class BankAccountPlus extends BankAccount {
    private $overdraftLimit;
    
    public function setOverdraftLimit($limit) {
        // Code om limiet in te stellen
    }
    
    public function getOverdraftLimit() {
        // Code om limiet op te vragen
    }
    
    // Eventuele extra functionaliteit voor BankAccountPlus
}

class UserAccount {
    private $personalInfo;
    private $addressInfo;
    private $contactInfo;
    private $bankAccount;
    private $bankAccountPlus;
    
    public function __construct($personalInfo, $addressInfo, $contactInfo) {
        $this->personalInfo = $personalInfo;
        $this->addressInfo = $addressInfo;
        $this->contactInfo = $contactInfo;
        $this->bankAccount = null;
        $this->bankAccountPlus = null;
    }
    
    public function createBankAccount() {
        if ($this->bankAccount === null) {
            $this->bankAccount = new BankAccount($this->personalInfo['accountNumber']);
            return true;
        }
        
        return false; // Er is al een normaal bank account
    }
    
    public function createBankAccountPlus() {
        if ($this->bankAccount === null) {
            return false; // Er moet eerst een normaal bank account worden aangemaakt
        }
        
        if ($this->bankAccountPlus === null) {
            $this->bankAccountPlus = new BankAccountPlus($this->personalInfo['accountNumber']);
            return true;
        }
        
        return false; // Er is al een bank plus account
    }
}

?>