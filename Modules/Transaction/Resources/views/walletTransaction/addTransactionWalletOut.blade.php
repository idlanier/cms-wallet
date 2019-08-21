<div class="page-header">
    <h1 class="page-title">Add Wallet Transaction Out</h1>
    <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToViewWalletTransactionOut()">
            Kelola Dompet Keluar
        </button>
    </div>
</div>
<div class="page-content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">&nbsp;</h3>
        </div>
        <div class="panel-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Kode</b></label>
                    <input type="text" class="form-control" autocomplete="off" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Tanggal</b></label>
                    <input type="text" class="form-control" autocomplete="off" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Kategori</b></label>
                    <select class="form-control">
                      <option>Option 1</option>
                      <option>Option 2</option>
                      <option>Option 3</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Dompet</b></label>
                    <select class="form-control">
                      <option>Option 1</option>
                      <option>Option 2</option>
                      <option>Option 3</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-control-label"><b>Nilai</b></label>
                    <input type="text" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label class="form-control-label"><b>Deskripsi</b></label>
                    <textarea class="form-control" placeholder="Deskripsi" autocomplete="off" rows="5" style="resize: none;"></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToViewWalletTransactionIn()">
                Simpan
            </button>
        </div>
    </div>
</div>
