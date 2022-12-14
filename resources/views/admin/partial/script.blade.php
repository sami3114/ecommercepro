<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin').'/lib/chart/chart.min.js'}}"></script>
<script src="{{asset('admin').'/lib/easing/easing.min.js'}}"></script>
<script src="{{asset('admin').'/lib/waypoints/waypoints.min.js'}}"></script>
<script src="{{asset('admin').'/lib/owlcarousel/owl.carousel.min.js'}}"></script>
<script src="{{asset('admin').'lib/tempusdominus/js/moment.min.js'}}"></script>
<script src="{{asset('admin').'/lib/tempusdominus/js/moment-timezone.min.js'}}"></script>
<script src="{{asset('admin').'/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'}}"></script>

<!-- Template Javascript -->
<script src="{{asset('admin').'/js/main.js'}}"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
    });
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);

    // function confirmation(ev){
    //     ev.preventDefault();
    //     var urlToRedirect=ev.currentTarget.getAttribute('action');
    //     console.log(urlToRedirect);
    //     swal({
    //         title:"Are you sure to delete this",
    //         text:"You will not be able to revert this",
    //         icon:"warning",
    //         button:true,
    //         dangerMode:true,
    //     })
    //     .then((willDel)=> {
    //         if (willDel) {
    //             window.location.href = urlToRedirect;
    //         }
    //     }) ;
    //
    // }
</script>
