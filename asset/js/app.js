var user = 'user001';
var databaseUrlItem = `/pesanan/database/users/${user}/item/db${user}.json`;
var databaseUrlOrder = `/pesanan/database/users/${user}/order/db${user}.json`;
var databaseUrlTrashOrder = `/pesanan/database/users/${user}/trashOrder/db${user}.json`;
var databaseUrlTrashItem = `/pesanan/database/users/${user}/trashItem/db${user}.json`;

// inisialisasi module
var app = angular.module('app', ['ngRoute', 'ngSanitize']);

//untuk event ketika form login di submit
app.controller('loginController', function($scope) {
    $scope.formLoginSubmit = function() {
        if ($scope.username == 'admin' && $scope.password == 'admin') {
            location.href = '/pesanan/halaman/';
        } else {
            swal({
                title: 'Invalid',
                type: 'error',
                text: 'Login Invalid Credentials!',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        }
    }
});

// untuk membuat filter ke string
app.filter('convertToString', function(){
    return function(input){
        var input = input.toString();
        return input;
    }
})

// untuk membuat filter ke integer
app.filter('convertToNumber', function(){
    return function(input){
        var input = Number(input);
        return input;
    }
})

//untuk mengalihkan link
app.config(function($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'order.php',
        controller: 'orderController'
    });

    $routeProvider.when('/item', {
        templateUrl: 'item.php',
        controller: 'itemController'
    });

    $routeProvider.when('/addItem', {
        templateUrl: 'addItem.php',
        controller: 'addItemController'
    });

    $routeProvider.when('/editItem', {
        templateUrl: 'editItem.php',
        controller: 'editItemController'
    });

    $routeProvider.when('/showItemDesc', {
        templateUrl: 'showItemDesc.php',
        controller: 'showItemDescController'
    });

    $routeProvider.when('/order', {
        templateUrl: 'order.php',
        controller: 'orderController'
    });

    $routeProvider.when('/orderTotal', {
        templateUrl: 'orderTotal.php'
    });

    $routeProvider.when('/addOrder', {
        templateUrl: 'addOrder.php',
        controller: 'addOrderController'
    });

    $routeProvider.when('/editOrder', {
        templateUrl: 'editOrder.php',
        controller: 'editOrderController'
    });

    $routeProvider.when('/trashItem', {
        templateUrl: 'trashItem.php',
        controller: 'trashItemController'
    });

    $routeProvider.when('/trashOrder', {
        templateUrl: 'trashOrder.php',
        controller: 'trashOrderController'
    });

    $routeProvider.when('/showOrderDesc', {
        templateUrl: 'showOrderDesc.php',
        controller: 'showOrderDescController'
    });

    $routeProvider.otherwise({
        redirectTo: '/',
    });
});

// rootscope untuk database
app.run(function($rootScope, $http, $routeParams) {
    // untuk mengambil data items
    $http.get(databaseUrlItem).then(function(response) {
        $rootScope.items = response.data.items;
    });

    //untuk mengambil data trashItems
    $http.get(databaseUrlTrashItem).then(function(response) {
        $rootScope.trashItems = response.data.trashItems;
    });

    //untuk mengambil data orderan
    $http.get(databaseUrlOrder).then(function(response) {
        $rootScope.orders = response.data.orders;
    });

    // untuk mengambil data trash orders
    $http.get(databaseUrlTrashOrder).then(function(response) {
        $rootScope.trashOrders = response.data.trashOrders;
    });

    // untuk mendapatkan order total
    $rootScope.orderTotalMethod = function(orderTotal) {
        $rootScope.orderTotal = orderTotal;
    };

    //untuk menghitung stok
    $rootScope.editItemStok = function(stok, addStok) {
        var stok = parseInt(stok);
        var addStok = parseInt(addStok);

        return stok + addStok;
    }
});

