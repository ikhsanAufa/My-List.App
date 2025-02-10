<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content bg-dark text-light">
            @method('POST')
            @csrf
            <div class="modal-header border-0">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama List</label>
                    <input type="text" class="form-control bg-secondary text-light" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
