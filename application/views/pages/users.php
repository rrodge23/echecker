<div class="row">
   
        <div class="col-md-12">
             <ul class="nav nav-tabs tab-nav-right" role="tablist" style="background-color:transparent !important;">
                <li role="presentation" class="active" style="width:20%;">
                    <a href="#users_list" data-toggle="tab">
                        <i class="material-icons">account_circle</i>
                        <span>User List</span>
                    </a>
                </li>
                <li role="presentation" style="width:20%;">
                    <a href="#import_users" data-toggle="tab">
                        <i class="material-icons">file_download</i>
                        <span>Import</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="users_list">
                    <table id="usersTableList" class="table table-striped">        
                        <thead>
                            <tr>
                            
                                <?php
                                    if($_SESSION['users']['user_level'] == 'admin'){
                                        echo
                                            '<td class="text-center font-roboto color-a2">ID</td>
                                             <td class="text-center font-roboto color-a2">NAME</td>
                                             <td class="text-center font-roboto color-a2">ACTION</td>
                                            ';
                                    }
                                ?>
                                
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($data){
                                foreach($data as $u){
                                    $id = $u['UID'];
                                    $name = $u['user'];
                                    echo "
                                        <tr>  
                                            <td class='text-center checked'>$id</td>
                                            <td class='text-center'>$name</td>
                                            <td class='text-center'>
                                                <button data-id='$id' rel='tooltip' data-original-title='Update' class='btn-update-user btn btn-info' type='button' name='update' onclick='return false;'>
                                                    <i class='material-icons'>create</i>
                                                </button>
                                                <button href='users/deleteuser' data-id='$id' rel='tooltip' data-original-title='Delete' class='btn-delete-user btn btn-danger' type='submit' name='deleteUser' onclick='return false;'>
                                                    <i class='material-icons'>delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="import_users">
                    <div class="row">
                        <label class="control-label"><h3><b>Import File</b></h3></label>
                        <input id="input-import-users" name="usersFile" type="file" multiple class="file-loading">
                    </div>
                    <div id="result">

                    </div>
                </div>
            </div>
        </div>
</div>