<?php
    include APPPATH . "views/layouts/header.php";
    $htmlbody = '<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;text-align:right;">Department</div></span>
                    <select name="department" class="chosen-select-deselect" tabindex="-1" required="required" style="width:100%;border:none !important;">
                    <option value="d">dfdf</option>
                </select></div></form>';
                      
        $htmlfooter = '<button type="submit" form="mdl-frm-add-student" class="btn btn-primary btn-post-add-subject"><i class="material-icons">playlist_add_check</i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i></button>';
        echo json_encode(array('body'=>$htmlbody,'footer'=>$htmlfooter));
    include APPPATH . "views/layouts/footer.php";
?>