<?php

class Validacao
{
    public $validacoes = [];

    public static function validar($regras, $dados)
    {
        $validacao = new self;

        foreach ($regras as $campo => $regrasDoCampo) {
            foreach ($regrasDoCampo as $regra) {
                $valorCampo = $dados[$campo];
                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorCampo, $dados["{$campo}_confirmacao"]);
                } elseif (str_contains($regra, ':')) {
                    $temp = explode(':', $regra);
                    $regra = $temp[0];
                    $regraArg = $temp[1];
                    $validacao->$regra($regraArg, $campo, $valorCampo);
                } else {
                    $validacao->$regra($campo, $valorCampo);
                }
            }
        }

        return $validacao;
    }

    private function required($campo, $valorCampo)
    {
        if (strlen($valorCampo) == 0) {
            $this->validacoes[] = "O $campo é obrigatório";
        }
    }

    private function email($campo, $valorCampo)
    {
        if (! filter_var($valorCampo, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "O $campo é inválido.";
        }
    }

    private function confirmed($campo, $valorCampo, $campoDeConfirmacao)
    {
        if ($valorCampo != $campoDeConfirmacao) {
            $this->validacoes[] = 'Os e-mails precisam ser iguais.';
        }
    }

    private function min($min, $campo, $valorCampo)
    {
        if (strlen($valorCampo) < $min) {
            $this->validacoes[] = "O $campo precia ser maior que $min caracteres";
        }
    }

    private function max($max, $campo, $valorCampo)
    {
        if (strlen($valorCampo) > $max) {
            $this->validacoes[] = "O $campo precia ser menor que $max caracteres";
        }
    }

    public function naoPassou()
    {
        $_SESSION['validacoes'] = $this->validacoes;
        return sizeof($this->validacoes) > 0;
    }
}
