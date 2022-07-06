<div id="konfirmasi" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="col-8 mx-auto mb-4">
                    <h6 class="text-secondary fw-normal">{{$text}}</h6>
                </div>
                <div class="d-flex justify-content-start justify-content-sm-around pt-2">
                    <div class="col col-xs-3 col-md-3">
                        <button type="button" class="btn btn-default border border-secondary w-100 py-2"
                            data-bs-dismiss="modal">Tidak</button>
                    </div>
                    <div class="col col-xs-3 col-md-3 col-lg-3">
                        <button type="button" class="btn btn-teal text-light w-100 py-2" data-bs-toggle="modal"
                            data-bs-target="#terkonfirmasi">Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="terkonfirmasi" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-5">
            <div class="modal-body">
                <div class="d-flex flex-column justify-content between align-items-center">
                    <h1><i class="fa-solid fa-circle-check text-teal"></i></h1>
                    <h6 class="mt-3 text-secondary fw-normal">Data berhasil disimpan!</h6>
                </div>
            </div>
        </div>
    </div>
</div>