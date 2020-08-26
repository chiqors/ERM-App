@extends('auth.layouts.app')

@section('hstyles')
<link rel="stylesheet" href="{{ asset('assets/pages/multi-step-sign-up/css/reset.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/pages/multi-step-sign-up/css/style.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
<style>
    #map {
        width: 100%;
        height: 250px;
    }
</style>
@endsection

@section('content')
<form id="msform">

    <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Identification Profile</li>
        <li>Personal Details</li>
    </ul>

    <fieldset>
        <img class="logo" src="{{ asset('assets/images/logo-blue.png') }}" alt="logo.png">
        <h2 class="fs-title">Sign up</h2>
        <h3 class="fs-subtitle">Let’s have a new beginning. Sign up for new you</h3>
        <div class="input-group">
            <input type="text" class="form-control" name="username" placeholder="Username" />
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="email" placeholder="Email" />
        </div>
        <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="Password" />
        </div>
        <div class="input-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
        </div>
        <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
    </fieldset>
    <fieldset class="">
        <img class="logo" src="{{ asset('assets/images/logo-blue.png') }}" alt="logo.png">
        <h2 class="fs-title">Identification Profile</h2>
        <h3 class="fs-subtitle">Little bit about your presence on social media</h3>
        <div class="input-group row">
            <label class="col-sm-4 col-form-label">Jenis Perusahaan</label>
            <div class="col-sm-8">
                <select name="jenis_perusahaan" class="form-control">
                    <option value="">-- SILAHKAN DIPILIH --</option>
                    <option value="perorangan">Perorangan</option>
                    <option value="kelompom">Kelompok</option>
                    <option value="perusahaan">Perusahaan</option>
                </select>
            </div>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="nama_peternakan" placeholder="Nama Peternakan" />
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" />
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon (08)" />
        </div>
        <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous"
            value="Previous">Previous</button>
        <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
    </fieldset>
    <fieldset>
        <img class="logo" src="{{ asset('assets/images/logo-blue.png') }}" alt="logo.png">
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">And something about yourself!</h3>
        <div class="input-group">
            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap Pemilik" />
        </div>
        <div class="row">
            <div class="col-12">
                <div id="map"></div>
            </div>
        </div>
        <div class="input-group">
            <input id="latput" type="text" class="form-control" name="latitude" placeholder="Latitude" readonly hidden />
        </div>
        <div class="input-group">
            <input id="lonput" type="text" class="form-control" name="longitude" placeholder="Longitude" readonly hidden />
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="area" placeholder="Area (1 = 1 meter)" />
        </div>
        <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous"
            value="Previous">Previous</button>
        <button type="button" name="next" class="btn btn-primary" value="submit">Submit</button>
    </fieldset>
</form>
@endsection

@section('fscripts')
<script src="{{ asset('assets/pages/multi-step-sign-up/js/main.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>

  <script>
    setTimeout(function () {
        // Leaflet
        var mymap = L.map('map').setView([-6.938487, 107.622548], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={access_token}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            maxZoom: 18,
            access_token: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(mymap);

        var popup = L.popup();

        function onMapClick(e) {
            var eventLoc = e.latlng.toString();
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + eventLoc)
                .openOn(mymap);
            var raw = eventLoc.length;
            var result = eventLoc.substr(7,raw).split(",");
            $('#latput').val(result[0]);
            $('#lonput').val(result[1].slice(1,-2));
        }

        mymap.on('click', onMapClick);

    }, 350);
</script>
@endsection
