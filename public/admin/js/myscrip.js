$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $('.delete-row').click(function(e){
            e.preventDefault();
            $('.md-delete').attr('href',$(this).attr('url'));
        })
    });
$("div.alert").delay(2500).slideUp();
