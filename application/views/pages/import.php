<div class="row">
    <h4>SELECT FIELDS</h4>
    <pre>
        USER ID CODE - FIELD
    </pre>
    <select name="field" data-placeholder="Choose Field ..." class="chzn-select">';
        <?php
            $header = array("Subjects","Schedules","Departments","Courses");
            $value = array("subjecttbl","subject_scheduletbl","departmenttbl","coursetbl");
            foreach($header as $k => $h){
                echo '<option value="'.$value[$k].'">'.$h.'</option>';
            }
        ?>
    </select>
</div>
<div class="row">
    <label class="control-label"><h3><b>Import File</b></h3></label>
    <input id="input-import-field" name="fieLd" type="file" multiple class="file-loading">
</div>