<?php

namespace Deployer;

require 'recipe/statamic.php';

set('application', 'dnd-bonami');
set('repository', 'https://github.com/dlindeboom/bonami-statamic-dnd.git');
set('writable_mode', 'chown');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:cache:clear',
    'artisan:migrate',
    'statamic:stache:clear',
    'statamic:stache:warm',
    'npm:install',
    'npm:production',
    'deploy:publish',
]);

task('npm:install', function () {
    run('cd {{release_path}} && npm install');
});

task('npm:production', function () {
    run('cd {{release_path}} && npm run build');
});

host('production')
    ->set('hostname', getenv('DEPLOY_HOST'))
    ->set('remote_user', getenv('DEPLOY_USER'))
    ->set('port', getenv('DEPLOY_PORT'))
    ->set('deploy_path', getenv('DEPLOY_PATH'));

after('deploy:failed', 'deploy:unlock');
