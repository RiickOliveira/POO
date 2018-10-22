<?php 

	class TCheckButton extends TField{

		function show(){

			$this->tag->name = $this->name;
			$this->tag->value = $this->value;
			$this->tag->type = 'checkbox';		
		
			if (!parent::getEditable()){

				$this->tag->readonly = '1';
				$this->tag->class = 'tfield_disabled'; //classe css
			}
						
			$this->tag->show();
		}
	}	





 ?>