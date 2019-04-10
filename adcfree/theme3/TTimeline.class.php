<?php
class TTimeline {

    private $main = null;

    public function __construct($itens = array()) {

        $divrow = new TElement("div");
        $divrow->class = "row";
        $divrow->style = "width:100%";

        $divcol12 = new TElement("div");
        $divcol12->class = "col-md-12";
        $divrow->add($divcol12);

        $ul = new TElement("ul");
        $ul->class = "timeline";
        $divcol12->add($ul);
        
        $controledata = '';

        foreach($itens as $item)
        {
                //lista
                if($item)
                {
                                    
                    $divdata = new TElement("li");
                    $divdata->class = "time-label";
                            
                    $span1 = new TElement("span");
                    $span1->class = "bg-blue";
                    $span1->add($item->data);
                    $divdata->add($span1);

                    $divlista = new TElement("li");
                    $divlista->add('<i class="fa fa-envelope bg-blue"></i>');
                    
                    $divtimelineitem = new TElement("div");
                    $divtimelineitem->class = "timeline-item";
                    $divlista->add($divtimelineitem);
                    $divtimelineitem->add('<span class="time" style="font-color:black"><i class="fa fa-clock-o"></i><b>'.$item->hora.'</b></span>');
                    $divtimelineitem->add('<h3 class="timeline-header"><a href="#">'.$item->nome_usuario.'</a>'.$item->complemento.'</h3>');
                    $divtimelineitem->add('<img src="'.$item->caminho.'" >');
                    

                    $divtimelinebody = new TElement("div");
                    $divtimelinebody->class = "timeline-body";
                    $divtimelinebody->style = "background-color:#FFFAFA";
                    $divtimelinebody->add($item->conteudo);
                    
                    $divtimelineitem->add($divtimelinebody);
                    
                    if($controledata == '' || $controledata != $item->data)
                    {
                        $ul->add($divdata);
                        $controledata = $item->data;
                    }
                    

                    $ul->add($divlista);
                    
                }                
        }
                          
        $this->main = $divrow ;
        
    }
    
    public function show(){
        echo $this->main;
    }
}
?>