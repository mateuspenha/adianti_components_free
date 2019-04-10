<?php
class TListaQtd {

    private $main = null;

    public function __construct($titulo,$itens = array(), $qtdtotal) {

        $divrow = new TElement("div");
        $divrow->class = "col-md-4";

        $divbox = new TElement("div");
        $divbox->class = "box";
        $divrow->add($divbox);

        $divborder = new TElement("div");
        $divborder->class = "box-header with-border";

        $p = new TElement("p");
        $p->class = "text-center";
        $p->add('<strong>'.$titulo.'</strong>');
        $divborder->add($p);
        
        $divbox->add($divborder);

        $divboxbody = new TElement("div");
        $divboxbody->class = "box-body";                
        $divbox->add($divboxbody);
                                       
        foreach($itens as $item)
        {
                //lista
                if($item)
                {
                        $divprogressgroup = new TElement("div");
                        $divprogressgroup->class = "progress-group";
                                
                        $span1 = new TElement("span");
                        $span1->class = "progress-text";
                        $span1->add($item->nome);
                        $divprogressgroup->add($span1);
                        
                        $span2 = new TElement("span");
                        $span2->class = "progress-number";
                        $span2->add('<b>'.$item->qtdregistro.'</b>/'.$qtdtotal);
                        $divprogressgroup->add($span2);
                
                        $divprogresssm = new TElement("div");
                        $divprogresssm->class = "progress sm";
                        $divprogressbar = new TElement("div");
                        $divprogressbar->class = "progress-bar progress-bar-".$item->cor;
                        $percentual = $item->qtdregistro/$qtdtotal*100;
                        $divprogressbar->style = "width: ".$percentual."%";
                        $divprogresssm->add($divprogressbar);
                        $divprogressgroup->add($divprogresssm);
                        
                        $divboxbody->add($divprogressgroup);
                }                
        }
                          
        $this->main = $divrow ;
        
    }
    
    public function show(){
        echo $this->main;
    }
}
?>