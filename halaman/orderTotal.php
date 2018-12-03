<div class='card'>
	<div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Total {{ orderTotal.nama }}</h4>
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
		<i>{{ orderTotal.total | currency: "Rp": 2}}</i>
	</div>
</div>
