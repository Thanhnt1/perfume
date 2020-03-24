<div class="modal fade" id="modal-delete" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">{{trans('product.confirm_deletion')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                {{trans('product.do_you_really_want_to_delete_this_item')}}
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">{{trans('product.cancel')}}</button>
                <button type="button" class="btn btn-submit-delete btn-danger">{{trans('product.submit')}}</button>
            </div>
            
        </div>
    </div>
</div>