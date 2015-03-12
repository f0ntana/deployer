@servers(["fc-homologaao"=>"187.1.141.120"])

@macro('deploy')
deploy_code
@endmacro

@task('deploy_code', ['on' => ["fc-homologaao"], 'parallel' => true])
ls -la > ~/deployer.log
@endtask