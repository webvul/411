<?php namespace FOO; ?>

<table style="<?= $table_style ?>">
  <tbody>
  <?php foreach($alerts as $alert): ?>
    <tr>
    <?php if(!$content_only): ?>
      <td style="<?= $cell_style ?> width: 1px;">
        <a name="<?= $alert['id'] ?>"></a>
        <input type="checkbox" name="alerts[]" value="<?= $alert['id'] ?>" />
      </td>
      <td style="<?= $cell_style ?> width: 1px;">
        <?php if($alert['id']): ?>
        <a style="<?= $button_style ?>" href="<?= $base_url ?>/alert/<?= $alert['id'] ?>">View</a>
        <?php endif ?>
      </td>
      <td style="<?= $cell_style ?> width: 1px;">
      <?php if(!is_null($alert['source'])): ?>
        <a style="<?= $button_style ?>" href="<?= Util::escape($alert['source']) ?>">Source</a>
      <?php endif ?>
      </td>
      <td style="<?= $cell_style ?> width: 1px;">
        <span style="white-space: nowrap;"><?= Util::formatDate($alert['alert_date']) ?></span>
        <span style="white-space: nowrap;"><?= Util::formatTime($alert['alert_date']) ?></span>
      </td>
    <?php endif ?>
    <?php foreach($alertkeys as $alertkey): ?>
      <td style="<?= $cell_style ?>"><?= nl2br(Util::get($alert['content'], $alertkey, '')) ?></td>
    <?php endforeach ?>
    </tr>
  <?php endforeach ?>
  </tbody>

  <thead>
    <tr>
    <?php if(!$content_only): ?>
      <th style="<?= $h_cell_style ?>"></th>
      <th style="<?= $h_cell_style ?>"></th>
      <th style="<?= $h_cell_style ?>"></th>
      <th style="<?= $h_cell_style ?>">Date</th>
    <?php endif ?>
    <?php foreach($alertkeys as $alertkey): ?>
      <th style="<?= $h_cell_style ?>"><?= Util::escape($alertkey) ?></th>
    <?php endforeach ?>
    </tr>
  </thead>

</table>
