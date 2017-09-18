#Using Docker Lamp stack

1. run: sudo docker run -p 80:80 -t -i linode/lamp /bin/bash
	or  run sudo docker run -p 80:80 -t -i linode/lamp /bin/bash -v /Users/daniel/code-repos/CMPT221-Gisolfi/Lab3/src:/var/www/html/lab3

2. run: service apache2 start

3. run: service mysql start

4. Exit the container while leaving it running by pressing ctrl + p then ctrl + q.