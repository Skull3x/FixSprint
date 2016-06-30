<?php

namespace FixSprint;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerEvent;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerToggleSprintEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase{
    //Load Plugin when Server runs
    public function onLoad(){
        $this->getLogger()->info("Loading FixSprint");
    }
    //Set sprint habilitie to the player
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $player->setSprinting($value);
    }
    //Fix stop sprint action when a player hit to a other player or entity.
    public function onSprint(PlayerToggleSprintEvent $event){
        $player->setDataFlag(Entity::DATA_FLAGS, Entity::DATA_FLAG_SPRINTING, true);
        if($player->isSprinting()){
            //TODO: Make that the player dont stop sprinting when hit an entity
        }
    }
}

