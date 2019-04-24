<?php
if (isset($_POST['action_ban'])):
  $reason = $_POST['action_reason'];
  $this->admin_model->insertBanAcc($idlink, $reason);
endif;

if (isset($_POST['button_unban'])):
  $this->admin_model->inserUnBanAcc($idlink);
endif;

if (isset($_POST['button_RemoveRankACCWeb'])):
  $this->admin_model->removeRankAcc($idlink);
endif;

if (isset($_POST['button_AddRankACCWeb'])):
  $gmlevel = $_POST['gmlevel'];
  $this->admin_model->insertRankAcc($idlink, $gmlevel);
endif;
?>
    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-user"></i> <?= $this->lang->line('card_title_user_manage'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="" class="uk-icon-button"><i class="fas fa-info"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-margin-small">
          <div class="uk-card-header">
            <div class="uk-grid uk-grid-small">
              <div class="uk-width-auto">
                <h4 class="uk-h4"><span class="uk-margin-small-right"><i class="fas fa-user"></i></span><?= $this->lang->line('card_title_user_manage'); ?> - <span class="uk-text-bold"><?= $this->wowauth->getUsernameID($idlink); ?></span></h4>
              </div>
              <div class="uk-width-expand"></div>
            </div>
          </div>
          <div class="uk-card-body">
            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid>
              <?php if($this->admin_model->getBanSpecify($idlink)->num_rows()): ?>
              <div>
                <div class="uk-card uk-card-default">
                  <div class="uk-card-header uk-card-primary">
                    <h5 class="uk-h5 uk-text-uppercase uk-text-center"><i class="fas fa-check-circle"></i> <?= $this->lang->line('card_title_unban_account'); ?></h5>
                  </div>
                  <div class="uk-card-body">
                    <form action="" method="post">
                      <div class="uk-margin-small">
                        <button class="uk-button uk-button-primary uk-width-1-1" name="button_unban" type="submit"><i class="fas fa-check-circle"></i> <?= $this->lang->line('button_unban'); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php else: ?>
              <div>
                <div class="uk-card uk-card-default">
                  <div class="uk-card-header uk-card-secondary">
                    <h5 class="uk-h5 uk-text-uppercase uk-text-center"><i class="fas fa-ban"></i> <?= $this->lang->line('card_title_ban_account'); ?></h5>
                  </div>
                  <div class="uk-card-body">
                    <form action="" method="post" accept-charset="utf-8">
                      <div class="uk-margin-small">
                        <div class="uk-form-controls">
                          <div class="uk-inline uk-width-1-1">
                            <input class="uk-input" name="action_reason" type="text" placeholder="<?= $this->lang->line('placeholder_reason'); ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="uk-margin-small">
                        <button class="uk-button uk-button-danger uk-width-1-1" name="action_ban" type="submit"><i class="fas fa-ban"></i> <?= $this->lang->line('button_ban'); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <div>
                <div class="uk-card uk-card-default">
                  <div class="uk-card-header uk-card-primary">
                    <h5 class="uk-h5 uk-text-uppercase uk-text-center"><i class="fas fa-gamepad"></i> <?= $this->lang->line('card_title_rank_account'); ?></h5>
                  </div>
                  <div class="uk-card-body">
                    <form action="" method="post">
                      <?php if($this->wowauth->getGmSpecify($idlink)->num_rows()): ?>
                      <div class="uk-margin-small">
                        <button class="uk-button uk-button-primary uk-width-1-1" name="button_RemoveRankACCWeb" type="submit"><i class="fas fa-user-times"></i> <?= $this->lang->line('button_re_grant_account'); ?></button>
                      </div>
                      <?php else: ?>
                      <div class="uk-margin-small">
                        <div class="uk-form-controls">
                          <div class="uk-inline uk-width-1-1">
                            <input class="uk-input" name="gmlevel" type="number" min="1" placeholder="<?= $this->lang->line('placeholder_gmlevel'); ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="uk-margin-small">
                        <button class="uk-button uk-button-primary uk-width-1-1" name="button_AddRankACCWeb" type="submit"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_grant_account'); ?></button>
                      </div>
                      <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-margin-small">
          <div class="uk-card-header">
            <div class="uk-grid uk-grid-small">
              <div class="uk-width-auto">
                <h4 class="uk-h4"><span class="uk-margin-small-right"><i class="fas fa-user"></i></span><?= $this->lang->line('card_title_general_info'); ?></h4>
              </div>
              <div class="uk-width-expand"></div>
            </div>
          </div>
          <div class="uk-card-body">
            <div class="uk-overflow-auto uk-margin-small">
              <table class="uk-table uk-table-divider uk-table-small">
                <thead>
                  <tr>
                    <th class="uk-width-medium"><?= $this->lang->line('placeholder_username'); ?></th>
                    <th class="uk-width-medium"><?= $this->lang->line('placeholder_email'); ?></th>
                    <th class="uk-width-small"><?= $this->lang->line('panel_member'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->wowgeneral->getUserInfoGeneral($idlink)->result() as $ginfo): ?>
                  <tr>
                    <td><?= $ginfo->username ?></td>
                    <td><?= $ginfo->email ?></td>
                    <td><?= date('Y-m-d', $ginfo->date); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-margin-small">
          <div class="uk-card-header">
            <div class="uk-grid uk-grid-small">
              <div class="uk-width-auto">
                <h4 class="uk-h4"><span class="uk-margin-small-right"><i class="fas fa-user"></i></span><?= $this->lang->line('card_title_donate_history'); ?></h4>
              </div>
              <div class="uk-width-expand"></div>
            </div>
          </div>
          <div class="uk-card-body">
            <div class="uk-overflow-auto uk-margin-small">
              <table class="uk-table uk-table-divider uk-table-small">
                <thead>
                  <tr>
                    <th class="uk-width-small"><?= $this->lang->line('table_header_payment_id'); ?></th>
                    <th class="uk-width-medium"><?= $this->lang->line('table_header_hash'); ?></th>
                    <th class="uk-width-small"><?= $this->lang->line('table_header_total'); ?></th>
                    <th class="uk-width-small"><?= $this->lang->line('table_header_complete'); ?></th>
                    <th class="uk-width-small"><?= $this->lang->line('table_header_create_time'); ?></th>
                    <th class="uk-width-small"><?= $this->lang->line('table_header_points'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->admin_model->getUserHistoryDonate($idlink)->result() as $donateInfo): ?>
                  <tr>
                    <td><?= $donateInfo->payment_id ?></td>
                    <td><?= $donateInfo->hash ?></td>
                    <td><?= $donateInfo->total ?></td>
                    <td><?= $this->admin_model->getDonateStatus($donateInfo->complete); ?></td>
                    <td><?= $donateInfo->create_time ?></td>
                    <td><?= $donateInfo->points ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-margin-small">
          <div class="uk-card-header">
            <div class="uk-grid uk-grid-small">
              <div class="uk-width-auto">
                <h4 class="uk-h4"><span class="uk-margin-small-right"><i class="fas fa-users"></i></span><?= $this->lang->line('panel_chars_list'); ?></h4>
              </div>
              <div class="uk-width-expand"></div>
            </div>
          </div>
          <div class="uk-card-body">
            <ul uk-accordion>
              <?php foreach ($this->wowrealm->getRealms()->result() as $charsMultiRealm):
                $multiRealm = $this->wowrealm->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
              ?>
              <li>
                <a href="#" class="uk-accordion-title"><span class="uk-margin-small-right"><i class="fas fa-server"></i></span>Realm - <?= $this->wowrealm->getRealmName($charsMultiRealm->realmID); ?></a>
                <div class="uk-accordion-content">
                  <div class="uk-overflow-auto uk-margin-small">
                    <table class="uk-table uk-table-divider uk-table-small">
                      <thead>
                        <tr>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_guid'); ?></th>
                          <th class="uk-width-medium"><?= $this->lang->line('table_header_name'); ?></th>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_race'); ?></th>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_class'); ?></th>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_level'); ?></th>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_money'); ?></th>
                          <th class="uk-width-small"><?= $this->lang->line('table_header_total_kills'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($this->wowrealm->getGeneralCharactersSpecifyAcc($multiRealm, $idlink)->result() as $chars): ?>
                        <tr>
                          <td class="uk-table-link"><a href="<?= base_url('admin/managecharacter/'.$chars->guid.'/'.$charsMultiRealm->id); ?>" class="uk-link-reset"><?= $chars->guid ?></a></td>
                          <td class="uk-table-link"><a href="<?= base_url('admin/managecharacter/'.$chars->guid.'/'.$charsMultiRealm->id); ?>" class="uk-link-reset"><?= $chars->name ?></a></td>
                          <td><?= $this->wowgeneral->getRaceName($chars->race); ?></td>
                          <td><?= $this->wowgeneral->getNameClass($chars->class); ?></td>
                          <td><?= $chars->level ?></td>
                          <td><?= $chars->money ?></td>
                          <td><?= $chars->totalKills ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-margin-small">
          <div class="uk-card-header">
            <div class="uk-grid uk-grid-small">
              <div class="uk-width-auto">
                <h4 class="uk-h4"><span class="uk-margin-small-right"><i class="fas fa-list-alt"></i></span><?= $this->lang->line('card_title_annotations'); ?></h4>
              </div>
              <div class="uk-width-expand"></div>
            </div>
          </div>
          <div class="uk-card-body">
            <ul class="uk-list uk-list-bullet">
              <?php foreach($this->admin_model->getAnnotationsSpecify($idlink)->result() as $annotations): ?>
              <li><?= $annotations->annotation ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
