@extends('layouts.app')

@push('after-style')
    <style>
        .row1{
            background-color: red !important;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
                <a href="#"
                    type="button"
                    class="btn btn-primary my-2"
                    data-bs-toggle="modal"
                    data-title="Tambah Metode"
                    data-bs-target="#myModal"
                    data-remote="{{route('agenda.create')}}">
                    tambah data metode
                </a>
                <a href="#"
                    type="button"
                    class="btn btn-primary my-2"
                    data-bs-toggle="modal"
                    data-title="Tambah Metode"
                    data-bs-target="#myModal"
                    data-remote="{{route('detailagenda.create')}}">
                    tambah data detail agenda
                </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Metode</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@push('after-script')

    <script>
         $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        const head = document.querySelector('thead tr');
        const body = document.querySelector('tbody');

        var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];

        monthNames.forEach((data) => {
                const htmlTemplate = `
                <th>${data}</th>
                `;
            head.innerHTML += htmlTemplate;
        });

        //loop data from databases
        function dataTable(){
            $('tbody tr').remove();
            $.ajax({
                type:'GET',
                url: '{{ route('api.agenda') }}',
                success(response){
                    response.forEach ((data) => {

                        const htmlTemplate = `
                        <tr>
                        <td>
                            <div class="dropdown">
                                <a class="text-dark text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    ${data.judul}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a href="#"
                                            type="button"
                                            class="dropdown-item"
                                            data-bs-toggle="modal"
                                            data-title="Tambah Metode"
                                            data-bs-target="#myModal"
                                            data-remote="{{url('agenda')}}/${data.id}/edit">
                                            edit data
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item delete" id="${data.id}">Hapus</button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="row${data.id}col0"></td>
                        <td class="row${data.id}col1"></td>
                        <td class="row${data.id}col2"></td>
                        <td class="row${data.id}col3"></td>
                        <td class="row${data.id}col4"></td>
                        <td class="row${data.id}col5"></td>
                        <td class="row${data.id}col6"></td>
                        <td class="row${data.id}col7"></td>
                        <td class="row${data.id}col8"></td>
                        <td class="row${data.id}col9"></td>
                        <td class="row${data.id}col10"></td>
                        <td class="row${data.id}col11"></td>
                        </tr>
                        `;
                    body.innerHTML += htmlTemplate;

                    if(data.detail.length){
                        data.detail.forEach((element) => {
                            var month = new Date(element.start);
                            const subdata = document.querySelector('.row' + data.id + 'col' + month.getMonth());
                            const list = `
                                <ul>
                                    <li>
                                        ${element.judul} <br />
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                ${formatDate(element.start)} - ${formatDate(element.end)}
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a href="#"
                                                        type="button"
                                                        class="dropdown-item"
                                                        data-bs-toggle="modal"
                                                        data-title="Tambah Metode"
                                                        data-bs-target="#myModal"
                                                        data-remote="{{url('detailagenda')}}/${element.id}/edit">
                                                        edit data
                                                    </a>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item deleteSub" id="${element.id}">Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            `;
                            subdata.innerHTML += list;
                        });
                    }

                    })
                    const last = `
                        <tr>
                        <td>Job Assignment</td>
                        <td class="text-center" colspan="12">Sesuai Penugasan</td>
                        </tr>
                        `;
                    body.innerHTML += last;

                }
            });
        }
        function formatDate(data){
            var today = new Date(data);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = dd + '/' + mm + '/' + yyyy;
            return today;
        }
        //delete data
        $(document).on('click', '.delete', function () {
            var dataId = $(this).attr('id');
            $.ajax({
                url: "{{ url('agenda') }}/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                success: function (data) { //jika sukses
                    dataTable();
                    iziToast.success({
                        title: 'Data Berhasil Dihapus',
                        position: 'topRight'
                    });
                }
            })
        });
        //delete data
        $(document).on('click', '.deleteSub', function () {
            var dataId = $(this).attr('id');
            $.ajax({
                url: "{{ url('detailagenda') }}/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                success: function (data) { //jika sukses
                    dataTable();
                    iziToast.success({
                        title: 'Data Berhasil Dihapus',
                        position: 'topRight'
                    });
                }
            })
        });
        dataTable();
    </script>
@endpush
