@servers(["fc-master"=>"177.12.163.105","fc-slave"=>"177.12.163.106"])

@macro('deploy')
deploy_code
change_permissions
@endmacro

@task('deploy_code', ['on' => ["fc-master","fc-slave"], 'parallel' => true])
cd /var/www/repositorios/prod/FC-FrontEnd
git reset --hard
git checkout 58f9bbdc8e65d68c08b969d94f3131f233d3c045
@endtask

@task('change_permissions', ['on' => ["fc-master","fc-slave"], 'parallel' => true])
sudo find /var/www/repositorios/prod/FC-FrontEnd -type d -exec chown ec2-user:apache {} +;
sudo find /var/www/repositorios/prod/FC-FrontEnd -type f -exec chown ec2-user:apache {} +;
sudo find /var/www/repositorios/prod/FC-FrontEnd -type d -exec chmod 775 {} +;
sudo find /var/www/repositorios/prod/FC-FrontEnd -type f -exec chmod 664 {} +;
@endtask
