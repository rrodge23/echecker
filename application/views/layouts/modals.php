
<div id="mdl-user-update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update User</h4>
      </div>

     <form action="users/updateuser" method="POST" id="mdl-frm-update-user">
            <input type="hidden" name="UID" id="input-user-update-UID">
            <div class="modal-body">
                <div class="form-group">
                    <span>Username<br></span>
                    <input type="text" placeholder="username" class="form-control" data-val="true" data-val-required="A value is required." id="input-user-update-user" name="user" required="required">
                </div>
                <div class="form-group">
                    <span>User Level:<br></span>
                    <input type="text" placeholder="userlevel" class="form-control" data-val="true" data-val-required="A value is required." id="input-user-update-user_level" name="user_level" required="required">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-blue waves-effect btn-post-user-date"><i class="material-icons">assignment_turned_in</i></button>
            </div>
      </form>
    </div>
  </div>
</div>