//itemController
app.controller('itemController', function($scope, $http, $rootScope) {
    $scope.items = $rootScope.items;

    $scope.removeItem = function(item) {
        $index = $rootScope.items.findIndex(items => items.id == item.id);

        if (confirm('Hapus data ini?') === true) {
            var removeItem = $rootScope.items.splice($index, 1);

            $http({
                method: 'post',
                url: '/pesanan/server/removeItem.php',
                data: {
                    "items": $rootScope.items
                },
            }).then(function(response) {

                $http({
                    method: 'post',
                    url: '/pesanan/server/trashItem.php',
                    data: removeItem[0],
                }).then(function(response) {
                    $rootScope.trashItems.push(removeItem[0]);

                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        text: 'Berhasil Menghapus Data!',
                        showConfirmButton: false,
                        timer: 1000,
                        position: 'top',
                    }, function(error) {
                        swal({
                            title: 'Error',
                            type: 'error',
                            text: 'Mohon Periksa Internet Anda',
                            showConfirmButton: false,
                            timer: 1000,
                            position: 'top',
                            toast: true
                        });
                    });
                });
            });
        }
    };

    // buat fungsi untuk mengambil data edit item dan akan dikelola di editItemController
    $scope.editItemMethod = function(item) {
        $rootScope.editItem = item;
    };

    // untuk menampilkan note
    $scope.showItemDescMethod = function(item) {
        $rootScope.showItemDesc = item;
    };
});

