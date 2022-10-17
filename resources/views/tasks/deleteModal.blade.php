<form action="{{route('tasks.destroy',$task->id)}}"
      method="POST" style="display: inline-block">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <div class="modal fade" id="ModalDelete{{$task->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you sure you want to delete <b class="text-danger">{{ $task->title }}</b></div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn gray btn-outline-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

</form>



