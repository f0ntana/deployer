@servers(["maqdencombr"=>"maqden@177.12.163.105"])

@macro('deploy')
    deploy_code
@endmacro

@task('deploy_code', ['on' => ["maqdencombr"], 'parallel' => true])
    cd /home/maqden/prod/maqden
    git reset --hard
    git checkout master
@endtask