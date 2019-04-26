<?php

class BilleteraDecorada implements Billetera
{
    private $decorada;

    private $contador;

    public function __construct(Billetera $billetera)
    {
        $this->decorada = $billetera;

        $this->contador = 0;
    }

    public function mostrarBilletesAgregados()
    {
        return "La cantidad de billetes ingresados en la billetera es de {$this->contador}";
    }
    
    public function agregar($billete,$cantidad)
    {
        $agrego=$this->decorada->agregar($billete,$cantidad);
        if ($agrego) {
            $this->contador++;
        }
        return true;
    }

    public function sacar($billete,$cantidad)
    {
        $saco=$this->decorada->sacar($billete,$cantidad);
        if ($saco) {
            $this->contador--;
        }
        return true;
    }

    public function mostrar()
    {
        return $this->decorada->mostrar();
    }
}