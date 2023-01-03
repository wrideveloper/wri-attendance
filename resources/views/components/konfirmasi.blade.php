<div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="konfirmasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <h6 class="text-secondary fw-light text-center">{{ $text }}</h6>
                <div class="d-flex justify-content-around mt-4">
                    <button id="batal" type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Tidak</button>
                    <button id="lanjut" type="submit" class="btn btn-teal text-light">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- sebenere kode di bawah ini ngga bakal kepake soalnya kalo berhasil langsung diredirect, cc mas ilham sama mas dani mungkin bisa dibantu debugging --}}
@if ($errors->isEmpty() && session('success'))
    <div id="terkonfirmasi" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-5">
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content between align-items-center">
                        <h1><i class="fa-solid fa-circle-check text-teal"></i></h1>
                        <h6 class="mt-3 text-secondary fw-normal"> {{ $text }} </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
