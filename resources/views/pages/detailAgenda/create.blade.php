<form
    id="createAgenda"
    method="post">
    @csrf
    <div class="form-group">
        <label for="">Agenda</label>
        <select name="agenda_id" class="form-control" id="">
            @foreach ($agenda as $d)
                <option value="{{ $d->id }}">{{ $d->judul }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input name="judul" type="text" class="form-control" placeholder="example..">
    </div>
    <div class="form-group">
        <label for="">start</label>
        <input name="start" type="date" class="form-control" placeholder="example..">
    </div>
    <div class="form-group">
        <label for="">end</label>
        <input name="end" type="date" class="form-control" placeholder="example..">
    </div>
    <div class="form-group">
        <label for="">detail</label>
        <textarea name="detail" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group mt-3">
        <button type="submit" id="tombolCreate" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
        $('#createAgenda').submit(function(e) {
            e.preventDefault();

            var actionType = $('#tombolCreate').val();
            document.getElementById("tombolCreate").disabled = true;
            $('#tombolCreate').html('Creating..');

            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: '{{ route('detailagenda.store') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    if (response) {
                        this.reset();
                        dataTable();

                        document.getElementById("tombolCreate").disabled = false;

                        $('#tombolCreate').html('Create');
                        iziToast.success({
                            title: 'Data Berhasil Ditambah',
                            position: 'topRight'
                        });
                    }
                },
                error: function(response){
                    document.getElementById("tombolCreate").disabled = false;
                    $('#tombolCreate').html('Create');
                    iziToast.error({
                            title: "Data Gagal Ditambag",
                            position: 'topRight'
                        });
                }
            });
        });
</script>
