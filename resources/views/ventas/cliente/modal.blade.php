<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$per->id}}">
    {{Form::Open(array('action'=>array('ClienteController@destroy',$per->id), 'method'=>'delete'))}}
    {{-- {{Form::token()}} --}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Cliente</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea eliminar el cliente</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>

    </div>

    {{Form::close()}}
</div>