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
                if(data == true){
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
        filebatchuploadsuccess:function(data){
            console.log(data);
        }
    });

    //********* FILEINPUT END
    //********* DELETE USER

    $('.btn-delete-user').on('click',function(e){
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        var url = btn.attr('href');
        $.ajax({
            url:url,
            data:{id:id},
            dataType:"json",
            method:"POST",
            success:function(data){
                if(data == true){
                    location.reload();
                }else{
                    
                }
            }
        });
    })
    //********* DELETE USER END
});