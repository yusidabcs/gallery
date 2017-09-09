<?php namespace Modules\Gallery\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Sidebar\SidebarServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider;
use Modules\Core\Providers\CoreServiceProvider;
use Modules\Gallery\Providers\GalleryServiceProvider;
use Modules\Gallery\Repositories\GalleryRepository;
use Modules\Menu\Repositories\MenuRepository;
use Orchestra\Testbench\TestCase;
use Nwidart\Modules\LaravelModulesServiceProvider;

abstract class BaseGalleryTest extends TestCase
{
    /**
     * @var MenuRepository
     */
    protected $gallery;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->resetDatabase();

        $this->gallery = app(GalleryRepository::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelModulesServiceProvider::class,
            CoreServiceProvider::class,
            GalleryServiceProvider::class,
            LaravelLocalizationServiceProvider::class,
            SidebarServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Eloquent' => Model::class,
            'LaravelLocalization' => LaravelLocalization::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/..';
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ));
        $app['config']->set('translatable.locales', ['en', 'fr']);
    }

    private function resetDatabase()
    {
        // Relative to the testbench app folder: vendors/orchestra/testbench/src/fixture
        $migrationsPath = 'Database/Migrations';
        $artisan = $this->app->make(Kernel::class);
        // Makes sure the migrations table is created
        $artisan->call('migrate', [
            '--database' => 'sqlite',
        ]);
        // We empty all tables
        $artisan->call('migrate:reset', [
            '--database' => 'sqlite',
        ]);
        // Migrate
        $artisan->call('migrate', [
            '--database' => 'sqlite',
        ]);
        $artisan->call('migrate', [
            '--database' => 'sqlite',
            '--path'     => 'Modules/Tag/Database/Migrations',
        ]);
    }

    public function createGallery($target, $url)
    {
        $data = [
            'target' => $target,
            'url' => $url,
        ];

        return $this->gallery->create($data);
    }

    public function firstGallery()
    {
        return $this->gallery->first();
    }
}
