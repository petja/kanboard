<div class="page-header">
    <h2><?= t('Edit user') ?></h2>
</div>
<form method="post" action="<?= $this->u('user', 'edit', array('user_id' => $user['id'])) ?>" autocomplete="off">

    <?= $this->formCsrf() ?>

    <?= $this->formHidden('id', $values) ?>
    <?= $this->formHidden('is_ldap_user', $values) ?>

    <?= $this->formLabel(t('Username'), 'username') ?>
    <?= $this->formText('username', $values, $errors, array('required', $values['is_ldap_user'] == 1 ? 'readonly' : '')) ?><br/>

    <?= $this->formLabel(t('Name'), 'name') ?>
    <?= $this->formText('name', $values, $errors) ?><br/>

    <?= $this->formLabel(t('Email'), 'email') ?>
    <?= $this->formEmail('email', $values, $errors) ?><br/>

    <?= $this->formLabel(t('Default project'), 'default_project_id') ?>
    <?= $this->formSelect('default_project_id', $projects, $values, $errors) ?><br/>

    <?php if ($this->acl->isAdminUser()): ?>
        <?= $this->formCheckbox('is_admin', t('Administrator'), 1, isset($values['is_admin']) && $values['is_admin'] == 1 ? true : false) ?><br/>
    <?php endif ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
        <?= t('or') ?>
        <?= $this->a(t('cancel'), 'user', 'show', array('user_id' => $user['id'])) ?>
    </div>
</form>