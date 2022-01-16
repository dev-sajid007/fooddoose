<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Extra Item Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{route('merchant.extra-item.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Item Name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input class="form-control" type="number" name="quantity"
                               placeholder="0pc">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Price</label>
                        <input class="form-control" type="number" name="price"
                               placeholder="0.00">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
