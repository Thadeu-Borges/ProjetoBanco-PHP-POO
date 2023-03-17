<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ContaBanco
 *
 * @author AAAA
 */
class ContaBanco {
    //Atributos
    
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    //Métodos
    
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->saldo = 150;
        }
    }
    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo "<p>Conta ainda tem dinheiro, não posso fechá-la!</p>";
        } elseif ($this->getSaldo() < 0) {
            echo "<p>Conta está em débito. Impossível encerrar!</p>";
        } else {
            $this->setStatus(false);
            echo "<p>Conta de ".$this->getDono()." fechada com sucesso </p>";
        }
    }
    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            //$this->saldo = $this->saldo +$v;
            echo "<p>Depósito de R$ $v na conta de ".$this->getDono()."</p>";
        } else {
            echo "<p>Conta fechada. Não consigo depositar.</p>";
        }
    }
    public function sacar($v) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                //$this->saldo = $this->saldo - $v;
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Saque de R$ $v autorizado na conta de ".$this->getDono()."</p>";
            } else {
                echo "<p>Saldo insuficiente para saque.</p>";
            }
        } else {
            echo "<p>Não posso sacar de uma conta fechada</p>";
        }
    }
    public function pagarMensal() {
        if ($this->getTipo() == "CC") {
            $v = 12;
        } else if ($this->getTipo() == "CP") {
            $v = 20;
        } 
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p>Mensalidade de R$ $v debitada na conta de ".$this->getDono()."</p>";
        } else {
            echo "<p>Problemas com a conta. Não posso cobrar.</p>";
        }
    }
    
    //Métodos Especiais
    
    function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso!</p>";
    }
    
    
    function getNumConta() {
        return $this->numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta): void {
        $this->numConta = $numConta;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function setDono($dono): void {
        $this->dono = $dono;
    }

    function setSaldo($saldo): void {
        $this->saldo = $saldo;
    }

    function setStatus($status): void {
        $this->status = $status;
    }
}
