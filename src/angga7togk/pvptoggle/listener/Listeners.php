<?php

namespace angga7togk\pvptoggle\listener;
use angga7togk\pvptoggle\language\Language;
use angga7togk\pvptoggle\PvPToggle;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\player\Player;

class Listeners implements Listener {

    private PvPToggle $plugin;
    private array $lang;
    public function __construct(PvPToggle $plugin) {
        $this->plugin = $plugin;
        $this->lang = (new Language())->getLanguage();
    }

    
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->plugin->pvpToggle[$player->getName()] = true;
    }

    public function onQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
        if(isset($this->plugin->pvpToggle[$player->getName()])){
            unset($this->plugin->pvpToggle[$player->getName()]);
        }
    }

    public function onHit(EntityDamageByEntityEvent $event): void
    {
        $entity = $event->getEntity();
        $damager = $event->getDamager();

        if ($entity instanceof Player and $damager instanceof Player) {
            if (isset($this->plugin->pvpToggle[$damager->getName()])) {
                $damager->sendActionBarMessage($this->lang["pvpt-on-1"]);
                $event->cancel();
                return;
            }
            if (isset($this->plugin->pvpToggle[$entity->getName()])) {
                $damager->sendActionBarMessage(str_replace("{player}", $entity->getName(), $this->lang["pvpt-on-2"]));
                $event->cancel();
            }
        }
    }
}