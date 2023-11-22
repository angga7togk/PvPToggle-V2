<?php

declare (strict_types = 1);

namespace angga7togk\pvptoggle;

use angga7togk\pvptoggle\command\Commands;
use angga7togk\pvptoggle\listener\Listeners;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class PvPToggle extends PluginBase
{
    /** @var array $pvpToggle */
    public $pvpToggle = [];
    public static Config $cfg, $lang;
    public static string $prefix;


    public function onEnable(): void
    {   
        $this->saveResource("config.yml");
        $this->saveResource("language.yml");
        self::$cfg = new Config($this->getDataFolder() ."config.yml", Config::YAML, []);
        self::$lang = new Config($this->getDataFolder() ."language.yml", Config::YAML, []);
        
        self::$prefix = self::$cfg->get("prefix");


        $this->getServer()->getPluginManager()->registerEvents(new Listeners($this), $this);
        $this->getServer()->getCommandMap()->register("PvPToggle", new Commands($this));
    }
}
