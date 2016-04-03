# vagrant-ansible-lamp-with-behat-phantomjs
Vagrant box (Debian 8) for Parallels VM with LAMP ansible provisioning.

Includes ready to use selenium/phantomjs for behat tests.

``
vagrant up
vagrant ssh
cd /var/www/mydomain
vendor/bin/behat
``

Maybe problem with Apache, try:
``
sudo su -
a2dismod mpm_event
a2enmod mpm_prefork
/etc/init.d/apache2 start
``


Notes:

VM is Paralles, to use other just modify Vagrantfile.

The domain is hardcoded "mydomain.local", look at Vagrantfile and provisioning/playbook.yml

Due to some problems with galaxy-ansible all roles are hardcoded/committed.

Also some of them are customised (elao.phantomjs, arknoll.selenium)

Tags:
selenium, phantomjs, behat, LAMP, vagrantbox, ansible, debian
