<?php

namespace angga7togk\pvptoggle\language;

use angga7togk\pvptoggle\PvPToggle;

class Language {
    private string $language;
    public function __construct() {
        $this->language = PvPToggle::$cfg->get("language") ?? "en";
    }

    public function getName(): string {
        return $this->language;
    }

    public function getLanguage():array{
        return PvPToggle::$lang->get($this->getName()) ?? PvPToggle::$lang->get("en");
    }

}