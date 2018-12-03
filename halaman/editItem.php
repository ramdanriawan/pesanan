<div class="card" ng-controller='addItemController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Edit Item {{ editItem.item }}</h4>
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
        <form id='formEditItem' ng-model='formAddItem' ng-submit='formEditItemInsert()'>
        	<input type='hidden' value='{{ editItem.id }}' name='id'>
            <div class="form-group">
                <label for="">Item</label>
                <input class='form-control' name='item' placeholder="item.." value='{{ editItem.item }}'>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type='number' class='form-control' name='harga' placeholder="Harga.." value='{{ editItem.harga }}'>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-8">
                        <label for="">Stok</label>
                        <input  type='number' class='form-control' ng-model='stok' name='stok' placeholder="stok">
                    </div>
                    <div class="col-4">
                        <label for="">Inc</label>
                        <input  type='number' class='form-control' ng-model='addStok' name='addStok' placeholder="Add" ng-change='itemCountStok(this)'>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class='form-control' name='deskripsi' placeholder="deskripsi..">{{ editItem.deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <button class='btn btn-success' type="submit">Save</button>
                <button class='btn btn-warning' type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
