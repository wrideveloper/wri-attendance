<div class="modal fade" id="logoutConfirm" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="modal-body p-5" action="{{ route('logout') }}" method="POST">
                @csrf
                <h6 class="text-secondary fw-light text-center">anda yakin ingin logout ?</h6>
                <div class="d-flex justify-content-around mt-4">
                    <button id="cancelLogout" type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Tidak</button>
                    <button id="confirm-logout" type="submit" class="btn btn-teal text-light">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
