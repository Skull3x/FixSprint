<?php

namespace FixSprint;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerToggleSprintEvent;

class Main extends PluginBase implements Listener{
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
        $player = $event->getPlayer();
        $entity = $event->getEntity();
        $cause = $entity->getLastDamageCause();
        $entity->setDataFlag(Entity::DATA_FLAGS, Entity::DATA_FLAG_SPRINTING, true);
        if($player->isSprinting()){
            if($event instanceof EntityDamageByEntityEvent){
                if($cause instanceof Player){
                    $event->setCancelled(false);
                }
            }
        }
    }
}
