function showPresent() {
    $('#permit').empty();
    $('#sick').empty();
    $("#present").html(`
                    <div class="card card-rounded">
                        <h1 class="h5 mb-4">Bagaimana komentarmu tentang miniclass hari ini?</h1>
                        <textarea class="form-control" rows="10" name="feedback" id="feedback"
                            placeholder="Input Your Text in here"></textarea>
                    </div>
                    <div class="card card-rounded">
                        <h1 class="h5 mb-4">Masukkan Token</h1>
                        <input type="text" class="form-control" id="token" name="token"
                            placeholder="Input Your Text in here" />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal text-white px-5">Simpan</button>
                    </div>
    `);
}

function showPermit() {
    $('#present').empty();
    $('#sick').empty();
    $("#permit").html(`
                    <div class="card card-rounded">
                        <h1 class="h5 mb-4">Keterangan Izin</h1>
                        <textarea class="form-control" rows="10" name="ket" id="ket"
                            placeholder="Input Your Text in here"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal text-white px-5">Simpan</button>
                    </div>
    `);
}

function showSick() {
    $('#permit').empty();
    $('#present').empty();
    $("#sick").html(`
                    <div class="card card-rounded">
                        <h1 class="h5 mb-4">Keterangan Sakit</h1>
                        <textarea class="form-control" name="ket" rows="10" id="ket"
                            placeholder="Input Your Text in here"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal text-white px-5">Simpan</button>
                    </div>
    `);
}