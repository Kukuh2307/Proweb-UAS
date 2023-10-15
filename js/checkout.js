// Mendapatkan data provinsi dari API RajaOngkir
function getProvinsi() {
    $.ajax({
        url: 'https://api.rajaongkir.com/starter/province',
        type: 'GET',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('key', 'd20bee84e0494e1b5b4c0d764dd31d07');
        },
        success: function (response) {
            var options = '<option value="">Pilih Provinsi</option>';
            $.each(response.rajaongkir.results, function (index, item) {
                options += '<option value="' + item.province_id + '">' + item.province + '</option>';
            });
            $('#provinsi').html(options);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

// Mendapatkan data distrik berdasarkan provinsi yang dipilih
function getDistrik(provinsiId) {
    $.ajax({
        url: 'https://api.rajaongkir.com/starter/city',
        type: 'GET',
        data: { province: provinsiId },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('key', 'd20bee84e0494e1b5b4c0d764dd31d07');
        },
        success: function (response) {
            var options = '<option value="">Pilih Distrik</option>';
            $.each(response.rajaongkir.results, function (index, item) {
                options += '<option value="' + item.city_id + '">' + item.city_name + '</option>';
            });
            $('#distrik').html(options);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

// Mendapatkan data ekspedisi dari API RajaOngkir
function getEkspedisi() {
    $.ajax({
        url: 'https://api.rajaongkir.com/starter/courier',
        type: 'GET',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('key', 'd20bee84e0494e1b5b4c0d764dd31d07');
        },
        success: function (response) {
            var options = '<option value="">Pilih Ekspedisi</option>';
            $.each(response.rajaongkir.results, function (index, item) {
                options += '<option value="' + item.code + '">' + item.name + '</option>';
            });
            $('#ekspedisi').html(options);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

// Panggil fungsi untuk mengisi data provinsi, distrik, dan ekspedisi saat halaman dimuat
$(document).ready(function () {
    getProvinsi();
    getEkspedisi();
});

// Panggil fungsi untuk mengisi data distrik saat provinsi dipilih
$('#provinsi').on('change', function () {
    var provinsiId = $(this).val();
    getDistrik(provinsiId);
});
