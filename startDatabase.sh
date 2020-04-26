docker run -it --rm \
  -h dbPlants \
  -v "$PWD/data":/var/lib/mysql \
  -e MYSQL_ROOT_PASSWORD=secret \
  -e MYSQL_USER=root \
  -e MYSQL_DATABASE=plants \
  -p 33060:3306 \
  --name plants \
  mysql:latest --default-authentication-plugin=mysql_native_password


# sudo chown $USER:$USER -R data
# sudo chmod 777 -R data
