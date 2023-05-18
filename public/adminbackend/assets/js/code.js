$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'هل انت متأكد؟?',
            text: "تريد ازالة هذا العنصر",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'الغاء',
            confirmButtonText: 'نعم, قم بالازالة'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'تمت الازالة بنجاح.',
                    'success'
                )
            }
        })


    });

});