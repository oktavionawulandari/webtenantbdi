@extends('main-layouts.template')
@section('title', 'Background Card Change')
@section('container')
    @if (Auth::guard('user')->user()->role == 'Super Admin')
        @include('navigasi.nav-superadmin')
    @elseif(Auth::guard('user')->user()->role == 'Admin')
        @include('navigasi.nav-admin')
    @endif
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Ubah Background Id Card</h3>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample" action="{{ route('background.card.change.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label>Upload Background Id Card</label>
                            <img class="card-preview img-fluid mb-3 col-sm-2">
                            <input class="form-control form-control-sm @error('card') is-invalid @enderror" id="card"
                                type="file" name="card" onchange="previewCard()">
                            @error('card')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span>
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 10px">
                                    Format: jpg, jpeg, png. Maks. 6MB!
                                </i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function previewCard() {
            const image = document.querySelector('#card');
            const imgPreview = document.querySelector('.card-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
