<?php
$licences = (new LicenceKey)->findAll();
?>
<h1>LICENCES SETTINGS</h1>
<form id="rv-licence-form" method="POST">
    <input name="rv_licence_key" type="text" placeholder="Add New Licence">
    <button class="button button-primary">Submit</button>
</form>
<div class="rv-licences">
    <h1 class="title">All Licences</h1>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>LICENCE KEY</th>
                <th>ACTIF WEBSITE</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($licences as $licence) : ?>
                <tr>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="licence-key" value="<?= $licence->licence ?>">
                            <input type="submit" name="licence-delete" value="&times;" class="licence-delete"></input>
                        </form>
                    </td>
                    <td>
                        <p class="licence-key"><?= $licence->licence ?></p>
                    </td>
                    <td>
                        <p><?= ($licence->website ?? '......') ?></p>
                    </td>
                    <td>
                        <p class="licence-status"><?= $licence->status ?></p>
                    </td>
                    <?php if ($licence->website) : ?>
                        <td>
                            <label class="switch">
                                <input class="status-toggler" type="checkbox" <?php checked('actif', $licence->status); ?>>
                                <span class="slider"></span>
                            </label>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>