$(document).ready(function(){

    //*********** LOGIN

    $(document).on('submit','#loginform',function(){
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
                    if(data['status'] == 'active'){
                        document.location.href = '/echecker/dashboard';
                    }else{
                        document.location.href = '/echecker/logout/changepassword';
                    }
                }else{
                    $('.validation-summary-errors').removeClass('hidden');
                    form.effect('bounce','slow');
                }
            }
        });
    });
    //********* LOGIN END

    //*********** CHANGEPASSWORD
    $(document).on('submit','#form-changepassword',function(){
        
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
                    swal("Success", "Password Successfully Changed", "success");
                   document.location.href = '/echecker/dashboard';
                }else{
                    $('.validation-summary-errors').removeClass('hidden');
                    form.effect('bounce','slow');
                }
            }
        });
    });
    //********* CHANGEPASSWORD END

    //********* SIGN OUT
    $('#btn-signout').on('click',function(){
        document.location.href = 'logout';
    });

    //********* SIGN OUT END
    
     /***************GREETINGS***************/
    var thehours = new Date().getHours();
	var themessage;
	var morning = ('Good Morning');
	var afternoon = ('Good Afternoon');
	var evening = ('Good Evening');

	if (thehours >= 0 && thehours < 12) {
        $('#morning-greetings').removeClass('hidden');
        $('#afternoon-greetings').addClass('hidden');
        $('#evening-greetings').addClass('hidden');
		themessage = morning;

	} else if (thehours >= 12 && thehours < 18) {
        $('#morning-greetings').addClass('hidden');
        $('#afternoon-greetings').removeClass('hidden');
        $('#evening-greetings').addClass('hidden');
		themessage = afternoon;

	} else if (thehours >= 18 && thehours < 24) {
        $('#morning-greetings').addClass('hidden');
        $('#afternoon-greetings').addClass('hidden');
        $('#evening-greetings').removeClass('hidden');
		themessage = evening;
	}

	$('.greeting').append(themessage);
    /***************END GREETINGS***************/
    //******** ETC */
    
        tinymce.init({
        selector: '#mytextarea'
    });

    //********* DATA TABLES
    $('#table-professorslist').DataTable();
    $('#table-studentslist').DataTable();
    $('#table-subjectList').DataTable();
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
        uploadAsync:true,
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
        }
       
    });
 
    $(document).on("fileuploaded","#input-import-users",function(event,data,previewId,index){
        if(data.response){
            swal("Success", "Successfully Recorded.", "success");
            location.reload();
            
        }else{
            swal("Error", "Error Delete Record.", "error");
            return false;
        }

    });
   
    //********* FILEINPUT END
    //********* DELETE USER

    $(document).on('click','.btn-delete-user',function(e){
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
                
                $.ajax({
                url:url,
                data:{id:id},
                dataType:"json",
                method:"POST",
                success:function(data){
                    if(data == true){
                        btn.closest("tr").remove();
                        swal("success", "Record Deleted.", "success");
                        
                    }else{
                        swal("Cancelled", "Error Delete Record.", "error");
                    }
                }
            });
            } else {
                swal("Cancelled", "Delete Canceled.", "error");
            }
        });
        
        
    });
    //********* DELETE USER END
    //********* UPDATE USER
    $(document).on('click','.btn-update-user',function(e){
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        $.ajax({
            url:'users/getuserinfobyid',
            dataType:"json",
            method:"POST",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#mdl-title').html('Update User');
                if(data["user_level"] == 1){
                    var inputList = ["firstname","middlename","lastname","course","year_level"];
                }else if(data["user_level"] == 2){
                    var inputList = ["firstname","middlename","lastname","position"];
                }
                var htmlbody = '<form action="users/updateUser" method="POST" id="mdl-frm-update-user">'
                              +'<input type="hidden" value="'+data['idusers']+'" name="idusers">';
                inputList.forEach(function(inputs){
                    htmlbody += '<div class="input-group">'
                               +'   <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">'+inputs+'</div></span>'
                               +'   <input type="text" class="form-control" name="'+inputs+'" value="'+data[inputs]+'" aria-describedby="basic-addon1" required="required">'
                               +'</div>'
                });
                
                htmlbody += ''
                            +'<div class="form-group">'
                            +'   <label for="exampleFormControlSelect1">Example select</label>'
                            +'    <select class="form-control" id="exampleFormControlSelect1">'
                            +'    <option>1</option>'
                            +'    <option>2</option>'
                            +'    <option>3</option>'
                            +'    <option>4</option>'
                            +'    <option>5</option>'
                            +'    </select>'
                            +'</div>'
                        ;
                
                $('.modal-body').html(htmlbody);
                
                var footer = '<button type="submit" form="mdl-frm-update-user" class="btn btn-primary btn-post-user-update">Save changes</button>'
                            +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                $('.modal-footer').html(footer);
            }
        });
    
        $('#modal-dynamic').modal('show');
    });

    
    $(document).on('submit','#mdl-frm-update-user',function(e){
        e.preventDefault();
        var frm = $(this);
        var id = frm.data('id');
        var method = frm.attr('method');
        var url = frm.attr('action');
        swal({
            title: "Are you sure?",
            text: "Do you want to update this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url:url,
                    data:frm.serialize(),
                    method:method,
                    dataType:"json",
                    success:function(data){
                        if(data == true){
                            swal("success", "Record Updated.", "success");   
                            location.reload();
                            $('#mdl-user-update').modal('hide');
                        }else{
                            swal("cancelled", "Error Update Record.", "error");
                        }
                    }
                });
            } else {
                swal("Cancelled", "Update Canceled.", "error");
            }
        });
        
    });

    //********* UPDATE USER END
    

    //******** Add Subject */
    $(document).on('click','.btn-add-subject',function(e){
        e.preventDefault();
        
        $('#mdl-title').html('Add Subject');
        var inputList = ["Code","Description","Units"];
        var htmlbody = '<form action="subjects/addsubject" method="post" onsubmit="return false;" id="mdl-frm-add-subject">';
        inputList.forEach(function(inputs){
            htmlbody += '<div class="input-group">'
                        +'   <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">'+inputs+'</div></span>'
                        +'   <input type="text" class="form-control" name="'+inputs+'" aria-describedby="basic-addon1" required="required">'
                        +'</div>'
        });
        htmlbody += '</form>';
        $('.modal-body').html(htmlbody);
        
        var footer = '<button type="submit" form="mdl-frm-add-subject" class="btn btn-primary btn-post-add-subject"><i class="material-icons">playlist_add_check</i></button>'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i></button>';
        $('.modal-footer').html(footer);
    
    
        $('#modal-dynamic').modal('show');
    });
    //******** ADD SUBJECT END */

    //******** POST ADD SUBJECT */
    $(document).on('submit','#mdl-frm-add-subject',function(e){
        e.preventDefault();
        var frm = $(this);
        var id = frm.data('id');
        var method = frm.attr('method');
        var url = frm.attr('action');
        swal({
            title: "Are you sure?",
            text: "Do you want to Save this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Save it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url:url,
                    data:frm.serialize(),
                    method:method,
                    dataType:"json",
                    success:function(data){ 
                        if(data[1] == true){
                            swal("success", "Record Added.", "success");   
                            location.reload();
                        }else{
                            swal("cancelled", data[0], "error");
                        }
                    }
                });
            } else {
                swal("Cancelled", "Add Canceled.", "error");
            }
        });
        
    });

    //******** POST ADD SUBJECT END*/

    //******** UPPERCASE*/
    function upperCaseFirstWord(str) {
    var splitStr = str.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
    }

    return splitStr.join(' '); 
    }
    //******** UPPERCASE END*/

    //******** UPDATE SUBJECT*/
    $(document).on('click','.btn-update-subject',function(e){
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        $.ajax({
            url:'subjects/getsubjectinfobyid',
            dataType:"json",
            method:"POST",
            data:{id:id},
            success:function(data){
                console.log(data[0]);
                if(data[1] == true){
                    $('#mdl-title').html('Update Subject');
                    var inputList = ["code","description","units"];

                    var htmlbody = '<form action="subjects/updatesubject" method="POST" id="mdl-frm-update-subject" onsubmit="return false;">'
                                +'<input type="hidden" value="'+data[0]['idsubject']+'" name="idsubject">';
                    inputList.forEach(function(inputs){
                        htmlbody += '<div class="input-group">'
                                +'   <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">'+upperCaseFirstWord(inputs)+'</div></span>'
                                +'   <input type="text" class="form-control" name="'+inputs+'" value="'+data[0][inputs]+'" aria-describedby="basic-addon1" required="required">'
                                +'</div>'
                    });
                    htmlbody += '</form>';
                            
                    $('.modal-body').html(htmlbody);
                    
                    var footer = '<button type="submit" form="mdl-frm-update-subject" class="btn btn-primary btn-post-user-update">Save changes</button>'
                                +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    $('.modal-footer').html(footer);
                }
            }
        });
    
        $('#modal-dynamic').modal('show');
    });
    
    //******** UPDATE SUBJECT END*/

    //******** POST UPDATE SUBJECT*/

    $(document).on('submit','#mdl-frm-update-subject',function(e){
        e.preventDefault();
        var frm = $(this);
        var id = frm.data('id');
        var method = frm.attr('method');
        var url = frm.attr('action');
        swal({
            title: "Are you sure?",
            text: "Do you want to update this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url:url,
                    data:frm.serialize(),
                    method:method,
                    dataType:"json",
                    success:function(data){
                        if(data[1] == true){
                            swal("success", "Record Updated.", "success");   
                            location.reload();
                            $('#mdl-user-update').modal('hide');
                        }else{
                            swal("cancelled", data[0], "error");
                        }
                    }
                });
            } else {
                swal("Cancelled", "Update Canceled.", "error");
            }
        });
        
    });

    //******** POST UPDATE SUBJECT END*/

    //******** POST DELETE SUBJECT*/

    $(document).on('click','.btn-delete-subject',function(e){
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
                
                $.ajax({
                url:url,
                data:{id:id},
                dataType:"json",
                method:"POST",
                success:function(data){
                    if(data[1] == true){
                        btn.closest("tr").remove();
                        swal("success", "Record Deleted.", "success");
                        
                    }else{
                        swal("Cancelled", data[0], "error");S
                    }
                }
            });
            } else {
                swal("Cancelled", "Delete Canceled.", "error");
            }
        });
        
        
    });
    //******** POST DELETE SUBJECT END*/
    
    
    

});