<?php
class TSmallCard {

    private $main = null;
    const CardAcua = "bg-aqua";
    const CardGreen = "bg-green";
    const CardRed = "bg-red";
    const CardYellow= "bg-yellow";

    public function __construct($title,$value,$iconCLass,$color,$linkHref=null,$linkText=null) {

        $divParent = new TElement("div");
        $divParent->class = "col-lg-3 col-xs-6";
        
        $div = new TElement("div");
        $div->class = "small-box $color";
        
        $divInner = new TElement("div");
        $divInner->class = "inner";
        $divInner->style = "height:110px";
        $divInner->add("<h3>$value</h3>
            <p>$title</p>");
            
        $divIcon = new TElement("div");
        $divIcon->class = "icon";
        $icon = new TElement("i");
        $icon->class = $iconCLass;
        $link = new TElement("a");
        $link->class = "small-box-footer";
        $link->href = $linkHref;
        $link->add($linkText.'<i class=\"fas fa-arrow-right\"></i>');
        $divIcon->add($icon);
        
        $div->add($divInner);
        $div->add($divIcon);
        $div->add($link);
        $divParent->add($div);
        $this->main = $divParent;
        
    }
    
    public function show(){
        echo $this->main;
    }
}
?>