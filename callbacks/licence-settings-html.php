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
                <th>LICENCE KEY</th>
                <th>ACTIF WEBSITE</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($licences as $licence) : ?>
                <tr>
                    <td>
                        <p><?= $licence->licence ?></p>
                    </td>
                    <td>
                        <p><?= ($licence->website ?? '......') ?></p>
                    </td>
                    <td>
                        <p><?= $licence->status ?></p>
                    </td>
                    <td><button>activate</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>