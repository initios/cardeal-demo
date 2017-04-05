recreate:
	mysql -u root -e "DROP DATABASE IF EXISTS cardeal"
	mysql -u root -e "CREATE DATABASE cardeal"
	mysql -u root -e "CREATE USER IF NOT EXISTS 'cardeal'@'localhost'";
	mysql -u root -e "GRANT ALL PRIVILEGES on cardeal.* to cardeal@'localhost'";
	./artisan migrate
