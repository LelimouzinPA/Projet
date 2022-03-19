<?php
include 'controllers/infoCtrl.php';
include 'parts/header.php'        ;
?>
<section id="viewPage">
    <div id="containerLeft">
        <div id="associationLogo" class="containerProfilAssociation">
            <div>
                <img id="imgLogo" src="<?=$imgLogoSrc; ?>" alt="">
            </div>
            <div>
                <h2><?=$nameAssociation; ?></h2>
            </div>
            <div>
                <h3><?=$informationSearch->slogan; ?></h3>
            </div>
        </div>
        <div id="associationDescription" class="containerProfilAssociation">
            <div>
                <textarea name="" id="associationDescriptionTextarea"><?=$informationSearch->description; ?></textarea>
            </div>
        </div>
    </div>
    <div id="associationMap" class="containerProfilAssociation">
        <div>
            <img id="imgMap" src="<?=$imgMapSrc; ?>" alt="">
        </div>
        <div id="associationMapList">
            <div id="map"></div>
        </div>
        <div>
            <h3>Objet</h3>
            <p><?=$informationSearch->objet; ?></p>
        </div>
        <div>
            <h3>Adresse</h3>
            <p><?=$informationSearch->addressofheadquarters; ?></p>
        </div>
    </div>
    <div id="associationActu">
        <div class="containerInfo">
            <img id="imgActu" src="<?=$imgActuSrc; ?>" alt="">
        </div>
        <div class="containerInfo">
            <textarea name="" id="associationActuTextarea"><?=$informationSearch->story; ?></textarea>
        </div>
    </div>
    <div id="associationCalendar" class="containerProfilAssociation">
        <div id="associationContainerCalendar">
            <p>Prochainement un calendrier vous permettra d'insérer vos évènements!!!!!</p>
            <img src="assets\img\calendrier-avril-2022.jpg" id="associationImgCalendar" alt="">
        </div>
    </div>
    <div id="associationSocial" class="containerProfilAssociation">
        <div id="associationContainerSocial">
            <div id="containerAssociationSocial">
                <img src="assets/img/iconSocial/icons8-f-de-facebook-96.png" alt="">
                <img src="assets/img/iconSocial/icons8-instagram-96.png" alt="">
                <img src="assets/img/iconSocial/icons8-twitter-entouré-96.png" alt="">
            </div>
        </div>
    </div>
</section>
</div>
<script>
window.addEventListener("load", function() {listMap("<?=$informationSearch->rna?>");});
</script>
<?php
include 'parts/errorConnect.php';
include 'parts/footer.php'      ;