<?php
include 'controllers/sportCtrl.php';
include 'parts/header.php';
?>
<section>
    <div id="<?= $type = isset($value->type) ? 'type' : 'choice'; ?>">
        <div id="containerType">
            <p>Selectionner votre catégorie:</p>
            <form id="choiceType">
                <div style="display : none">
                    <input type="radio" id="contactChoice1" name="choiceType" onChange='ChoixCategory()'
                        value="loisirs">
                    <label for="contactChoice1">Loisirs</label>
                    <input type="radio" id="contactChoice2" name="choiceType" onChange='ChoixCategory()' value="sport"
                        checked>
                    <label for="contactChoice2">Sport</label>
                    <input type="radio" id="contactChoice3" name="choiceType" onChange='ChoixCategory()'
                        value="culture">
                    <label for="contactChoice3">Culture</label>
                </div>
                <div>
                    <select id="heading" name="heading" onChange='searchZone(this.form)'></select>
                    <select id="subHeading" name="subHeading" onChange='searchSubZone()'></select>
                </div>
            </form>
        </div>
    </div>
</section>
<section>
    <div id="tableContainer">
        <table>
            <thead id="thead">
            </thead>
            <tbody id="tbody">
                <?php
        foreach ($contentsList as $info) { ?>
                <tr>
                    <td><?= $info->name; ?></td>
                    <td><?= $info->heading; ?></td>
                    <td><?= $info->subHeading; ?></td>
                    <td><a href="info.php?name=<?= $info->name; ?>" class="btn btn-warning">Informations</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</section>
<?php
include 'parts/errorConnect.php';
include 'parts/footer.php';