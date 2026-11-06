<?php

declare(strict_types=1);

use kim\present\personaskin\PersonaSkinAdapter;
use pocketmine\network\mcpe\protocol\types\skin\SkinData;
use pocketmine\network\mcpe\protocol\types\skin\SkinImage;

$serverPath = $argv[1] ?? null;
if($serverPath === null){
    fwrite(STDERR, "Usage: php tests/skin-adapter-smoke.php <axolotl-pm-checkout>\n");
    exit(2);
}

$autoload = rtrim($serverPath, "\\/") . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
if(!is_file($autoload)){
    fwrite(STDERR, "Axolotl-PM Composer autoload was not found: {$autoload}\n");
    exit(2);
}
require $autoload;
require __DIR__ . "/../src/kim/present/personaskin/PersonaSkinAdapter.php";

$skinImage = new SkinImage(64, 64, str_repeat("\x00", 64 * 64 * 4));
$emptyCape = new SkinImage(0, 0, "");

$cases = [
    "persona" => new SkinData(
        skinId: "persona",
        resourcePatch: '{"geometry":{"default":"geometry.humanoid.custom"}}',
        skinImage: $skinImage,
        capeImage: $emptyCape,
        persona: true
    ),
    "classic-cape" => new SkinData(
        skinId: "classic-cape",
        resourcePatch: '{"geometry":{"default":"geometry.humanoid.custom"}}',
        skinImage: $skinImage,
        capeImage: $emptyCape,
        personaCapeOnClassic: true
    )
];

$adapter = new PersonaSkinAdapter();
foreach($cases as $name => $input){
    $skin = $adapter->fromSkinData($input);
    $output = $adapter->toSkinData($skin);
    if($output !== $input){
        throw new RuntimeException("{$name} SkinData was not preserved by the adapter");
    }
}

echo "PersonaSkin adapter smoke test passed for persona and classic-cape skins.\n";
