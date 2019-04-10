<?php

use Adianti\Widget\Base\TScript;

class TGrafico {

    private $main = null;
    const CardAcua = "bg-aqua";
    const CardGreen = "bg-green";
    const CardRed = "bg-red";
    const CardYellow= "bg-yellow";

    public function __construct($title, $subtitulo, $type, $tamanho, $barras= array(), $valores = array()) {

        
        $divrow = new TElement("div");
        $divrow->class = "col-md-6";

        $divbox = new TElement("div");
        $divbox->class = "box";
        $divrow->add($divbox);
        
        $div = new TElement("canvas");
        $div->class = "line-chart";        
        $divbox->add($div);
        
        $barrax = "[".implode(',', explode( ',', sprintf( "'%s'", implode( "','", $barras ) ) ))."]";

        $valoresy = "[".implode(',', explode( ',', sprintf( "'%s'", implode( "','", $valores ) ) ))."]";
        
        $script = 
        "
        var ctx = document.getElementsByClassName('line-chart');

        var grafico = new Chart(ctx,{
            type: '$type',
            data: {
                labels: $barrax,
                datasets:[
                {
                    label:'$subtitulo',
                    data: $valoresy,
                    borderWidth: 5,
                    borderColor: 'rgba(77,166,253,0.85)',
                    backgroundColor: 'transparent'
                }           
                ]
            },
            options:{
                title:{
                    display:  true,
                    fontSize: 15,
                    text: '$title'
                },
                labels:{
                    fontStyle: 'bold'
                }
            }
            
        });            
        ";
        
        TScript::create($script);

        $this->main = $divrow;
        
    }
    
    public function show(){
        echo $this->main;
    }
}
?>