<div class="card" ng-controller='orderController'>
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Orders</h4>
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
                        <tbody ng-repeat='order in orders | filter:inputFilter | orderBy: $index: true'>
                            <tr>
                                <td>
                                    {{ order.nama }}
                                </td>
                                <td>
                                    <span ng-repeat='item in items' ng-if='item.id == order.item_id'>
                                        <a href='#!orderTotal' class='text-info' ng-click='orderTotalMethod(order)'>{{ item.item }}*{{ order.jumlah }}</a>
                                    </span>
                                </td>
                                <td>
                                    <span ng-if='order.status == "Pending"' class='text-warning'>
                                        {{ order.status }}
                                    </span>
                                    <span ng-if='order.status == "Cancel"' class='text-danger'>
                                        {{ order.status }}
                                    </span>
                                    <span ng-if='order.status == "Selesai"' class='text-success'>
                                        {{ order.status }}
                                    </span>
                                    <span ng-if='order.status == "Refund"' class='text-muted'>
                                        {{ order.status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='#!showOrderDesc' ng-click='showOrderDescMethod(order)'>
                                            <i class="fas fa-sticky-note text-warning"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='#!editOrder' ng-click='editOrderMethod(order)' style="padding-right: 5px;">
                                            <i class='fas fa-pen text-secondary ml-1'></i>
                                        </a>
                                        <a ng-click='removeOrderMethod(order)'>
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
