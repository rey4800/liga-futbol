@extends('admin.layouts.master')

@section('template_title')
    Ubicacione
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ubicacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ubicacione.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th data-priority="1">Ubicacion</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ubicaciones as $ubicacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ubicacione->ubicacion }}</td>
											<td>{{ $ubicacione->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('ubicacione.destroy',$ubicacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ubicacione.show',$ubicacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ubicacione.edit',$ubicacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ubicaciones->links() !!}
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