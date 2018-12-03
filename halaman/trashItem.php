<div class="card" ng-controller='itemController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Trash Items</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div>
                    <a href='#!addItem' class='btn btn-success btn-sm'>+Add</a>
                    <a href='#!trashItem' class='btn btn-danger btn-sm' style='margin-right: 5px'>Trash</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input style='margin: 5px 0' class='form-control input-sm float-right' ng-model='inputFilter' placeholder="Filter..."/>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Desc</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <span ng-init='orderBy = [inputFilter, $index, "item", "stok", "catatan"]'></span>
                        <tbody ng-repeat='trashItem in trashItems | filter:inputFilter | orderBy: $index: true'>
                            <tr>
                                <td>
                                    {{ trashItem.item }}
                                </td>
                                <td>
                                    {{ trashItem.harga }}
                                </td>
                                <td>
                                    {{ trashItem.stok }}
                                </td>
                                <td >
                                	<div class="d-flex justify-content-center">
	                                   <a href='#!showItemDesc' ng-click='showItemDescMethod(trashItem)'>
	                                        <i class="fas fa-sticky-note text-warning"></i>
	                                    </a>
                                	</div>
                                </td>
                                <td class="d-flex justify-content-center">
                                	<div class="d-flex justify-content-center">
	                                    <a ng-click='restoreItemMethod(trashItem)'>
	                                        <i class='fas fa-undo text-primary ml-1'></i>
	                                    </a>
                                	</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
