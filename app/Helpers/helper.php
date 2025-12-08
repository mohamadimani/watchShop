<?php

use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

if (!function_exists('Alert')) {
    function Alert($model, $title, $text, $type)
    {
        $alert = new LivewireAlert($model);
        return $alert->title($title)->text($text)->$type()->show();
    }
}

if (!function_exists('confirmAlert')) {
    function confirmAlert($model, $title, $text, $listenerFunction, $params)
    {
        $alert = new LivewireAlert($model);
        return $alert->title($title)->text($text)->withConfirmButton(__('menu.delete'))->withCancelButton(__('menu.cancel'))
            ->onConfirm($listenerFunction, $params)->show();
    }
}

if (!function_exists('user')) {
    function user()
    {
        return Auth::user();
    }
}

if (!function_exists('requireSign')) {
    function requireSign($sign = '*')
    {
        echo '<span class="text-danger">' . $sign . '</span>';
    }
}

if (!function_exists('maxTextLength')) {
    function maxTextLength(string $text, int $length = 20): string
    {
        return strlen($text) > $length ? substr($text, 0, $length) . '...' : $text;
    }
}

if (!function_exists('SaveImage')) {
    function SaveImage($image, $path)
    {
        if ($image) {
            $name = time() . '.' . $image->extension();
            $image->move(public_path('images/' . $path), $name);
            return $name;
        } else {
            return '';
        }
    }
}

if (!function_exists('GetImage')) {
    function GetImage($path)
    {
        if (env('APP_ENV') == 'local') {
            $url =  'images/';
        } else {
            $url = 'public/images/';
        }

        if (file_exists($url . $path)) {
            return asset($url . $path);
        } else {
            return asset($url . 'default.png');
        }
    }
}

if (!function_exists('DeleteImage')) {
    function DeleteImage($path)
    {
        if (is_file(public_path('images/' . $path)) and unlink(public_path('images/' . $path))) {
            return true;
        }
        return false;
    }
}

if (!function_exists('jToTimestamp')) {
    function jToTimestamp(string $jalaliDate)
    {
        return Verta::parse($jalaliDate)->toCarbon()->timestamp;
    }
}

if (!function_exists('jDate')) {
    function jDate(string $date, bool $showTime = false, $seperator = '/')
    {
        $timeFormat = $showTime ? ' H:i:s' : '';
        return Verta::instance($date)->format('Y' . $seperator . 'm' . $seperator . 'd' . $timeFormat);
    }
}

if (!function_exists('gDate')) {
    function gDate(string $date, bool $showTime = false, $seperator = '-')
    {
        $timeFormat = $showTime ? ' H:i:s' : '';
        return Verta::parse($date)->format('Y' . $seperator . 'm' . $seperator . 'd' . $timeFormat);
    }
}

if (!function_exists('unformatNumber')) {
    function unformatNumber(null|string|int $number): ?string
    {
        if ($number === null) {
            return null;
        }
        if (is_string($number)) {
            return str_replace(',', '', $number);
        }
        return $number;
    }
}

if (!function_exists('ActiveMenu')) {
    function ActiveMenu($route)
    {
        return request()->url() == route($route) ? 'active' : '';
    }
}

if (!function_exists('lang')) {
    function lang()
    {
        return App::currentLocale();
    }
}


