<?php
include 'controllers/accueilCtrl.php';
?>
<section>
    <div id="actuMainPage">
        <div class="actuZoneMainPage">
            <div class="actuTitleMainPage">
                <h2>Bonjour</h2>
            </div>
            <div class="textMainPage">
                <p>Bienvenue sur Amiens Association, un guide des associations d'Amiens et ses alentours</p>
                <p>Vous trouverez ici un espace d'échanges entre vous et vos associations préférées.</p>
            </div>
        </div>
    </div>
</section>

<section>
<div id="viewHome"class="textMainPage" >
    <p>Vous faites partie d'une association, vous en êtes fier et vous souhaitez la faire connaître au plus grand nombre ! 
Cependant, vous ne savez comment vous y prendre. Ce site est fait pour vous. <br>
N'hesitez pas à créer votre espace personnel. Commencez dès maintenant !
</p>
<p>Vous recherchez une activité ou un sport sur Amiens et ses alentours, pour vous, votre enfant ou votre famille, elle se trouve peut-être sur notre site. 
En effet, ce site référence de nombreuses associations de loisirs, de sport et culturelles!</p>
</div>
</section>
<section>
    <div id="containerMap">
        <div id="cadreMap"><img src="../Projet/assets/img/cadres.png" alt=""></div>
        <div id="veil">
            <p id="veilText">Cliquez pour consulter la carte</p>
        </div>
        <div id="map"></div>
    </div>
</section>
<script>
window.addEventListener('load', function() {
    listMapAll()
});
</script>
<?php
include 'parts/errorConnect.php';