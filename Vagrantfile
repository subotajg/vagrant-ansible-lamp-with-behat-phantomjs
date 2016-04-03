Vagrant.configure(2) do |config|
  config.vm.box = "parallels/debian-8.1"

  config.vm.network "private_network", ip: "192.168.50.167"
  config.vm.hostname = "mydomain.local"
  config.hostsupdater.aliases = ["mydomain.local", "www.mydomain.local"]

  config.ssh.forward_agent = "true"

  config.vm.provider "parallels" do |pr|
  	pr.memory = 256
  end

  config.vm.synced_folder ".", "/var/www/vagrant-ansible-lamp-with-behat-phantomjs"
  
  #all roles are committed (some of them modified due to Debian 8 issues)
  config.vm.provision "trigger", :option => "value" do |trigger|
      trigger.fire do
          #run "provisioning/install_roles.sh" 
      end
  end

  config.vm.provision "ansible" do |ansible|
      ansible.playbook = "provisioning/playbook.yml"
      ansible.sudo = true
      ansible.extra_vars = {
        ansible_ssh_user: 'vagrant',
      }
      #ansible.skip_tags = 'auth,structure,cron'
  end

  # due to late mounting of share folder (that causes nginx crash)
  # need to start nginx again
  config.vm.provision :shell, :inline=> "sudo service apache2 start", run: "always"
end