<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminVizzuClientesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "vizzu_clientes";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			$this->col[] = ["label"=>"Sexo","name"=>"sexo"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nome Completo','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Você pode digitar somente letras'];
			$this->form[] = ['label'=>'E-mail','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:vizzu_clientes','width'=>'col-sm-10','placeholder'=>'Por favor digite um endereço de e-mail válido'];
			$this->form[] = ['label'=>'Senha','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-10','help'=>'Mínimo de 5 caracteres. Por favor deixe vazio se você não quer alterar a senha.'];
			$this->form[] = ['label'=>'CPF/CPNJ','name'=>'cpf_cnpj','type'=>'text','validation'=>'formato_cpf_cnpj|cpf_cnpj','width'=>'col-sm-10','help'=>'CPF no formato 000.000.000-00 ou CPNJ no formato 00.000.000/0000-00.'];
			$this->form[] = ['label'=>'Celular','name'=>'celular','type'=>'text','validation'=>'required|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sexo','name'=>'sexo','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Masculino;Feminino'];
			$this->form[] = ['label'=>'Data de Nascimento','name'=>'data_nascimento','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Ativo;Inativo'];
			$this->form[] = ['label'=>'Foto de Perfil','name'=>'profile_photo_path','type'=>'upload','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nome Completo','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Você pode digitar somente letras'];
			//$this->form[] = ['label'=>'E-mail','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:vizzu_clientes','width'=>'col-sm-10','placeholder'=>'Por favor digite um endereço de e-mail válido'];
			//$this->form[] = ['label'=>'Senha','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-10','help'=>'Mínimo de 5 caracteres. Por favor deixe vazio se você não quer alterar a senha.'];
			//$this->form[] = ['label'=>'CPF/CPNJ','name'=>'cpf_cnpj','type'=>'text','validation'=>'formato_cpf_cnpj|cpf_cnpj','width'=>'col-sm-10','help'=>'CPF no formato 000.000.000-00 ou CPNJ no formato 00.000.000/0000-00.'];
			//$this->form[] = ['label'=>'Celular','name'=>'celular','type'=>'text','validation'=>'required|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sexo','name'=>'sexo','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Masculino;Feminino'];
			//$this->form[] = ['label'=>'Data de Nascimento','name'=>'data_nascimento','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Ativo;Inativo'];
			//$this->form[] = ['label'=>'Foto de Perfil','name'=>'profile_photo_path','type'=>'upload','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();

	        $columns[] = ['label'=>'CEP','name'=>'cep','type'=>'text','required'=>'true', 'validation'=>'required|min:0','width'=>'col-sm-10'];
			$columns[] = ['label'=>'Logradouro','name'=>'logradouro','type'=>'text','required'=>true,'width'=>'col-sm-10'];
			$columns[] = ['label'=>'Número','name'=>'numero','type'=>'text','required'=>true,'width'=>'col-sm-10'];
			$columns[] = ['label'=>'Complemento','name'=>'complemento','type'=>'text'];
			$columns[] = ['label'=>'Bairro','name'=>'bairro','type'=>'text','required'=>true,'width'=>'col-sm-10'];
			$columns[] = ['label'=>'Cidade','name'=>'cidade','type'=>'text','required'=>true,'width'=>'col-sm-10'];
			$columns[] = ['label'=>'Estado','name'=>'uf','type'=>'text','required'=>true,'width'=>'col-sm-10'];
			$columns[] = ['label'=>'Ponto de Referência','name'=>'referencia','type'=>'text'];
			$columns[] = ['label'=>'Status','name'=>'status','type'=>'radio','dataenum'=>'Ativo;Inativo'];
			$this->form[] = ['label'=>'Endereços','name'=>'vizzu_clientes_end','type'=>'child','columns'=>$columns,'table'=>'vizzu_clientes_end','foreign_key'=>'id_cliente', 'width'=>'col-sm-10'];


			$this->sub_module[] = ['label'=>'Agendamento de Serviços','path'=>'vizzu_clientes_agendamento','parent_columns'=>'name','foreign_key'=>'id_cliente','button_color'=>'success','button_icon'=>'fa fa-bars'];

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = "
			  $(function() {
			  	if(typeof cpf_cnpj !== 'undefined'){

		            if (cpf_cnpj !== null) {
			            $(cpf_cnpj).inputmask({\"mask\": ['999.999.999-99', '99.999.999/9999-99']});
			        }

			    }
			    if(typeof celular !== 'undefined'){

			        if (celular !== null) {
			            $(celular).inputmask({\"mask\": ['(99) 9999[9]-9999']});
			        }

			    }
			    if(typeof enderecoscep !== 'undefined'){
			        if (enderecoscep !== null) {
			            $(enderecoscep).inputmask({\"mask\": ['99999-999']});
			        }
			    }
			  });
			";
            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}