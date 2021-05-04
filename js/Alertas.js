<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
function Alertas()
{
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
      header ('Location: index.php');
}