if (!function_exists('skillsIcon')) {
    function skillsIcon()
    {
        return $icons = [
            'aarch64',
            'adonisjs',
            'aftereffects',
            'akka',
            'algolia',
            'alpinejs',
            'amazonwebservices',
            'anaconda',
            'android',
            'androidstudio',
            'angular',
            'angularjs',
            'angularmaterial',
            'ansible',
            'antdesign',
            'apache',
            'apacheairflow',
            'apachekafka',
            'apachespark',
            'apl',
            'appcelerator',
            'apple',
            'appwrite',
            'archlinux',
            'arduino',
            'argocd',
            'astro',
            'atom',
            'awk',
            'axios',
            'azure',
            'azuredevops',
            'azuresqldatabase',
            'babel',
            'backbonejs',
            'ballerina',
            'bamboo',
            'bash',
            'beats',
            'behance',
            'bitbucket',
            'blazor',
            'blender',
            'bootstrap',
            'bower',
            'browserstack',
            'bulma',
            'bun',
            'c',
            'cairo',
            'cakephp',
            'canva',
            'capacitor',
            'carbon',
            'cassandra',
            'centos',
            'ceylon',
            'chrome',
            'circleci',
            'clarity',
            'clion',
            'clojure',
            'clojurescript',
            'cloudflare',
            'cloudflareworkers',
            'cmake',
            'codeac',
            'codecov',
            'codeigniter',
            'codepen',
            'coffeescript',
            'composer',
            'confluence',
            'consul',
            'contao',
            'corejs',
            'cosmosdb',
            'couchbase',
            'couchdb',
            'cplusplus',
            'crystal',
            'csharp',
            'css3',
            'cucumber',
            'cypressio',
            'd3js',
            'dart',
            'datagrip',
            'dataspell',
            'dbeaver',
            'debian',
            'denojs',
            'devicon',
            'digitalocean',
            'discordjs',
            'django',
            'djangorest',
            'docker',
            'doctrine',
            'dot-net',
            'dotnetcore',
            'dreamweaver',
            'dropwizard',
            'drupal',
            'dynamodb',
            'eclipse',
            'ecto',
            'elasticsearch',
            'electron',
            'eleventy',
            'elixir',
            'elm',
            'emacs',
            'embeddedc',
            'ember',
            'envoy',
            'erlang',
            'eslint',
            'express',
            'facebook',
            'fastapi',
            'fastify',
            'faunadb',
            'feathersjs',
            'fedora',
            'figma',
            'filezilla',
            'firebase',
            'firefox',
            'flask',
            'flutter',
            'fortran',
            'foundation',
            'framermotion',
            'framework7',
            'fsharp',
            'gatling',
            'gatsby',
            'gazebo',
            'gcc',
            'gentoo',
            'ghost',
            'gimp',
            'git',
            'gitbook',
            'github',
            'githubactions',
            'githubcodespaces',
            'gitlab',
            'gitpod',
            'gitter',
            'go',
            'godot',
            'goland',
            'google',
            'googlecloud',
            'gradle',
            'grafana',
            'grails',
            'graphql',
            'groovy',
            'grpc',
            'grunt',
            'gulp',
            'hadoop',
            'handlebars',
            'hardhat',
            'harvester',
            'haskell',
            'haxe',
            'helm',
            'heroku',
            'hibernate',
            'homebrew',
            'html5',
            'hugo',
            'ie10',
            'ifttt',
            'illustrator',
            'influxdb',
            'inkscape',
            'insomnia',
            'intellij',
            'ionic',
            'jaegertracing',
            'jamstack',
            'jasmine',
            'java',
            'javascript',
            'jeet',
            'jekyll',
            'jenkins',
            'jest',
            'jetbrains',
            'jetpackcompose',
            'jira',
            'jiraalign',
            'jquery',
            'json',
            'jule',
            'julia',
            'junit',
            'jupyter',
            'k3os',
            'k3s',
            'k6',
            'kaggle',
            'karatelabs',
            'karma',
            'kdeneon',
            'keras',
            'kibana',
            'knexjs',
            'knockout',
            'kotlin',
            'krakenjs',
            'ktor',
            'kubernetes',
            'labview',
            'laravel',
            'laravel8',
            'laravel9',
            'laravel10',
            'laravel11',
            'laravel12',
            'latex',
            'less',
            'linkedin',
            'linux',
            'liquibase',
            'livewire',
            'llvm',
            'lodash',
            'logstash',
            'lua',
            'lumen',
            'magento',
            'mariadb',
            'markdown',
            'materializecss',
            'materialui',
            'matlab',
            'matplotlib',
            'maven',
            'maya',
            'meteor',
            'microsoftsqlserver',
            'minitab',
            'mithril',
            'mobx',
            'mocha',
            'modx',
            'moleculer',
            'mongodb',
            'mongoose',
            'moodle',
            'msdos',
            'mysql',
            'nano',
            'neo4j',
            'neovim',
            'nestjs',
            'netlify',
            'networkx',
            'nextjs',
            'nginx',
            'ngrx',
            'nhibernate',
            'nim',
            'nimble',
            'nixos',
            'nodejs',
            'nodemon',
            'nodewebkit',
            'nomad',
            'norg',
            'notion',
            'npm',
            'nuget',
            'numpy',
            'nuxtjs',
            'oauth',
            'objectivec',
            'ocaml',
            'ohmyzsh',
            'okta',
            'openal',
            'openapi',
            'opencl',
            'opencv',
            'opengl',
            'openstack',
            'opensuse',
            'opentelemetry',
            'opera',
            'oracle',
            'ory',
            'p5js',
            'packer',
            'pandas',
            'perl',
            'pfsense',
            'phalcon',
            'phoenix',
            'photonengine',
            'photoshop',
            'php',
            'phpstorm',
            'playwright',
            'plotly',
            'pnpm',
            'podman',
            'poetry',
            'polygon',
            'portainer',
            'postcss',
            'postgresql',
            'postman',
            'powershell',
            'premierepro',
            'prisma',
            'processing',
            'prolog',
            'prometheus',
            'protractor',
            'pulsar',
            'pulumi',
            'puppeteer',
            'purescript',
            'putty',
            'pycharm',
            'pypi',
            'pyscript',
            'pytest',
            'python',
            'pytorch',
            'qodana',
            'qt',
            'quarkus',
            'quasar',
            'qwik',
            'r',
            'rabbitmq',
            'rails',
            'railway',
            'rancher',
            'raspberrypi',
            'reach',
            'react',
            'reactbootstrap',
            'reactnavigation',
            'reactrouter',
            'readthedocs',
            'realm',
            'rect',
            'redhat',
            'redis',
            'redux',
            'renpy',
            'replit',
            'rider',
            'rocksdb',
            'rockylinux',
            'rollup',
            'ros',
            'rspec',
            'rstudio',
            'ruby',
            'rubymine',
            'rust',
            'rxjs',
            'safari',
            'salesforce',
            'sanity',
            'sass',
            'scala',
            'scalingo',
            'scikitlearn',
            'sdl',
            'selenium',
            'sema',
            'sentry',
            'sequelize',
            'shopware',
            'shotgrid',
            'sketch',
            'slack',
            'socketio',
            'solidity',
            'solidjs',
            'sonarqube',
            'sourcetree',
            'spack',
            'splunk',
            'spring',
            'spss',
            'spyder',
            'sqlalchemy',
            'sqldeveloper',
            'sqlite',
            'ssh',
            'stackoverflow',
            'stata',
            'storybook',
            'streamlit',
            'stylus',
            'subversion',
            'supabase',
            'svelte',
            'swagger',
            'swift',
            'swiper',
            'symfony',
            'tailwindcss',
            'tauri',
            'tensorflow',
            'terraform',
            'tex',
            'thealgorithms',
            'threedsmax',
            'threejs',
            'titaniumsdk',
            'tomcat',
            'tortoisegit',
            'towergit',
            'traefikmesh',
            'traefikproxy',
            'travis',
            'trello',
            'trpc',
            'twitter',
            'typescript',
            'typo3',
            'ubuntu',
            'unifiedmodelinglanguage',
            'unity',
            'unix',
            'unrealengine',
            'uwsgi',
            'v8',
            'vagrant',
            'vala',
            'vault',
            'volar',
            'vercel',
            'vertx',
            'vim',
            'visualbasic',
            'visualstudio',
            'vite',
            'vitejs',
            'vitess',
            'vitest',
            'vscode',
            'vsphere',
            'vuejs',
            'vuestorefront',
            'vuetify',
            'vyper',
            'wasm',
            'webflow',
            'weblate',
            'webpack',
            'webstorm',
            'windows8',
            'windows11',
            'woocommerce',
            'wordpress',
            'xamarin',
            'xcode',
            'xd',
            'xml',
            'yaml',
            'yarn',
            'yii',
            'yugabytedb',
            'yunohost',
            'zend',
            'zig'
        ];
    }
}
