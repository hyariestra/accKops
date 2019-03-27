<?php

class m_menu extends CI_Model
 {
     function __construct()
     {
         parent::__construct();
     }

     function getMenu($parent,$hasil){
         $w = $this->db->query("SELECT * from menu where parent_id='".$parent."' order by menu_order");
         foreach($w->result() as $h)
         {
			 $cek_parent=$this->db->query("SELECT * from menu WHERE parent_id=".$h->id_menu."");
         if(($cek_parent->num_rows())>0){
				$hasil .= '<li class="dropdown"><a href="'.base_url().'blog/read/'.$h->id_menu.'" class="dropdown-toggle" data-toggle="dropdown">'.$h->menu.' &nbsp;<b class="caret"></b></a> ';
				}
            else {
					$hasil.='<li><a href="'.base_url().'blog/read/'.$h->id_menu.'">'.$h->menu.'</a></li>';
				}
				$hasil .='<ul class="dropdown-menu">';
				$hasil = $this->getMenu($h->id_menu,$hasil);
				$hasil .='</ul>';		
				$hasil .= "</li></li>";
         }
         
         return str_replace('<ul class="dropdown-menu"></ul>','',$hasil);
     }     
     
 
   
}		
 ?>
