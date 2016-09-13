<?php
// Routes
$app->get('/signin', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'connexion.phtml', $args);
});

$app->get('/signup', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'enregistrement.phtml', $args);
});

$app->get('/install', function ($request, $response, $args) {
		
	$this->db;
		$capsule = new \Illuminate\Database\Capsule\Manager;
		$capsule::schema()->create('users', function (\Illuminate\Database\Schema\Blueprint $table) {
			$table->increments('id');
			$table->string('prenom');
			$table->string('nom');
			$table->string('mail');
			$table->string('mdp');
			$table->string('pseudo');
			
			// Include created_at and updated_at
			$table->timestamps();
		});
		
		$capsule::schema()->create('articles', function (\Illuminate\Database\Schema\Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('article');
			$table->date('date_article');
			$table->integer('fk_user_id')->unsigned();
			$table->foreign('fk_user_id')->references('id')->on('users');
			
			// Include created_at and updated_at
			$table->timestamps();
		});
			
		$capsule::schema()->create('comments', function (\Illuminate\Database\Schema\Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('comment');
			$table->date('date_comment');
			$table->integer('fk_user_id')->unsigned();
			$table->foreign('fk_user_id')->references('id')->on('users');
			$table->integer('fk_article_id')->unsigned();
			$table->foreign('fk_article_id')->references('id')->on('articles');
				
			// Include created_at and updated_at
			$table->timestamps();
		});
});

$app->get('/users/id/[{id}]', function ($request, $response, $args) {
	// Affichage d'un user 
	$this->db;
	$user = Users::find($args["id"]);
	echo "<ul><li>";
	echo $user->nom;
	echo "</li><li>";
	echo $user->prenom;
	echo "</li><li>";
	echo $user->mail;
	echo "</li><li>";
	echo $user->mdp;
	echo "</li><li>";
	echo $user->pseudo;
	echo "</li></ul>";
	// Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'afficherUser.phtml', $args);
});

$app->post('/accueil', function ($request, $response, $args) {

	$email = $_POST["email"];
	$password = $_POST["password"];

	echo "".$email." ".$password;
	
	// Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'accueil.phtml', $args);
});


















$app->get('/[{name}]', function ($request, $response, $args) {
	// Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
