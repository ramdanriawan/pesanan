<div class='card'>
	<div class="card-header">
		<div class="row">
            <div class="col-6">
				<h4 class="card-title">Desc {{ showItemDesc.item }}</h4>
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
		{{ showItemDesc.deskripsi }}
	</div>
</div>