//addItemController
app.controller('addItemController', function($scope, $http, $rootScope) {
    $scope.formAddItemInsert = function() {
        var formAddItem = document.getElementById('formAddItem');
        var formAddItemData = serialize(formAddItem, {
            hash: true
        });

        formAddItemData.id = Math.random();
        formAddItemData.action = `<a href='#'><i class='fas fa-check text-success ml-1'></i></a> <a href='#'><i class='fas fa-trash-alt text-danger ml-1'></a>`;

        $http({
            method: 'post',
            url: '/pesanan/server/addItem.php',
            data: formAddItemData
        }).then(function(response) {
            $rootScope.items.push(formAddItemData);

            swal({
                title: 'Berhasil',
                type: 'success',
                text: 'Berhasil Menambah Data!',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
            });

            $scope.item = '';
            $scope.harga = '';
            $scope.stok = '';
            $scope.deskripsi = '';

        }, function(error) {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Mohon Periksa Internet Anda',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        });
    }
});

// edit item controller
app.controller('editItemController', function($scope, $http, $rootScope) {
    $rootScope.stok = parseInt($rootScope.editItem.stok);
    $rootScope.addStok = 0;

    $scope.itemCountStok = function(This) {
        var stok = parseInt($rootScope.editItem.stok);
        var addStok = parseInt(This.addStok);

        if (This.addStok != null) {
            $rootScope.stok = stok + addStok;
        }
    }

    $scope.formEditItemInsert = function() {
        var formEditItem = serialize(document.getElementById('formEditItem'), {
            hash: true
        });

        var index = $rootScope.items.findIndex(x => x.id == formEditItem.id);

        if ($rootScope.stok >= 0) {
            $http({
                method: 'POST',
                url: '/pesanan/server/editItem.php',
                data: formEditItem
            }).then(function(response) {
                $rootScope.items[index] = formEditItem;

                swal({
                    title: 'Berhasil',
                    type: 'success',
                    text: 'Berhasil Mengedit Data',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top',
                    toast: true
                });
            }, function(error) {
                swal({
                    title: 'Error',
                    type: 'error',
                    text: 'Mohon Periksa Internet Anda!',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top',
                    toast: true
                });
            });
        } else {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Stok Tidak Boleh Mines!',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        }
    }
});

// show item desc controller
app.controller('showItemDescController', function($scope, $rootScope) {

});

// trash item controller
app.controller('trashItemController', function($scope, $rootScope, $http) {
    $scope.restoreItemMethod = function(trashItem) {
        $index = $rootScope.trashItems.findIndex(x => x.id == trashItem.id);

        $http({
            method: 'POST',
            url: '/pesanan/server/restoreItem.php',
            data: trashItem
        }).then(function(response) {
            swal({
                title: 'Berhasil',
                type: 'success',
                text: 'Berhasil Merestore Data',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });

            $rootScope.trashItems.splice($index, 1);
            $rootScope.items.push(trashItem);

        }, function(error) {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Mohon Periksa Internet Anda',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        });
    };

    // untuk menampilkan note
    $scope.showItemDescMethod = function(item) {
        $rootScope.showItemDesc = item;
    };
});

//order
app.controller('orderController', function($scope, $rootScope, $http) {
    $scope.editOrderMethod = function(order) {
        // parsing jumlah ke integer, karena kalo di view dia gak mau di parsing
        $rootScope.jumlah = parseInt(order.jumlah);
        localStorage.editOrderStok = order.jumlah;
        console.log(localStorage.editOrderStok);

        var index = $rootScope.items.findIndex(x => x.id == order.item_id);

        localStorage.itemStok = $rootScope.items[index].stok;
        $rootScope.editOrder = order;
    };

    $scope.removeOrderMethod = function(order) {
        $rootScope.removeOrder = order;
        $index = $rootScope.orders.findIndex(x => x.id == $rootScope.removeOrder.id);

        if (confirm('Hapus data ini?') === true) {
            var removeOrder = $rootScope.orders.splice($index, 1);

            $http({
                method: 'post',
                url: '/pesanan/server/removeOrder.php',
                data: {
                    "orders": $rootScope.orders
                },
            }).then(function(response) {

                $http({
                    method: 'post',
                    url: '/pesanan/server/trashOrder.php',
                    data: removeOrder[0],
                }).then(function(response) {
                    $rootScope.trashOrders.push(removeOrder[0]);

                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        text: 'Berhasil Menghapus Data!',
                        showConfirmButton: false,
                        timer: 1000,
                        position: 'top',
                    }, function(error) {
                        swal({
                            title: 'Error',
                            type: 'error',
                            text: 'Mohon Periksa Internet Anda',
                            showConfirmButton: false,
                            timer: 1000,
                            position: 'top',
                            toast: true
                        });
                    });
                });
            });
        }
    }

    // untuk menampilkan note
    $scope.showOrderDescMethod = function(order) {
        $rootScope.showOrderDesc = order;
    };
});

//addOrder
app.controller('addOrderController', function($scope, $http, $rootScope) {
    $scope.addOrderInsert = function() {
        var formAddOrder = document.getElementById('formAddOrder');
        var formAddOrderData = serialize(formAddOrder, {
            hash: true
        });

        formAddOrderData.id = Math.random();

        // ubah item idnya krena angular nambahin 'number:item_id'
        formAddOrderData.item_id = parseInt()

        // cek stok barang, jika > 0 lanjutkan, jika lebih kecil gagalkan
        var index = $rootScope.items.findIndex(x => x.id == formAddOrderData.item_id);
        console.log($rootScope.items[index], formAddOrderData.item_id);
        if ($rootScope.items[index].stok - formAddOrderData.jumlah >= 0) {
            $http({
                url: '/pesanan/server/addOrder.php',
                data: formAddOrderData,
                method: 'POST'
            }).then(function(response) {
                $rootScope.orders.push(formAddOrderData);

                swal({
                    title: 'Berhasil',
                    type: 'success',
                    text: 'Berhasil Menambah Data',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top',
                    toast: true
                });

                // kurangkan stok barang yang ada diview
                $rootScope.items[index].stok -= formAddOrderData.jumlah;

                $scope.nama = '';
                $scope.item_id = '';
                $scope.jumlah = '';
                $scope.harga = '';
                $scope.status = '';
                $scope.catatan = '';

            }, function(error) {
                swal({
                    title: 'Error',
                    type: 'error',
                    text: 'Mohon Periksa Internet Anda',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top',
                    toast: true
                });
            });
        } else {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Jumlah Item Tidak Cukup.',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        }
    }
});

app.controller('editOrderController', function($scope, $rootScope, $http) {

    $scope.editOrderInsert = function() {
        var formEditOrder = document.getElementById('formEditOrder');
        var formEditOrderData = serialize(formEditOrder, {
            hash: true
        });

        var index = $rootScope.items.findIndex(x => x.id == formEditOrderData.item_id);
        var indexOrder = $rootScope.orders.findIndex(x => x.id == formEditOrderData.id);

        // untuk mencegah jika user bolak balik ganti status orderannya
        if((formEditOrderData.status == "Pending" || formEditOrderData.status == "Selesai") && ($rootScope.editOrder.status == "Cancel" || $rootScope.editOrder.status == "Refund")){
            $rootScope.items[index].stok = parseInt($rootScope.items[index].stok) - parseInt(formEditOrderData.jumlah);
        } else if((formEditOrderData.status == "Cancel" || formEditOrderData.status == "Refund") && ($rootScope.editOrder.status == "Pending" || $rootScope.editOrder.status == "Selesai")){
            $rootScope.items[index].stok = parseInt($rootScope.items[index].stok) + parseInt(formEditOrderData.jumlah);
            console.log($rootScope.items, $rootScope.editOrder.status);
        }

        // ketika udah diedid stoknya maka ubah juga yang di $rootScope.editOrder.statusnya
        $rootScope.editOrder.status = formEditOrderData.status;

        $http({
            url: '/pesanan/server/editOrder.php',
            method: 'POST',
            data: formEditOrderData
        }).then(function(response) {

            // panggil fungsi ajax lagi untuk mengurangkan stoknya
            if (localStorage.editOrderStok != formEditOrderData.jumlah && localStorage.editOrderStok != $rootScope.editOrder.stok) {
                $rootScope.items[index].stok = localStorage.itemStok;
                $rootScope.items[index].stok = parseInt($rootScope.items[index].stok) + parseInt($rootScope.editOrder.jumlah);
                $rootScope.items[index].stok = parseInt($rootScope.items[index].stok) - parseInt(formEditOrderData.jumlah);
                localStorage.editOrderStok = formEditOrderData.jumlah;

                // perbarui data itemnya diserver
                $http({
                    url: '/pesanan/server/editItem.php',
                    method: 'POST',
                    data: $rootScope.items[index]
                }).then(function(response) {
                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        text: 'Berhasil Mengedit Data',
                        showConfirmButton: false,
                        timer: 1000,
                        position: 'top',
                        toast: true
                    });
                });
            } else {

                // perbarui data itemnya diserver
                $http({
                    url: '/pesanan/server/editItem.php',
                    method: 'POST',
                    data: $rootScope.items[index]
                }).then(function(response) {
                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        text: 'Berhasil Mengedit Data',
                        showConfirmButton: false,
                        timer: 1000,
                        position: 'top',
                        toast: true
                    });
                })

                // jika tidak ada data yang dirubah maka beritahu saja jika proses update data telah Berhasil
                swal({
                    title: 'Berhasil',
                    type: 'success',
                    text: 'Berhasil Mengedit Data',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top',
                    toast: true
                });
            }

            // perbarui data yang ada diview nya
            $rootScope.orders[indexOrder] = formEditOrderData;
        }, function(error) {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Mohon Periksa Internet Anda',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        });
    }
});

app.controller('trashOrderController', function($scope, $rootScope, $http) {
    $scope.restoreOrderMethod = function(trashOrder) {
        $index = $rootScope.trashOrders.findIndex(x => x.id == trashOrder.id);
        $http({
            method: 'POST',
            url: '/pesanan/server/restoreOrder.php',
            data: trashOrder
        }).then(function(response) {
            swal({
                title: 'Berhasil',
                type: 'success',
                text: 'Berhasil Merestore Data',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });

            $rootScope.trashOrders.splice($index, 1);
            $rootScope.orders.push(trashOrder);
        }, function(error) {
            swal({
                title: 'Error',
                type: 'error',
                text: 'Mohon Periksa Internet Anda',
                showConfirmButton: false,
                timer: 1000,
                position: 'top',
                toast: true
            });
        });
    };

    // untuk menampilkan note
    $scope.showOrderDescMethod = function(order) {
        $rootScope.showOrderDesc = order;
    };
});

// show order controller
app.controller('showOrderDescController', function($scope, $rootScope, $http) {

});
