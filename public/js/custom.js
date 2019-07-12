$(document).ready(function() {
    $("#loader").hide();
    $("#recordsTable #checkAll").click(function() {
        $(".checkbox").prop("checked", false);
        if ($("#checkAll").is(":checked")) {
            $(".checkbox").prop("checked", true);
        }
    });

    $(".checkbox").click(function() {
        var total = $(".checkbox").length;
        var count = 0;
        $(".checkbox").each(function() {
            if ($(this).is(":checked")) {
                count++;
            }
        });
        $("#checkAll").prop("checked", false);
        if (count == total) {
            $("#checkAll").prop("checked", true);
        }
    });

    setTimeout(function() {
        $(".alert").hide();
    }, 3000);

    $(function() {
        $("#recordsTable").DataTable({
            // 'paging'      : true,
            // 'lengthChange': false,
            // 'searching'   : true,
            // 'ordering'    : true,
            // 'info'        : true,
            // 'autoWidth'   : true,
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'colvis',
            //         columns: ':not(:first-child)'
            //     }
            // ]
            'columnDefs': [ {
                className: 'control',
                orderable: false,
                targets:   -1
             }]
        
        });
    });

    //Change record status confirm box
    $("#action .changeStatus").click(function(e) {
        e.preventDefault();
        var alertMessage = $(this).attr("alert");
        if (confirm(alertMessage)) {
            location.href = this;
        }
    });

    //Delete record status confirm box
    $("#action .deleteRecord").click(function(e) {
        debugger;
        e.preventDefault();
        var alertMessage = $(this).attr("alert");
        if (confirm(alertMessage)) {
            // $("#action #deleteForm").submit();
            $(this)
                .parent()
                .children()[1]
                .submit();
        }
    });

    // preview image before it is uploaded
    function readURL(input) {
        debugger;

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#appendImage").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });

    //   <img class="img-responsive" style="max-height:100px;max-width:100px;display:inline" src={{!empty($product->image)? asset('images/product/'.$product->image): asset('images/noimage.png') }}>

    function previewImages() {
       
        var targetDisplayImage = $("#targetDisplayImage").empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {
            var reader = new FileReader();

            reader.onload = function() {
                targetDisplayImage.append(
                    "<img src='" +
                        this.result +
                        "' class='img-responsive' style='max-height:100px;max-width:100px;display:inline;padding:5px;'><img/>"
                );
            };

            reader.readAsDataURL(file);
        }
    }

    $("#images").on("change", previewImages);
});
