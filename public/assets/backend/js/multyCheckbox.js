$("#checkAll").click(function () {
    $("input:checkbox").not(this).prop("checked", this.checked);
});

$(".permission-checkbox").change(function () {
    if (
        $(".permission-checkbox:checked").length ==
        $(".permission-checkbox").length
    ) {
        $("#checkAll").prop("checked", true);
    } else {
        $("#checkAll").prop("checked", false);
    }
});

function checkPermissionByGroupName(groupNameclass, groupId) {
    groupNameclass = $("." + groupNameclass + " input");
    groupNameclass.not(groupId).prop("checked", groupId.checked);
}

function checkPermission(permissionsid) {
    const groupNameCheckboxId = "#" + $("#" + permissionsid.id).parent().parent().parent().find(".permission-group-name").get(0).id;
    const permissionsCheckbox = $("#" + permissionsid.id).parent().parent().find(".permission-name").length;
    const permissionsCheckboxChecked = $("#" + permissionsid.id).parent().parent().find(".permission-name:checked").length;

    if (permissionsCheckbox == permissionsCheckboxChecked) {
        $(groupNameCheckboxId).prop("checked", true);
    } else {
        $(groupNameCheckboxId).prop("checked", false);
    }
}
