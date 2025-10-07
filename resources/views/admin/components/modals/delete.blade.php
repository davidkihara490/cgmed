<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="delete-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title" id="delete-modalLabel">Confirm Deletion</h4>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $message }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" wire:click="deleteItem" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="deleteItem">Delete</span>
                    <span wire:loading wire:target="deleteItem">Deleting...</span>
                </button>
            </div>
        </div>
    </div>
</div>
