<div class="card" ng-controller='addOrderController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Add Order</h4>
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
        <form id='formAddOrder' ng-model='formAddOrder' ng-submit='addOrderInsert()'>
            <div class="form-group">
                <label for="">Nama</label>
                <input class='form-control' name='nama' ng-model='nama' placeholder="Nama.." required>
            </div>
            <div class="form-group">
                <label for="">Item</label>
                <select class='form-control' name='item_id'>
                    <option ng-repeat='item in items' ng-value='{{ item.id }}'>{{ item.item }} @{{ item.harga | currency: "Rp": 2 }}, Stok: {{ item.stok }}, {{ item_id }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type='number' ng-init='jumlah = 1' ng-model='jumlah' class='form-control' name='jumlah' placeholder="Jumlah.." value='1' required>
                <div class="text-muted" style='margin-top:5px'>
                    <i ng-repeat='item in items' ng-if='item.id == item_id'>
                        <i>Total: {{ jumlah * item.harga | currency : "Rp" : 2}}</i>
                        <input type="hidden" name="total" value="{{ jumlah * item.harga }}">
                    </i>
                </div>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <span ng-init='statuies = ["Pending"]'></span>
                <select class="form-control" name='status' ng-model='status' ng-init='status = "Pending"' required>
                    <option ng-repeat='status in statuies' value='Pending'>{{ status }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea class='form-control' name='catatan' placeholder="Catatan.." ng-model='catatan'></textarea>
            </div>
            <div class="form-group">
                <button class='btn btn-success' type="submit">+Add</button>
                <button class='btn btn-warning' type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
