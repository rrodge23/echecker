$(document).ready(function(){

    //*********** LOGIN
    $('#loginform').on('submit',function(){
        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        $.ajax({
            url:url,
            type:type,
            dataType:"json",
            data:form.serialize(),
            success:function(data){
                if(data != false){
                    document.location.href = '/echecker/dashboard';
                }else{
                    $('.validation-summary-errors').removeClass('hidden');
                    form.effect('bounce','slow');
                }
            }
        });
    });
    //********* LOGIN END

    //********* SIGN OUT
    $('#btn-signout').on('click',function(){
        document.location.href = 'logout';
    });

    //********* SIGN OUT END
    
    //********* DATA TABLES
    $('#usersTableList').DataTable();

    //********* DATA TABLES END

    //********* USERLIST

    $('#btn-import-user').on('submit',function(){
        
    });
    
    //********* USERLIST END

    //********* FILEINPUT
    $("#input-import-users").fileinput({
       
        uploadUrl: "users/importusers",
        allowedFileExtensions: ["xlsx", "xlsm", "xlsb", "xltx", "xltm", "xls"
        , "xlt", "xml" , "xlam" , "xla", "xlw", "xlr", "csv"],
        previewClass: "bg-warning",
        showDetails:false,
        layoutTemplates: {
            main1: "{preview}\n" +
            "<div class=\'input-group {class}\'>\n" +
            "   <div class=\'input-group-btn\'>\n" +
            "       {browse}\n" +
            "       {upload}\n" +
            "       {remove}\n" +
            "   </div>\n" +
            "   {caption}\n" +
            "</div>"
        },
        uploadIcon:'<i class="material-icons">file_download</i>',
        
    });

    //********* FILEINPUT END
    //********* DELETE USER

    $('.btn-delete-user').on('click',function(e){
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        var url = btn.attr('href');

        swal({
            title: "Are you sure?",
            text: "Do you want to delete this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            
            if (isConfirm) {
                swal("Deleted!", "Record has been deleted.", "success");
                $.ajax({
                url:url,
                data:{id:id},
                dataType:"json",
                method:"POST",
                success:function(data){
                    if(data == true){
                        location.reload();
                    }else{
                        swal("Cancelled", "Error Delete Record.", "error");
                    }
                }
            });
            } else {
                swal("Cancelled", "Delete Canceled.", "error");
            }
        });
        
        
    })
    //********* DELETE USER END
    //********* UPDATE USER
    $('.btn-update-user').on('click',function(){
        var btn = $(this);
        var id = btn.data('id');
        $.ajax({
            url:'users/getuserinfobyid',
            dataType:"json",
            method:"POST",
            data:{id:id},
            success:function(data){
                $('#input-user-update-UID').val(data.UID)
                $('#input-user-update-user').val(data.user)
                $('#input-user-update-user_level').val(data.user_level);
            }
        });
        
        $('#mdl-user-update').modal('show');
    });



    $('#mdl-frm-update-user').on('submit',function(e){
        e.preventDefault();
        var frm = $(this);
        var id = frm.data('id');
        var method = frm.attr('method');
        var url = frm.attr('action');
        $.ajax({
            url:url,
            data:frm.serialize(),
            method:method,
            dataType:"json",
            success:function(data){
                if(data == true){
                    location.reload();
                }else{
                    alert('error');
                }
            }
        });
    });

    //********* UPDATE USER END





});