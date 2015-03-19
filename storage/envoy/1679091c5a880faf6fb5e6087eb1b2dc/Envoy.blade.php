@servers(["g7-entretenimento"=>"g7entretenimento@177.12.164.113"])

@macro('deploy')
deploy_code
@endmacro

@task('deploy_code', ['on' => ["g7-entretenimento"], 'parallel' => true])
cd /home/g7entretenimento/prod/g7entretenimento
git reset --hard
git checkout master
@endtask