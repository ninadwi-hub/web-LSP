<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Kontak Kami</h2>
    </div>
  </div>

  <!-- Google Maps Embed -->
  <div>
    <iframe style="border:0; width: 100%; height: 350px;"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.920759929992!2d110.3360937!3d-7.8625761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5747828cf8e5%3A0x3f6419de12178de5!2sLSP%20Trainer%20Kompeten%20Indonesia!5e0!3m2!1sid!2sid!4v1720586300994!5m2!1sid!2sid"
      frameborder="0" allowfullscreen></iframe>
  </div>

  <div class="container">
    <div class="row mt-5">

      <!-- Informasi Kontak -->
      <div class="col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>
                Jalan Bangmalang No. 5, RT 56, Dusun Diro, Kelurahan Pendowoharjo<br>
                Kecamatan Sewon, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta
              </p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Kami</h3>
              <p>admin@lsptrainerkompetenindonesia.id</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-phone-call"></i>
              <h3>Hubungi Kami</h3>
              <a href="https://wa.me/6281364715451" target="_blank" style="color: inherit; text-decoration: none;">
                <p>0813-6471-5451</p>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Form Kontak -->
      <div class="col-lg-6">
        <form action="{{ route('kontak.submit') }}" method="POST" role="form" id="contactForm" class="php-email-form">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control rounded" placeholder="Nama Anda" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" name="email" class="form-control rounded" placeholder="Email Anda" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" name="subject" class="form-control rounded" placeholder="Subjek" required>
          </div>
          <div class="form-group mt-3">
            <textarea name="message" class="form-control rounded" rows="7" placeholder="Pesan Anda" required></textarea>
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-info text-white px-4 py-2 rounded">Kirim Pesan</button>
          </div>
          <div id="formAlert" class="mt-3"></div>
        </form>
      </div>

    </div>
  </div>
</section>
<!-- End Contact Section -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

@push('styles')
<style>
  .form-control {
    background-color: #fff;
    border: 1px solid #ced4da;
    padding: 12px 15px;
    font-size: 16px;
  }

  .btn-info {
    background-color: #34b7a7;
    border: none;
  }

  .btn-info:hover {
    background-color: #2aa193;
  }
</style>
@endpush

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const alertBox = document.getElementById('formAlert');

  fetch(form.action, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
      'Accept': 'application/json',
    },
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    alertBox.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
    form.reset();
  })
  .catch(error => {
    alertBox.innerHTML = `<div class="alert alert-danger">Gagal mengirim pesan.</div>`;
  });
});
</script>
@endpush