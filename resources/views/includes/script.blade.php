<script src="{{ asset('assets/libraries/jquery.js') }}"></script>
<script src="{{ asset('assets/libraries/alpine.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/libraries/izitoast/js/iziToast.js') }}"></script>

<script>
jQuery(document).ready(function($){
    $(document).ready(function(){
        $("#myModal").on('show.bs.modal', function(e){
            var button = $(e.relatedTarget); //mengambil data yang sudah di lempar di file show
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote")); //data yang di ambil akan di tampilkan di class modal body
            modal.find('.modal-title').html(button.data("title")); //modal titel untuk menampilkan nama titel yang sudah di berikan di halaman index tadi
        });
    });
});
</script>
<div class="bs-example">
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //get api
    function httpGet(theUrl) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.send(null);
        var txt = xmlHttp.responseText;
        return JSON.parse(txt);
    }
</script>
