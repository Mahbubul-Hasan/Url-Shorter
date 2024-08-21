$(document).ready(function () {});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function changeStatus(url) {
    $.ajax({
        url: url,
        method: "DELETE",
        dataType: "JSON",
        success: function (res) {
            if (res?.status == 200) {
                toastr.success(res?.message);
            }
        },
    });
}
