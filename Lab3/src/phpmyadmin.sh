#!/bin/bash
docker kill phpmyadmin
docker rm phpmyadmin
docker run --name myadmin -d -e PMA_HOST=dng-dev.csvkalptu4cm.us-east-1.rds.amazonaws.com -p 8080:80 phpmyadmin/phpmyadmin
