@servers({server_list})

@macro('deploy')
    deploy_code
@endmacro

@task('deploy_code', ['on' => {server_names}, 'parallel' => true])
    cd {folder}
    git reset --hard
    git checkout {branch}
@endtask