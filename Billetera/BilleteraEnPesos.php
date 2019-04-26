<?php

class BilleteraEnPesos implements Billetera 

  {
    private $billetera;

    private $total;

    public function __construct()
    {
        $this->billetera=[];

        $this->total=0;
    }

    public function mostrar()
    {
        return $this->total;
    }

    public function sacar($billete,$cantidad)
    {       
        $this->total-=$cantidad*$billete;
        if (isset($this->billetera[$billete])) {
            $this->billetera[$billete]-=$cantidad;
            return true;
            }
        else{
            return false;
            }
    }

    public function agregar($billete,$cantidad)
    {
        $this->total+=$cantidad*$billete;
            if (isset($this->billetera[$billete])) {
                $this->billetera[$billete]+=$cantidad;
                }
            else{
                $this->billetera[$billete]=$cantidad;
                }
            return true;
    }
}
