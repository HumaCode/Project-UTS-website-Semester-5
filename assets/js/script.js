$(document).ready(function() {
    $('#myTable').DataTable();

    // toooltop
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
                
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // preview upload
    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });

    

} );

