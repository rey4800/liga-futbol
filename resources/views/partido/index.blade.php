@extends('admin-torneo.layouts.master')

@section('template_title')
    Partido
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h4>Gestionar Partidos</h4>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('partido.create',$torneo->id) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                 Crear un Nuevo Partido
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
                                        
										<th>Torneo Id</th>
										<th>Titular</th>
										<th>Direccion</th>
										<th>Equipo Local Id</th>
										<th>Equipo Visitante Id</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Estado Id</th>
										<th>Goles Local</th>
										<th>Goles Visitante</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partidos as $partido)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $partido->torneo_id }}</td>
											<td>{{ $partido->titular }}</td>
											<td>{{ $partido->direccion }}</td>
											<td>{{ $partido->equipo1->nombre }}</td>
											<td>{{ $partido->equipo2->nombre }}</td>
											<td>{{ $partido->fecha }}</td>
											<td>{{ $partido->hora }}</td>
											<td>{{ $partido->estado->estado }}</td>
											<td>{{ $partido->goles_local }}</td>
											<td>{{ $partido->goles_visitante }}</td>

                                            <td>
                                                <form action="{{ route('partido.destroy',['torneo' => $torneo->id, 'partido' => $partido->id]) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('partido.show',['torneo' => $torneo->id, 'partido' => $partido->id]) }}"><i class="fa fa-fw fa-eye"></i> Administrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('partido.edit',['torneo' => $torneo->id, 'partido' => $partido->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

 
</script>
@endsection