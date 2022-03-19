<div class="footerSection">
    <footer class="footerPageZone">
        <div class="footerPageLeft">
            <h3>Associations<span>logo</span></h3>
            <p class="footerPageLinks">
                <a href="#" class="link-1">Home</a>
                <a href="#">Blog</a>
                <a href="#">sqdq</a>
                <a href="#">About</a>
                <a href="#">Faq</a>
                <a href="#">Contact</a>
            </p>
            <p class="footerPageCompanyName">Association © 2022</p>
        </div>
        <div class="footerPageCenter">
            <div>
                <i class=""></i>
                <p><span>Amiens</span>France</p>
            </div>
            <div>
                <i class=""></i>
                <p>0600000000</p>
            </div>
            <div>
                <i class="footerTextMail"></i>
                <p><a href="mailto:support@company.com">support@company.com</a></p>
            </div>
        </div>
        <div class="footerPageRight">
            <p class="footerPageCompanyAbout">
                <span>Bienvenu</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus
                vehicula sit amet.
            </p>
            <div class="footerPageIcons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>
        </div>
    </footer>
</div>
<script src="http://localhost:8888/ProjetProv3/Projet/assets/js/script.js"></script>
<?php
//On va vérifier que le tableau des script js existe. Si c'est le cas je le garde sinon je crée un tableau vide pour éviter les erreurs dans la boucle foreach
$scriptList = isset($scriptList) ? $scriptList : [];
//Permet de créer des insertions de script js en fonction d'une liste
foreach ($scriptList as $script) { ?>
<script src="<?= $script; ?>"></script>
<?php } ?>
</body>

</html>