var Tabledatatables = function(){
//    window.alert('here');
    var handleCategoryTable = function(){
//        window.alert('here');
        var categoryTable = $("#details");
//        window.alert('here');
        var oTable = categoryTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:
                "http://localhost/ecertificate/classes/admin/view_issuer.php",
                type: "POST",
            },
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 25, "All"]
            ],
            "pageLength":15, //set the default length
            "order":[
                [0,"desc"]
            ],
            "columnDefs": [{
                'oderable': false,
                'targets':[-1]
            }]
        });
        categoryTable.on('click', '.edit', function (e) {
//            $id = $(this).attr('id');
//            $("#edit_category_id").val($id);
            //alert($id);
            
            //fetching all other values from database using ajax and loading them onto 
//            //respective edit field!!
//            
//            $.ajax({
//                url: "http://localhost/erp/pages/scripts/category/fetch.php",
//                method: "POST",
//                data: {category_id: $id},
//                dataType: "json",
//                success: function(data){
//                    $("#category_name").val(data.category_name);
//                    $("#hsn_code").val(data.hsn_code);
//                    $("#gst_rate").val(data.gst_rate);
//                    $("#editModal").modal('show');
//                },
//            });
//            
        });
        categoryTable.on('click', '.delete', function (e) {
            window.alert('here');
            $id = $(this).attr('id');
//            window.alert('here');
            $("#recordID").val($id);
        });
    }
    return{
        
        //main function in javascript to handle all the initialization part
        init: function(){
            handleCategoryTable();
        }
    };
}();
jQuery(document).ready(function(){
    Tabledatatables.init();
});