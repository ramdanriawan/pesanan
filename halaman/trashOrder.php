<div class="card" ng-controller='itemController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Trash Orders</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div>
                    <a href='#!addOrder' class='btn btn-success btn-sm'>+Add</a>
                    <a href='#!trashOrder' class='btn btn-danger btn-sm' style='margin-right: 5px'>Trash</a>
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
                                <th>Nama</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Ctt</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody ng-repeat='trashOrder in trashOrders | filter:inputFilter | orderBy: $index: true'>
                            <tr>
                                <td>
                                    {{ trashOrder.nama }}
                                </td>
                                <td>
                                    <span ng-repeat='item in items' ng-if='item.id == trashOrder.item_id'>
                                        <a href='#!orderTotal' class='text-info' ng-click='orderTotalMethod(trashOrder)'>{{ item.item }}*{{ trashOrder.jumlah }}</a>
                                    </span>
                                </td>
                                <td>
                                    <span ng-if='trashOrder.status == "Pending"' class='text-warning'>
                                        {{ trashOrder.status }}
                                    </span>
                                    <span ng-if='trashOrder.status == "Cancel"' class='text-danger'>
                                        {{ trashOrder.status }}
                                    </span>
                                    <span ng-if='trashOrder.status == "Selesai"' class='text-success'>
                                        {{ trashOrder.status }}
                                    </span>
                                    <span ng-if='trashOrder.status == "Refund"' class='text-muted'>
                                        {{ trashOrder.status }}
                                    </span>
                                </td>
                                <td >
                                	<div class="d-flex justify-content-center">
	                                   <a href='#!showOrderDesc' ng-click='showOrderDescMethod(trashOrder)'>
	                                        <i class="fas fa-sticky-note text-warning"></i>
	                                    </a>
                                	</div>
                                </td>
                                <td class="d-flex justify-content-center">
                                	<div class="d-flex justify-content-center">
	                                    <a ng-click='restoreOrderMethod(trashOrder)'>
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
