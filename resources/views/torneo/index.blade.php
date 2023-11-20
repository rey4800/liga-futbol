@extends('admin.layouts.master')

@section('template_title')
    Torneo
@endsection


@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                              <h3>Torneos</h3>  
                            </span>

                             <div class="float-right">
                                <a href="{{ route('torneo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear un Nuevo Torneo
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
                            <table class="table table-striped table-hover table-bordered nowrap" id="MyTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Descripcion</th>
                                        <th>Estado Id</th>
                                        <th>Acciones</th>
                                        <th>Categoria Id</th>
										<th>Genero Id</th>
										<th>Departamento Id</th>
										<th>Rango Horas</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										

                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($torneos as $torneo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $torneo->nombre }}</td>
											<td>{{ $torneo->descripcion }}</td>
                                            <td>{{ $torneo->estado->estado }}</td>
                                            <td>
                                                <form action="{{ route('torneo.destroy',$torneo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('torneo.show',$torneo->id) }}"><i class="fa fa-fw fa-eye"></i> Administrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('torneo.edit',$torneo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="display: none"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                                <a href="#" id="{{ $torneo->id }}" class="btn btn-danger btn-sm deleteIcon"><i class="fa fa-fw fa-trash"></i>Eliminar</a>
                                            </td>
                                            <td>{{ $torneo->categoria->categoria }}</td>
											<td>{{ $torneo->genero->nombre }}</td>
											<td>{{ $torneo->departamento->departamento }}</td>
											<td>{{ $torneo->rango_horas }}</td>
											<td>{{ $torneo->fecha_inicio }}</td>
											<td>{{ $torneo->fecha_fin }}</td>
										

                                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $torneos->links() !!}
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
                fetch(`{{ url('torneo') }}/${id}`, {
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