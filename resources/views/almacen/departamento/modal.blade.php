<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat->id_departamento}}">
    {{Form::Open(array('action'=>array('DepartamentoController@destroy',$cat->id_departamento),'method'=>'delete' ))}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title">Eliminar Departamento</h4>
        </div>
        <div class="modal-body">
            <p>Confirme si desea Eliminar este Departamento</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </div>
    {{Form::Close()}}
</div>
