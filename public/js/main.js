new Vue({
	el: '#crud',
	// creamos una funciina la cual llamara al metodo
	// cuando se crea el objeto ;e pedimos que llame al metodo lista
	created: function(){
		this.lista();
	},
	data: {
		contenedor: [],
		pagination: {
			// copiamos todo lo del controlador y los inicializamos en 0
			// igualmente le asignamos este arreglo al metodo keep
			'total': 0,
			'current_page': 0,
			'per_page': 0,
			'last_page': 0,
			'from': 0,
			'to': 0,

		},
		
		newDescripcion: '',
		newName: '',
		// para llenar de datos y pasarlo al edit
		fillKeep: {'id': '', 'name': '',  'descripcion': ''},
		// arreglo que contiene los errores
		errors: [],
		// contiene las paginas para pagination 
		offset: 2,
	},
	// para que la pagina actual permanesca activa
	computed: {
		isActived: function() {
			return this.pagination.current_page;
		},
		// calculara las paginas necesarias para colocar el numero de paginas
		pagesNumber: function()
		{
			if (!this.pagination.to) {
				return [];
			}
			// para controlar de que la paginacion no empieze precisamente del uno cuando hay muchos registros

			var from = this.pagination.current_page - this.offset;
			if (from<1) {
				from=1;
			}
			var to = from + (this.offset * 2);
			if (to>=this.pagination.last_page) {
				to=this.pagination.last_page;
			}

			var pagesArray = [];
			while (from<=to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
		}
	},
	// todos los metodos
	methods: {
		//listar
		lista: function(page)
		{
			// es la url que definimos en la ruta
			var url = 'tasks?page='+page;
			// esto traera todos los datos si se cumple
			axios.get(url).then(response=> {
				this.contenedor = response.data.tareas.data,
				// cargamos los datas del controlador
				this.pagination = response.data.pagination
			});
		},
		// para editar llmar el formulario con el texto
		edit: function(edit) {
			this.fillKeep.id= edit.id;
			this.fillKeep.name = edit.name;
			this.fillKeep.descripcion = edit.descripcion;
			$('#edit').modal('show');
		},

		// para actualizar
		update: function(id) {
			// pasar la ruta mas id
			var url= 'tasks/' + id;
			axios.put(url, this.fillKeep).then(response => {
				this.lista();
				this.fillKeep = {'id': '', 'name': '', 'descripcion': ''};
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Tarea actualizada con exito');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		// para eliminar
		eliminar: function(eliminar) {
			// capturamos el id y asignamos la ruta con el e\metodo delete
			var url = 'tasks/' + eliminar.id;
			axios.delete(url).then(response => { //eliminamos
				this.lista(); //listamos para que se vea el cambip
				toastr.success('Eliminado correctamente'); //mensaje
			});
		},
		// fin delete
		crear: function(){
			var url = 'tasks';
			// utilizamos el metodo post que espera la ruta y los parametros que va a guardar
			axios.post(url, {
				name: this.newName, descripcion: this.newDescripcion
			}). then(response=>{
				// si todo sale bien listamos todas las tareas
				this.lista();
				// es lo que hay en el campo de texto, en su estado inicial esta vacia
				this.newName= '';
				this.newDescripcion= '';
				// blaqueamos todos los errores
				this.errors = [];
				// ocultamos el modal
				$('#create').modal('hide');
				// mostramos un mensaje
				toastr.success('Nueva tarea creada con exito');
				// si algo sale mal, mostramos los errores en la variable errors que creamos en la parte superior
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		changePage: function(page){
			this.pagination.current_page=page;
			this.lista(page);
		}
	}
	
});
