<div class="card" ng-controller='itemController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Items</h4>
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
                        <tbody ng-repeat='item in items | filter:inputFilter | orderBy: $index: true'>
                            <tr>
                                <td>
                                    {{ item.item }}
                                </td>
                                <td>
                                    {{ item.harga }}
                                </td>
                                <td>
                                    {{ item.stok }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='#!showItemDesc' ng-click='showItemDescMethod(item)'>
                                            <i class="fas fa-sticky-note text-warning"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='#!editItem' ng-click='editItemMethod(item)' style="padding-right: 5px;">
                                            <i class='fas fa-pen text-secondary ml-1'></i>
                                        </a>
                                        <a ng-click='removeItem(item)'>
                                            <i class='fas fa-times text-danger ml-1'></i>
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
