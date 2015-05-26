<?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
<?php endif; ?>
<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
    <?php foreach ($fields as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
        
        <?php if($name=='link_text'): ?>
        <div class="control-group sf_admin_form_row sf_admin_text sf_admin_form_field_category_type" id="div-category-type" style="display: none;">
            <label class="control-label" for="vtp_link_category_type"><?php echo __('Danh sách chuyên mục'); ?></label>
            <div class="controls">
                <div class="field-content">
                    <select id="category_type" name="category_type"></select>
                </div>
            </div>
        </div>
        
        <?php endif ?>
            
        <?php include_partial('vtManageMenu/form_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
            'vtp_menu' => $vtp_menu        )) ?>
    <?php endforeach; ?>
</fieldset>

<script type="text/javascript">
    var url_category_news = '<?php echo url_for1('ajax_load_category_news'); ?>';
    var url_category_service = '<?php echo url_for1('ajax_load_category_service'); ?>';
    $(function(){
        $('#vtp_menu_category_type_1').click(function() {
            $.ajax({
                type: "GET",
                url: url_category_service,
                cache: true,
                success: function(data) {
                    obj = $.parseJSON(data);
                    objHtml = '';
                    for (var val in obj) {
                       objHtml += '<option value="'+val+'">'+obj[val]+'</option>';
                    }
                    $('#category_type').html(objHtml);
                },
                error: function() {
                }
            });
            $('#div-category-type').css("display","block");
        });
        $('#vtp_menu_category_type_2').click(function() {
            $.ajax({
                type: "GET",
                url: url_category_news,
                cache: true,
                success: function(data) {
                    obj = $.parseJSON(data);
                    objHtml = '';
                    for (var val in obj) {
                       objHtml += '<option value="'+val+'">'+obj[val]+'</option>';
                    }
                    $('#category_type').html(objHtml);
                },
                error: function() {
                }
            });
            $('#div-category-type').css("display","block");
        });
    });
    
    
    
    select = document.getElementById('vtp_menu_type_link').value;
    changeLink(select);
    function changeSelectLink() {
        var select = document.getElementById('vtp_menu_type_link').value;
        changeLink(select);
    }
    function changeLink($select){
        if ($select == 0) {
            //Hi?n th? Text nh?p
            document.getElementById('vtp_menu_link_text').disabled='';
            document.getElementById('vtp_menu_link_content').disabled='false';
            document.getElementById('vtp_menu_page').disabled='false';
        }
        if ($select == 1) {
            //Hi?n th? combobox ch?n
            document.getElementById('vtp_menu_link_content').disabled='';
            document.getElementById('vtp_menu_link_text').disabled='false';
            document.getElementById('vtp_menu_page').disabled='false';
        }
        if ($select == 2) {
            //Hi?n th? combobox ch?n
            document.getElementById('vtp_menu_link_content').disabled='false';
            document.getElementById('vtp_menu_link_text').disabled='false';
            document.getElementById('vtp_menu_page').disabled='';
        }
    }
</script>