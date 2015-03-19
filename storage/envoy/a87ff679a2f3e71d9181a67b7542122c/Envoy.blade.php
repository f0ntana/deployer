@servers(["g7-entretenimento"=>"g7entretenimento@177.12.164.113"])

@macro('deploy')
deploy_code
change_permissions
@endmacro

@task('deploy_code', ['on' => ["g7-entretenimento"], 'parallel' => true])
cd /home/g7entretenimento//g7entretenimento
git reset --hard
git checkout master
@endtask

@task('change_permissions', ['on' => ["g7-entretenimento"], 'parallel' => true])
find /home/g7entretenimento//g7entretenimento -type d -exec chmod 775 {} +;
find /home/g7entretenimento//g7entretenimento -type f -exec chmod 664 {} +;
@endtask