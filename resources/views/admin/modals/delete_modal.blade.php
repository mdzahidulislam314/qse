<div class="modal fade md-effect-3" id="delete-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                    <p class="mt-1">Are you sure to delete this?</p>
                    <button type="button" class="btn btn-link mt-2 text-warning" data-dismiss="modal">Cancel</button>
                    <button id="delete-link" type="submit" class="btn btn-warning alert-confirm mt-2">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>