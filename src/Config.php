<?php
namespace TypeRocket;

class Config
{

    static private $paths = null;
    static private $debug = false;
    static private $seed = null;
    static private $plugins = null;
    static private $frontend = false;

    /**
     * Set initial values
     */
    public function __construct()
    {
        if (self::$paths === null) {
            self::$debug   = defined( 'TR_DEBUG' ) ? TR_DEBUG : false;
            self::$seed    = defined( 'TR_SEED' ) ? TR_SEED : NONCE_KEY;
            self::$plugins = defined( 'TR_PLUGINS' ) ? TR_PLUGINS : '';
            self::$paths   = $this->defaultPaths();
        }
    }

    /**
     * Get paths array
     *
     * @return mixed|null|void
     */
    static public function getPaths()
    {
        return self::$paths;
    }

    /**
     * Get debug status
     *
     * @return bool
     */
    static public function getDebugStatus()
    {
        return self::$debug;
    }

    /**
     * Get Seed
     *
     * @return null|string
     */
    static public function getSeed()
    {
        return self::$seed;
    }

    /**
     * Check TypeRocket for frontend
     *
     * @return null|string
     */
    static public function getFrontend()
    {
        return self::$frontend;
    }

    /**
     * Get array of plugins
     *
     * @return array
     */
    static public function getPlugins()
    {
        return explode( '|', self::$plugins );
    }

    /**
     * Set default paths
     *
     * @return array
     */
    private function defaultPaths()
    {
        return [
            'assets'  => __DIR__ . '/../assets',
            'plugins' => defined( 'TR_PLUGINS_FOLDER_PATH' ) ? TR_PLUGINS_FOLDER_PATH : __DIR__ . '/../../plugins',
            'components'  => defined( 'TR_COMPONENTS_FOLDER_PATH' ) ? TR_COMPONENTS_FOLDER_PATH : __DIR__ . '/../../components',
            'extend'  => defined( 'TR_APP_FOLDER_PATH' ) ? TR_APP_FOLDER_PATH : __DIR__ . '/../../app',
            'urls'    => [
                'theme'   => get_stylesheet_directory_uri(),
                'assets'  => defined( 'TR_ASSETS_URL' ) ? TR_ASSETS_URL : get_stylesheet_directory_uri() . '/typerocket/assets',
                'plugins' => defined( 'TR_PLUGINS_URL' ) ? TR_PLUGINS_URL : get_stylesheet_directory_uri() . '/plugins'
            ]
        ];
    }

    /**
     * Tell config that front end TypeRocket was enabled
     *
     * This action can not be undone
     */
    public static function enableFrontend()
    {
        self::$frontend = true;
    }

}
