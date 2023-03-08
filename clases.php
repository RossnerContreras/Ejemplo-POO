<?php
    class ContaBanco{
        public $numConta;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;

        public function __construct(){
            $this->setsaldo(0);
            $this->setstatus(false);
            echo "Cuenta creada con éxito <br/>";
        }

        function getnumConta(){
            return $this->numConta;
        }

        function setnumConta($numConta){
            $this->numConta=$numConta;
        }

        function gettipo(){
            return $this->tipo;
        }

        function settipo($tipo){
            $this->tipo=$tipo;
        }

        function getdono(){
            return $this->dono;
        }

        function setdono($dono){
            $this->dono=$dono;
        }

        function getsaldo(){
            return $this->saldo;
        }

        function setsaldo($saldo){
            $this->saldo=$saldo;
        }

        function getstatus(){
            return $this->status;
        }

        function setstatus($status){
            $this->status=$status;
        }

        public function abrirConta($t){
            $this->setTipo($t);
            $this->setStatus(true);
            if ($t=="CC"){
                $this->setSaldo(50);
            }else if ($t=="CP"){
                $this->setSaldo(150);
            }else{
                echo "Seleccione una opcion válida <br/>";
            }
        }

        public function fecharConta(){
            if ($this->getSaldo()>0){
                echo "No podemos cerrar tu cuenta con dinero <br/>";
            } else if ($this->getSaldo()<0){
                echo "No podemos cerrar una cuenta con saldo moroso <br/>";
            }else{
                $this->setStatus(false);
                echo "Cuenta de ".$this->getdono()." cerrada éxitosamente <br/>";
            }
        }

        public function depositar($v){
            if ($this->getStatus()){ //($this->getStatus()==true)
                //SI EL ESTATUS ES VERDADERO, HAZ...
                $this->setSaldo($this->getSaldo() + $v); //$this->saldo=$this->saldo+$v
                echo "Deposito de Bs. $v con éxito, en la cuenta de ".$this->getdono()." <br/>";
            } else {
                echo "No puedes depositar en una cuenta inactiva <br/>";
            }
        }

        public function sacar ($v){
            if ($this->getstatus()){//$this->status==true
                if($this->getsaldo()>= $v){
                    //echo "Puedes sacar un total maximo de ".$this->saldo;
                    $this->setsaldo($this->getsaldo() - $v);
                    echo "Retiro de Bs. $v, completado con éxito en la cuenta de ". $this->getdono() ."<br/>";
                } else {
                    echo "Saldo insuficiente para sacar <br/>";
                }
            } else {
                echo "No puedes sacar en una cuenta cerrada o inactiva <br/>";
            }
        }

        public function pagarMensal(){
            if($this->getTipo()=="CC"){
                $v=12;
            } else if ($this->getTipo()=="CP"){
                $v=20;
            }else{
                echo "Tipo fue definido con un valor diferente <br/>";
            }
            if ($this->getStatus()){ //$this->getstatus==true
                if ($this->getsaldo()>=$v){
                    $this->setSaldo($this->getSaldo()-$v);
                    echo "Mensualidad de Bs. $v, completado con éxito y debitada en la cuenta de ".$this->getdono()."<br/>";
                } else {
                    echo "Saldo insuficiente <br/>";
                }
            } else {
                echo "Problemas para cobrar el pago mensual en una cuenta inativa <br/>";
            }
        }
    }
?>