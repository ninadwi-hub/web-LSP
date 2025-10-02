<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">NO. SK <span class="text-danger">*</span></label>
            <input type="text" name="no_sk" class="form-control @error('no_sk') is-invalid @enderror" 
                   value="{{ old('no_sk', $jadwal->no_sk ?? '') }}" placeholder="Kode" required>
            @error('no_sk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">TANGGAL TERBIT SK <span class="text-danger">*</span></label>
            <input type="date" name="tgl_terbit_sk" class="form-control @error('tgl_terbit_sk') is-invalid @enderror" 
                   value="{{ old('tgl_terbit_sk', $jadwal->tgl_terbit_sk ?? '') }}" required>
            @error('tgl_terbit_sk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">TANGGAL ASESMEN <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_asesmen" class="form-control @error('tanggal_asesmen') is-invalid @enderror" 
                   value="{{ old('tanggal_asesmen', $jadwal->tanggal_asesmen ?? date('Y-m-d')) }}" required>
            @error('tanggal_asesmen') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">SKEMA KOMPETENSI <span class="text-danger">*</span></label>
            <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror" required>
                <option value="">:: Pilih Skema ::</option>
                @foreach($skemas as $skema)
                    <option value="{{ $skema->id }}" {{ old('skema_id', $jadwal->skema_id ?? '') == $skema->id ? 'selected' : '' }}>
                        {{ $skema->nama }}
                    </option>
                @endforeach
            </select>
            @error('skema_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">TYPE <span class="text-danger">*</span></label>
            <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                <option value="">:: Pilih Kategori/Tipe ::</option>
                <option value="Nirkertas" {{ old('tipe', $jadwal->tipe ?? '') == 'Nirkertas' ? 'selected' : '' }}>Nirkertas</option>
                <option value="SJJ" {{ old('tipe', $jadwal->tipe ?? '') == 'SJJ' ? 'selected' : '' }}>SJJ</option>
            </select>
            @error('tipe') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">HARGA</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" 
                   value="{{ old('harga', $jadwal->harga ?? 0) }}" min="0" step="1">
            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">KUOTA</label>
            <input type="number" name="kuota" class="form-control @error('kuota') is-invalid @enderror" 
                   value="{{ old('kuota', $jadwal->kuota ?? 0) }}" min="0">
            @error('kuota') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <!-- Asesor Uji -->
        <div class="mb-4">
            <h6 class="border-bottom pb-2 mb-3">Asesor Uji</h6>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Nama</th>
                            <th width="100">Status</th>
                            <th width="80">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="asesor-uji-list">
                        @php
                            $oldAsesorUji = old('asesor_uji', isset($jadwal) ? $jadwal->asesorUji->pluck('id')->toArray() : []);
                            $oldLeadUji = old('lead_uji', isset($jadwal) ? optional($jadwal->leadAsesorUji())->id : null);
                        @endphp
                        @foreach($oldAsesorUji as $index => $asesor_id)
                            @php $asesor = $asesors->find($asesor_id); @endphp
                            @if($asesor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <input type="hidden" name="asesor_uji[]" value="{{ $asesor->id }}">
                                    {{ $asesor->name }}
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="lead_uji" value="{{ $asesor->id }}" 
                                               {{ $oldLeadUji == $asesor->id ? 'checked' : '' }}>
                                        <label class="form-check-label">Lead</label>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-asesor">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#selectAsesorUjiModal">
                Tambah Asesor Uji
            </button>
        </div>

        <!-- Asesor Validator -->
        <div class="mb-3">
            <h6 class="border-bottom pb-2 mb-3">Asesor Validator</h6>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Nama</th>
                            <th width="100">Status</th>
                            <th width="80">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="asesor-validator-list">
                        @php
                            $oldAsesorValidator = old('asesor_validator', isset($jadwal) ? $jadwal->asesorValidator->pluck('id')->toArray() : []);
                            $oldLeadValidator = old('lead_validator', isset($jadwal) ? optional($jadwal->leadAsesorValidator())->id : null);
                        @endphp
                        @foreach($oldAsesorValidator as $index => $asesor_id)
                            @php $asesor = $asesors->find($asesor_id); @endphp
                            @if($asesor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <input type="hidden" name="asesor_validator[]" value="{{ $asesor->id }}">
                                    {{ $asesor->name }}
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="lead_validator" value="{{ $asesor->id }}" 
                                               {{ $oldLeadValidator == $asesor->id ? 'checked' : '' }}>
                                        <label class="form-check-label">Lead</label>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-asesor">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#selectAsesorValidatorModal">
                Tambah Asesor Validator
            </button>
        </div>
    </div>
</div>

<!-- Modal Select Asesor Uji -->
<div class="modal fade" id="selectAsesorUjiModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Pilih Asesor Uji</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    @foreach($asesors as $asesor)
                    <a href="#" class="list-group-item list-group-item-action add-asesor-uji" data-id="{{ $asesor->id }}" data-name="{{ $asesor->name }}">
                        <div class="d-flex align-items-center">
                            <img src="{{ $asesor->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($asesor->name) }}" 
                                 class="rounded-circle me-3" width="40" height="40" alt="{{ $asesor->name }}">
                            <div>
                                <strong>{{ $asesor->name }}</strong><br>
                                <small class="text-muted">{{ $asesor->email }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Select Asesor Validator -->
<div class="modal fade" id="selectAsesorValidatorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Pilih Asesor Validator</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    @foreach($asesors as $asesor)
                    <a href="#" class="list-group-item list-group-item-action add-asesor-validator" data-id="{{ $asesor->id }}" data-name="{{ $asesor->name }}">
                        <div class="d-flex align-items-center">
                            <img src="{{ $asesor->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($asesor->name) }}" 
                                 class="rounded-circle me-3" width="40" height="40" alt="{{ $asesor->name }}">
                            <div>
                                <strong>{{ $asesor->name }}</strong><br>
                                <small class="text-muted">{{ $asesor->email }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add Asesor Uji
    document.querySelectorAll('.add-asesor-uji').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const name = this.dataset.name;
            
            // Check if already exists
            if (document.querySelector(`#asesor-uji-list input[value="${id}"]`)) {
                alert('Asesor sudah ditambahkan');
                return;
            }
            
            const tbody = document.getElementById('asesor-uji-list');
            const index = tbody.children.length + 1;
            const isFirst = index === 1;
            
            const row = `
                <tr>
                    <td>${index}</td>
                    <td>
                        <input type="hidden" name="asesor_uji[]" value="${id}">
                        ${name}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lead_uji" value="${id}" ${isFirst ? 'checked' : ''}>
                            <label class="form-check-label">Lead</label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm btn-remove-asesor">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
            
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('selectAsesorUjiModal')).hide();
        });
    });

    // Add Asesor Validator
    document.querySelectorAll('.add-asesor-validator').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const name = this.dataset.name;
            
            // Check if already exists
            if (document.querySelector(`#asesor-validator-list input[value="${id}"]`)) {
                alert('Asesor sudah ditambahkan');
                return;
            }
            
            const tbody = document.getElementById('asesor-validator-list');
            const index = tbody.children.length + 1;
            const isFirst = index === 1;
            
            const row = `
                <tr>
                    <td>${index}</td>
                    <td>
                        <input type="hidden" name="asesor_validator[]" value="${id}">
                        ${name}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lead_validator" value="${id}" ${isFirst ? 'checked' : ''}>
                            <label class="form-check-label">Lead</label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm btn-remove-asesor">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
            
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('selectAsesorValidatorModal')).hide();
        });
    });

    // Remove Asesor (Event Delegation)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-remove-asesor')) {
            e.preventDefault();
            const row = e.target.closest('tr');
            const tbody = row.parentElement;
            
            row.remove();
            
            // Reindex rows
            Array.from(tbody.children).forEach((tr, index) => {
                tr.children[0].textContent = index + 1;
            });
            
            // Auto-select first as lead if current lead was removed
            const radioName = tbody.id === 'asesor-uji-list' ? 'lead_uji' : 'lead_validator';
            if (!document.querySelector(`input[name="${radioName}"]:checked`) && tbody.children.length > 0) {
                tbody.children[0].querySelector(`input[name="${radioName}"]`).checked = true;
            }
        }
    });
});
</script>
@endpush
