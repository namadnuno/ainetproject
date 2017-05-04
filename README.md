# Projeto para Ainet

Para meter a dar tem de ser seguidos os seguintes passos.
  1. git clone https://github.com/namadnuno/ainetproject.git
  2. Copiar o .env.example para o .env e alterar
      DB_DATABASE=homestead
      DB_USERNAME=homestead
      DB_PASSWORD=secret
  4. composer install
  3. php artisan migrate
  4. php artisan migratie:refresh --seed
  5. php artisan key:generate
