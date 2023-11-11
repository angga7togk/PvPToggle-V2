<?php

namespace angga7togk\pvptoggle\command;

use angga7togk\pvptoggle\language\Language;
use angga7togk\pvptoggle\PvPToggle;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Commands extends Command {
    private PvPToggle $plugin;
    private array $lang;
    public function __construct(PvPToggle $plugin) {
        parent::__construct("pvptoggle", "pvp mode [on / off]", "/pvptoggle", ["pvpt", "pvpmode"]);
        $this->setPermission("pvptoggle.command");
        $this->plugin = $plugin;
        $this->lang = (new Language())->getLanguage();
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        if($sender instanceof Player){
            if (isset($args[0]) and $sender->hasPermission("pvptoggle.command.staff")) {
                $player = $this->plugin->getServer()->getPlayerExact($args[0]);
                if ($player === null) {
                    $sender->sendMessage(str_replace("{player}", $args[0], $this->lang["player-notfound"]));
                    return true;
                }
                if (isset($this->plugin->pvpToggle[$player->getName()])) {
                    $sender->sendMessage(PvPToggle::$prefix.str_replace("{player}", $args[0], $this->lang["off-pvp-other"]));
                    unset($this->plugin->pvpToggle[$player->getName()]);
                } else {
                    $this->plugin->pvpToggle[$player->getName()] = true;
                    $sender->sendMessage(PvPToggle::$prefix.str_replace("{player}", $args[0], $this->lang["on-pvp-other"]));
    
                }
    
                return true;
            }
    
            if ($sender instanceof Player) {
                if (isset($this->plugin->pvpToggle[$sender->getName()])) {
                    $sender->sendMessage(PvPToggle::$prefix.$this->lang["off-pvp-self"]);
                    unset($this->plugin->pvpToggle[$sender->getName()]);
                } else {
                    $this->plugin->pvpToggle[$sender->getName()] = true;
                    $sender->sendMessage(PvPToggle::$prefix.$this->lang["on-pvp-self"]);
                }
            }
        }else{
            $sender->sendMessage(PvPToggle::$prefix.$this->lang["use-cmd-in-game"]);
        }
        return true;
    }
}