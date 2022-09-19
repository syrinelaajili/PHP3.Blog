<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Transmission de données entre 2 pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800&display=swap" rel="stylesheet">
    <link href="css/lib/normalize.css" rel="stylesheet">
    <link href="css/lib/all.min.css" rel="stylesheet">
    <link href="css/lib/layout-3wa.css" rel="stylesheet">
    <link href="css/lib/theme-cafeine.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <header class="banner">
    <a class="banner-link" href="./">
      <strong class="banner-title">Transmission de données via un formulaire</strong>
      <small>PHP - Module 1</small>
    </a>
  </header>
  <main class="container">
    <article class="project-section">
      <header>
          <h1>Transmission de données via un formulaire</h1>
          <p>Un formulaire HTML défini avec la balise <code><?= htmlspecialchars('<form>') ?></code> permet de transmettre des données au serveur. Elles pourront ensuite être traitées
          pour être par exemple enregistrées dans une base de données ou un fichier. On retrouve des formulaires très fréquemment sur le web pour créer un compte, passer une commande,
          envoyer un message de contact, etc.</p>
      </header>
      <section>
          <h2>Affichage du formulaire</h2>
          <p>Vous devez ajouter à la balise <code><?= htmlspecialchars('<form>') ?></code> 2 attributs importants : </p>
          <dl>
            <dt>action</dt>
            <dd>L'attribut <span class="accent">action</span> permet de renseigner l'URL de la page vers laquelle on souhaite envoyer les données du formulaire, c'est-à-dire quel fichier PHP sera
                responsable du traitement des données du formulaire ? Cela peut être la même page que celle qui affiche le formulaire ou bien une tout autre page.</dd>
          </dl>
          <dl>
            <dt>method</dt>
            <dd>
                L'attribut <span class="accent">method</span> renseigne sur la méthode Http que l'on souhaite utiliser pour transmettre les données. On en utilise principalement 2 différentes sur le web :
                <ul>
                    <li>GET : les données voyagent directement dans l'url, dans ce qu'on appelle la chaîne de requête.</li>
                    <li>POST : les données voyagent dans le corps de la requête Http, de manière invisible pour l'internaute.</li>
                </ul>
            </dd>
          </dl>
          <p>Vous devez ensuite ajouter les champs voulus à votre formulaire en n'oubliant surtout pas de leur donner un nom grâce à l'attribut <em>name</em>. C'est grâce
              au nom des champs (à la valeur de leur attribut <em>name</em>) que l'on pourra ensuite récupérer les données du formulaire.</p>
          <p>Voici un formulaire très simple dans lequel l'internaute va renseigner son nom. Les données seront ici envoyées vers la même page,
          index.php, avec la méthode POST.</p>

          <pre>
              <code contenteditable="true" spellcheck="false">
<span class="hljs-tag">&lt;<span class="hljs-name">form</span> <span class="hljs-attr">action</span>=<span class="hljs-string">"index.php"</span> <span class="hljs-attr">method</span>=<span class="hljs-string">"POST"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"firstname"</span>&gt;</span>Votre prénom:<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="em"><span class="hljs-attr">name</span>=<span class="hljs-string">"firstname"</span></span> <span class="hljs-attr">id</span>=<span class="hljs-string">"firstname"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"submit"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"Soumettre"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">form</span>&gt;</span>
              </code>
          </pre>
          <p>Remplissez le champ avec votre prénom et cliquez sur le bouton <em>Soumettre</em></p>
          <form action="index.php#traitements" method="POST">
            <div class="form-group">
              <label for="firstname">Votre prénom:</label>
              <input type="text" name="firstname" id="firstname">
            </div>
            <p class="form-button">
              <input type="submit" class="btn" value="Soumettre">
            </p>
          </form>
      </section>

      <section>
          <h2 id="traitements">Traitement des données</h2>

          <?php if(!empty($_POST)): ?>
            <span class="accent">Merci <?= htmlspecialchars($_POST['firstname']) ?> !! :)</span>
          <?php endif; ?>

          <p>PHP va recevoir les données du formulaire dans une variable dite <b>super globale</b>. C'est une variable créée et remplie par PHP avec les données transmises
          dans la requête Http.
          Si la méthode de la requête est <b>GET</b>, on récupère les données dans <code>$_GET</code>. Si la méthode utilisée est <b>POST</b>, on récupère les données dans <code>$_POST</code>.</p>
          <p><code>$_POST</code> et <code>$_GET</code> sont des <b>tableaux associatifs</b> <em>dont les clés sont le nom des champs du formulaire</em>. Ici par exemple je récupèrerai
          le prénom dans la valeur du tableau <code>$_POST</code> associée
              à la clé <span class="accent">firstname</span> : <code>$_POST['firstname']</code></p>

          <h4>Le formulaire a-t-il été soumis ?</h4>
          <p>Si les données du formulaire sont envoyées vers la même page que celle qui affiche ce formulaire, le même fichier va donc devoir choisir entre 2 actions.</p>
          <ul>
              <li>Choix 1 : afficher le formulaire, s'il n'a pas encore été soumis par l'internaute.</li>
              <li>Choix 2 : traiter les données du formulaire, si celui-ci a bien été soumis par l'internaute.</li>
          </ul>
          <p>Je peux voir si vous avez soumis le formulaire, si vous avez cliqué sur le bouton "Soumettre", en regardant si la variable super globale <code>$_POST</code> est vide ou non.
          <code>if(empty($_POST))</code>
          Si elle est vide, le formulaire n'a pas encore été soumis. Dans le cas contraire cela signifie que des données ont été envoyées, je peux les traiter !</p>

          <?php if(empty($_POST)): ?>
              <p>Ici le test <code>if(empty($_POST))</code> est <span class="accent">true</span>, $_POST est vide , je sais que vous n'avez pas encore soumis le formulaire !
                  Allez-y ne soyez pas timide !</p>
          <?php else: ?>
              <p><span class="accent">Eh ben voilà ! Facile d'envoyer des données ! Pas vrai <?= htmlspecialchars($_POST['firstname']) ?> ? ;-) </span></p>
              <p>J'ai récupéré votre nom en allant chercher dans la tableau associatif <code>$_POST</code> à la clé <span class="accent">firstname</span>,
                  puisque c'est le nom qu'on a donné au champ dans le formulaire (<code>name="firstname"</code>).</p>
          <?php endif; ?>
      </section>

      <section>
        <h2 id="traitements">Ressources</h2>
        <ul>
            <li>
                <a href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/913099-transmettez-des-donnees-avec-les-formulaires">
                [openclassrooms] Transmettez des données avec les formulaires
                </a>
            </li>
            <li><a href="https://www.php.net/manual/fr/reserved.variables.post.php">[php.net] $_POST</a></li>
        </ul>
      </section>
    </article>

    </main>
    <footer id="mentions" class="mentions">
      <a href="http://3wa.fr/" title="Site de la 3WA"><img src="./img/3wa.png" alt="3W Academy" width="50"></a>
      <p><strong> &copy; 3W Academy - Formation Développeur WEB - Tous&nbsp;droits&nbsp;réservés</strong><br>
      Cet exercice est mis à disposition des stagiaires dans le cadre exclusif de leur apprentissage</p>
      <p><small>Nous remercions les auteurs de ces photos récoltées sur <a href="https://pixabay.com/" target="_blank">Pixabay</a></small></p>
      <a class="goTop" href="#" aria-label="Remonter">↑</a>
    </footer>
</body>
</html>
