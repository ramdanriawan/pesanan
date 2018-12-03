<div class="card" ng-controller='editOrderController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Edit Order</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div>
                    <a href='#!addOrder' class='btn btn-success btn-sm'>+Add</a>
                    <a href='#!trashOrder' class='btn btn-danger btn-sm' style='margin-right: 5px'>Trash</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form id='formEditOrder' ng-model='formEditOrder' ng-submit='editOrderInsert()'>
            <input name='id' value='{{ editOrder.id }}' type='hidden' />
            <div class="form-group">
                <label for="">Nama</label>
                <input class='form-control' name='nama' placeholder="Nama.." value='{{ editOrder.nama }}'>
            </div>
            <div class="form-group">
                <label for="">Item</label>
                <select class="form-control" name='item_id' ng-init='item_id = editOrder.item_id' ng-model='item_id'>
                    <option ng-repeat='item in items' value='{{ item.id }}' ng-selected='{{ editOrder.item_id == item.id }}'>{{ item.item }} @{{ item.harga | currency: "Rp": 2 }}, Stok: {{ item.stok }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type='number' ng-model='jumlah' class='form-control' name='jumlah' placeholder="Jumlah.." ng-value='{{ editOrder.jumlah }}'>
                <div class="text-muted" style='margin-top:5px'>
                    <i ng-repeat='item in items' ng-if='item.id == item_id'>
                        <i>Total: {{ jumlah * item.harga | currency : "Rp" : 2}}</i>
                        <input type="hidden" name="total" value="{{ jumlah * item.harga }}">
                    </i>
                </div>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name='status' ng-init='statusList = ["Pending", "Cancel", "Selesai", "Refund"]'>
                    <option ng-repeat='status in statusList' value='{{ status }}' ng-selected='{{ editOrder.status == status }}'>{{ status }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea class='form-control' name='catatan' placeholder="Catatan..">{{ editOrder.catatan }}</textarea>
            </div>
            <div class="form-group">
                <button class='btn btn-success' type="submit">Save</button>
                <button class='btn btn-warning' type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
