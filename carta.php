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
print "Para isso, você pode pedir dicas e ser um frangote, ou chutar até acabar. Obs: as cartas não se repetem e você deve chutar apenas o símbolo.\n";

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

print "=============UNO=============\n";
foreach ($UNO as $u) {
    print "Símbolo: " . $u->getSimbolo();
    print " | Cor: " . $u->getCor();
    print "\n";
}

print "==============================\n";


$vida = 7;
$opcao = 0;
$cartas = 7;
$gritar;

do {

    echo "\nEscolha uma opção:\n
    (1) Chutar\n
    (2) Dica\n
    (3) Rever cartas disponíveis\n
    (0) Desistir\n";
    $opcao = readline();

    switch ($opcao) {
        case 1: 
            
            $palpite = readline("Qual é seu palpite? ");
            print"\n";

            if ($palpite == $cartaEsclh->getSimbolo() and $cartas==1) {

                
                $gritar = readline("O que está esperando??? Grite UNO");
                print"\n";

                 system('clear');

                 print "Parabéns, você é um vencedor.";

                 break 2;


                
                
            }
            if ($palpite == $cartaEsclh->getSimbolo() and $cartas>1) {
                $cartas --;
                system('clear');
                print "Parabéns! Só faltam " . $cartas;
                //Eliminar num acertado

                array_splice($UNO, $sorteador, 1);

                $sorteador = array_rand($UNO);
                $cartaEsclh = $UNO[$sorteador];

            }

            else {
                $vida--;
                if($vida==0){
                  break 2;
                }
                system('clear');
                print "Voce errou! Você tem " . $vida . " chance(s) ainda.";

               


                

            }
            break;

        case 2:
            system('clear');
            print"\nDica: ". $cartaEsclh->getDica();
            print"\n";
            break;

        case 3:
            system('clear');
            print "=============UNO=============\n";
            foreach ($UNO as $u) {
                print "Símbolo: " . $u->getSimbolo();
                print " | Cor: " . $u->getCor();
                print "\n";
            }

            print "==============================\n";
            break;

        case 0:
            print "Você é um perdedor frangote.\n";
            break;

        default:
            print "Apenas selecione a opção desejada.\n";
            break;
    }

    

} while ($opcao != 0 );

if ($vida==0) {
    print "Você é muito ruim no que faz!\n";
}
