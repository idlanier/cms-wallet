<div class="page-header">
    <h1 class="page-title">Master Category</h1>
    <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-classic" ng-click="goToAddCategory()">
            Add Category
        </button>
    </div>
</div>
<div class="page-content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">&nbsp;</h3>
        </div>
        <div class="panel-body">
            <div class="row row-lg">
                <div class="col-lg-4">
                    <div class="example-wrap">
                        <h4 class="example-title">Search</h4>
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text" class="form-control" name="" placeholder="Search...">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary waves-effect waves-classic"><i class="icon md-search" aria-hidden="true"></i></button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="example-wrap">
                    <h4 class="example-title">Status</h4>
                    <div class="form-group">
                        <select class="form-control">
                        <option>Aktif (2)</option>
                        <option>Tidak Aktif (1)</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="example-wrap">
                    <h4 class="example-title">Total Data</h4>
                    <div class="form-group">
                        <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="row row-lg">
                <div class="col-lg-12">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Pengeluaran</td>
                          <td>Kategori Pengeluaran</td>
                          <td>Aktif</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-icon btn-primary dropdown-toggle waves-effect waves-classic" data-toggle="dropdown" aria-expanded="false" aria-hidden="true">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToDetailCategory()">Detail</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToEditCategory()">Ubah</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem">Tidak Aktif</span>
                                </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Pemasukan</td>
                          <td>Kategori Pemasukan</td>
                          <td>Aktif</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-icon btn-primary dropdown-toggle waves-effect waves-classic" data-toggle="dropdown" aria-expanded="false" aria-hidden="true">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToDetailCategory()">Detail</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToEditCategory()">Ubah</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem">Tidak Aktif</span>
                                </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Lain - lain</td>
                          <td>Kategori Lain - lain</td>
                          <td>Aktif</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-icon btn-primary dropdown-toggle waves-effect waves-classic" data-toggle="dropdown" aria-expanded="false" aria-hidden="true">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToDetailCategory()">Detail</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem" ng-click="goToEditCategory()">Ubah</span>
                                    <span class="dropdown-item" href="javascript:void(0)" role="menuitem">Tidak Aktif</span>
                                </div>
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
