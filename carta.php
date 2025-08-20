<?php

class Carta
{

    //Atributos

    private $simbolo;

    private $cor;

    private $dica;

    //Métodos

    public function __construct($simbolo, $cor, $dica)
    {
        $this->simbolo = $simbolo;
        $this->cor = $cor;
        $this->dica = $dica;
    }


    //Gets e Sets

        /**
     * Get the value of simbolo
     */
    public function getSimbolo()
    {
        return $this->simbolo;
    }

    /**
     * Set the value of simbolo
     */
    public function setSimbolo($simbolo): self
    {
        $this->simbolo = $simbolo;

        return $this;
    }

    /**
     * Get the value of cor
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     */
    public function setCor($cor): self
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of dica
     */
    public function getDica()
    {
        return $this->dica;
    }

    /**
     * Set the value of dica
     */
    public function setDica($dica): self
    {
        $this->dica = $dica;

        return $this;
    }

    
}

print "Em um jogo de uno, cada jogador começa com 7 cartas aleatórias, seu objetivo é ficar sem nenhuma carta em mãos. Para isso você deve descartar quando possivel e comprar quando necessário.\n";
print "Iremos jogar uno no php, seu adversário começa com as 7 cartas que você ja sabe quais são.\n";
print "Seu objetivo é descobrir a carta da vez sem errar 7 vezes.\n";
print "Para isso, você pode pedir dicas e ser um frangote, ou chutar até acabar. Obs: as cartas não se repetem.";

//Programa Principal

$UNO = [
    new Carta(5, "vermelho", "Tem número ímpar."),
    new Carta("+2", "azul", "É uma carta de compra."),
    new Carta("Inverter", "verde","É uma carta verde."),
    new Carta("Pular", "amarelo","É uma cor quente."),
    new Carta(0, "vermelho","Não é ímpar nem par."),
    new Carta(9, "verde","É uma cor secundária"),
    new Carta("+4", "preto","É uma carta de compra."),
];

$sorteador = array_rand($UNO);
$cartaEsclh = $UNO[$sorteador];

print "====UNO====";
foreach ($UNO as $u) {
    print "Símbolo: " . $u->getSimbolo();
    print " | Cor: " . $u->getCor();
}

print "============";


$vida = 7;
$opcao = 0;
$cartas = 7;

do {

    $opcao = readline(
        "Escolha uma opção:\n
    (1) Chutar\n
    (2) Dica\n
    (3) Rever cartas disponiveis\n
    (0) Desistir\n"
    );

    switch ($opcao) {
        case 1: $palpite = readline();
                if ($palpite == $cartaEsclh->getSimbolo() and $cartas>1) {
                    $cartas --;
                    print "Parabéns! Só faltam " . $cartas;
                    //Eliminar num acertado

                    $sorteador = array_rand($UNO);
                    $cartaEsclh = $UNO[$sorteador];

                }

                else{
                    $vida--;
                    print "Voce errou! Você tem " . $vida . "chance(s) ainda.";
                    

                }
            break;

        case 2:
            print"Dica: ". $cartaEsclh->getDica();
            break;

        case 3:
            print "====UNO====";
            foreach ($UNO as $u) {
                print "Símbolo: " . $u->getSimbolo();
                print " | Cor: " . $u->getCor();
            }

            print "============";
            break;

        case 0:
            print "Você é um perdedor frangote";
            break;

        default:
            print "Apenas selecione a opção desejada.";
            break;
    }


} while ($opcao != 0 or $vida = 0);
