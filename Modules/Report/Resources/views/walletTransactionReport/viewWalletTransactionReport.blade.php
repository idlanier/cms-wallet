<div class="page-header">
    <h1 class="page-title">Transaction Report</h1>
    <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToAddTransactionWalletOut()">
            Add Transaction Wallet Out
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
                    <label class="form-control-label"><b>Tanggal Awal</b></label>
                    <input type="date" class="form-control" name="">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Tanggal Akhir</b></label>
                    <input type="date" class="form-control" name="">
                </div>
                <div class="form-group col-md-1">
                    
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>&nbsp;</b></label>
                    <div class="checkbox-custom checkbox-primary">
                        <input type="checkbox" id="inputUnchecked">
                        <label for="inputUnchecked">Uang Masuk</label>
                    </div>
                    <div class="checkbox-custom checkbox-primary">
                        <input type="checkbox" id="inputUnchecked">
                        <label for="inputUnchecked">Uang Keluar</label>
                    </div>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Kategori</b></label>
                    <select class="form-control">
                        <option>Semua</option>
                        <option>2</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-control-label"><b>Dompet</b></label>
                    <select class="form-control">
                        <option>Semua</option>
                        <option>2</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToAddTransactionWalletOut()">
                        Buat Laporan
                    </button>
                </div>
                <div class="form-group col-md-1">
                    
                </div>
                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToAddTransactionWalletOut()">
                        Buat Excel
                    </button>
                </div>
                
            </div>

        </div>
    </div>
</div>
