<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Issue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('merchant.reject-order')}}">
                @csrf
                <input id="order_id" name="order_id" hidden readonly>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1" class="text-start">Issue</label>
                        <textarea class="form-control" type="text" name="reject_issue" placeholder="Enter reject issue"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
