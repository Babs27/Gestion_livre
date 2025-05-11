# Gestion de Livres et Avis - Application Laravel

Application web de gestion de bibliothèque avec système d'avis, développée avec Laravel.
Nous avons ajouté la base de données dans le fichier du projet. Il se nomme avis_livre, et les
Captures d'ecran sont dans le dossier CAPTURE dans le fichier du projet.Nous aons utilisé comme
serveur mysql.

## 📦 Installation


1. **Cloner le dépôt** :
   ```bash
   git clone [votre-url-git]
   cd gestion-livres-avis

2. **Installer les dépendances** :
    composer install
    npm install

3. **Configurer l'environnement** :
    cp .env.gestion .env
    php artisan key:generate

4. **Base de données** :
    DB_DATABASE=avis_livre
    DB_USERNAME=root
    DB_PASSWORD=    

5. **Migrer et peupler la base** :
    php artisan migrate --seed

6. **Lancer l'application** :
    php artisan serve
    
7. **Structure des tables** :
        **books** :
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->text('description');
        $table->date('published_at');
        $table->timestamps();
        **reviews** :
        $table->id();
        $table->foreignId('book_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->integer('rating')->unsigned()->between(1, 5);
        $table->text('comment');
        $table->timestamps();
        **users** :
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();