<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/NicolasReitin/cvb-back.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('109.234.165.116')
    ->set('remote_user', 'eoyk6807')
    ->set('deploy_path', '~/api.caenvolleyball.nicolas-reitin.fr');

    set('http_user', 'www-data');
// Hooks

desc('Prepares a new release');
task('deploy:prepare', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    //'deploy:writable',
]);


after('deploy:failed', 'deploy:unlock');
