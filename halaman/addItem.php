<div class="card" ng-controller='addItemController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Add Item</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div>
                    <a href='#!addItem' class='btn btn-success btn-sm'>+Add</a>
                    <a href='#!trashItem' class='btn btn-danger btn-sm' style='margin-right: 5px'>Trash</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form id='formAddItem' ng-model='formAddItem' ng-submit='formAddItemInsert()'>
            <div class="form-group">
                <label for="">Item</label>
                <input class='form-control' ng-model='item' name='item' placeholder="item..">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type='number' class='form-control'  ng-model='harga' name='harga' placeholder="Harga..">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input class='form-control'  ng-model='stok' name='stok' placeholder="stok" type='number'>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class='form-control'  ng-model='deskripsi' name='deskripsi' placeholder="deskripsi.."></textarea>
            </div>
            <div class="form-group">
                <button class='btn btn-success' type="submit">+Add</button>
                <button class='btn btn-warning' type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
