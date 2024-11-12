<ul class="nav_bar">
    <li><a href="#">Accueil</a></li>
    <li><a href="#">À propos</a></li>
    <li id="connex"><a href="#">Connexion</a></li>
    <li hidden><a href="#">Compte</a>
    <li>
</ul>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Frijole&family=Pirata+One&display=swap');

.nav_bar {
    font-family: "Pirata One";
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #2E2E2E;

    position: fixed;
    top: 0;
    width: 100%;
    size: 50px;
}

#connex {
    float: right;
    margin-right: 2%;
}

.nav_bar > li {
    float: left;
}

.nav_bar > li > a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 25px;
    text-decoration: none;
    font-size: 30px;
}

</style>