#!/bin/bash
sudo docker stop sti_project
sudo docker rm sti_project
sudo docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018
sudo docker exec -u root sti_project service nginx restart
sudo docker exec -u root sti_project service php5-fpm restart
sudo docker exec -u root sti_project chmod -R a+w /usr/share/nginx/databases