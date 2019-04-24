    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-server"></i> <?= $this->lang->line('placeholder_edit_realm'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= base_url('admin/realms'); ?>" class="uk-icon-button"><i class="fas fa-arrow-circle-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <?= form_open('', 'id="updaterealmForm" onsubmit="UpdateRealmForm(event)"'); ?>
            <div class="uk-margin-small">
              <label class="uk-form-label"><?= $this->lang->line('table_header_id'); ?></label>
              <div class="uk-form-controls">
                <input class="uk-input" type="number" id="realm_id" value="" placeholder="Auth -> realmlist -> ID" required>
              </div>
            </div>
            <div class="uk-margin-small">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><?= $this->lang->line('placeholder_soap_hostname'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="soap_hostname" value="" placeholder="127.0.0.1" required>
                  </div>
                </div>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><?= $this->lang->line('placeholder_soap_port'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="number" id="soap_port" value="" placeholder="7878" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><?= $this->lang->line('placeholder_soap_user'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="soap_username" value="" placeholder="blizzcms" required>
                  </div>
                </div>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><?= $this->lang->line('placeholder_soap_password'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="password" id="soap_password" value="" placeholder="ascent" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><strong><?= $this->lang->line('placeholder_db_character'); ?></strong> <?= $this->lang->line('placeholder_db_hostname'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="character_hostname" value="" placeholder="127.0.0.1" required>
                  </div>
                </div>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><strong><?= $this->lang->line('placeholder_db_character'); ?></strong> <?= $this->lang->line('placeholder_db_name'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="character_database" value="" placeholder="characters" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><strong><?= $this->lang->line('placeholder_db_character'); ?></strong> <?= $this->lang->line('placeholder_db_user'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="character_username" value="" placeholder="root" required>
                  </div>
                </div>
                <div class="uk-inline uk-width-1-2@s">
                  <label class="uk-form-label"><strong><?= $this->lang->line('placeholder_db_character'); ?></strong> <?= $this->lang->line('placeholder_db_password'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="password" id="character_password" value="" placeholder="ascent">
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <button class="uk-button uk-button-primary uk-width-1-1" type="submit" name="button_uprealm"><i class="fas fa-check-circle"></i> <?= $this->lang->line('button_create'); ?></button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </section>

    <script>
      function UpdateRealmForm(e) {
        e.preventDefault();

        var id = "<?= $idlink ?>";
        var realmid = $.trim($('#realm_id').val());
        var soaphost = $.trim($('#soap_hostname').val());
        var soapport = $.trim($('#soap_port').val());
        var soapuser = $.trim($('#soap_username').val());
        var soappass = $.trim($('#soap_password').val());
        var charhost = $.trim($('#character_hostname').val());
        var chardb = $.trim($('#character_database').val());
        var charuser = $.trim($('#character_username').val());
        var charpass = $.trim($('#character_password').val());

        if(id == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_id_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        $.ajax({
          url:"<?= base_url($lang.'/admin/realms/update'); ?>",
          method:"POST",
          data:{id, realmid, soaphost, soapport, soapuser, soappass, charhost, chardb, charuser, charpass},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= $this->lang->line('notification_title_info'); ?>',
                message: '<?= $this->lang->line('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notification_title_success'); ?>',
                  message: '<?= $this->lang->line('notification_realm_edited'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#updaterealmForm')[0].reset();
          }
        });
      }
    </script>
