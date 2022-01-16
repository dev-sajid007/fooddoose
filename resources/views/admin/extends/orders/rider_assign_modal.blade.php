<div class="modal fade" id="assign-rider-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rider Assign</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('assign.rider')}}">
                @csrf
                <input id="order_id" name="order_id" readonly hidden>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Name</label>
                        <select class="form-control" id="rider_id" name="rider_id">
                            <option selected disabled value="">Select One</option>
                            @if (!empty($riders))
                                @foreach ($riders as $k => $rider)
                                    <option value="{{$rider->id}}">{{$rider->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input class="form-control" type="text" id="phone" name="phone" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input class="form-control" type="email" id="email" name="email" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>
