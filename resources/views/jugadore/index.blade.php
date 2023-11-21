@extends('admin.layouts.master')


@section('template_title')
    Jugadore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4>Jugadores</h4>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('jugadore.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear un Nuveo Jugador
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table class="table table-striped table-hover table-bordered nowrap" id="MyTable"">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Imagen</th>
										<th>Equipo</th>
										<th>Posicion</th>
										<th>Numero Jugador</th>
										<th>Edad</th>
										<th>Dni</th>
                                        <th>Acciones</th>
										<th>Genero Id</th>
										<th>Telefono</th>
										<th>Direccion</th>
										<th>Nombre Responsable</th>
										<th>Dni Responsable</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jugadores as $jugadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jugadore->nombre }}</td>
											<td>{{ $jugadore->apellido }}</td>
											<td><img src="{{ asset('storage/fotos/'.$jugadore->imagen) }}" width="50" class="img-thumbnail rounded-circle"></td>
											<td>{{ $jugadore->equipo->nombre }}</td>
											<td>{{ $jugadore->posicione->posicion }}</td>
											<td>{{ $jugadore->numero_jugador }}</td>
											<td>{{ $jugadore->edad }}</td>
                                            <td>{{ $jugadore->dni }}</td>
                                            <td>
                                                <form action="{{ route('jugadore.destroy',$jugadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('jugadore.show',$jugadore->id) }}"><i class="fa fa-fw fa-eye"></i>Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('jugadore.edit',$jugadore->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="display: none;"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                                <a href="#" id="{{ $jugadore->id }}" class="btn btn-danger btn-sm deleteIcon"><i class="fa fa-fw fa-trash"></i>Eliminar</a>
                                            </td>
											<td>{{ $jugadore->genero->nombre }}</td>
											<td>{{ $jugadore->telefono }}</td>
											<td>{{ $jugadore->direccion }}</td>
											<td>{{ $jugadore->nombre_responsable }}</td>
											<td>{{ $jugadore->dni_responsable }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jugadores->links() !!}
            </div>
        </div>
    </div>
@endsection


@section('Myjavascript')

<script >

var table = new DataTable('#MyTable', {

    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 1 },

    ] ,  "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior"
            }
        }, 
 

});

table.buttons().container()
        .appendTo( '#MyTable_wrapper .col-md-6:eq(0)' );

 


      document.addEventListener('click', function(e) {
    if (e.target.classList.contains('deleteIcon')) {
        e.preventDefault();
        let id = e.target.id;
        let csrf = '{{ csrf_token() }}';

        Swal.fire({
            title: '¿Quieres eliminar este registro?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`{{ url('jugadore') }}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf
                    },
                    // No necesitas JSON.stringify para enviar solo el ID
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    Swal.fire(
                        'Eliminado',
                        'Registro eliminado con éxito.',
                        'success'
                    );
                    
                })
              // Recargar la página
              location.reload();
            }
        });
    }
});



</script>
@endsection
