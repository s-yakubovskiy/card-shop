// TODO: write this method!!!
<?php

$link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
if (mysqli_connect_errno()) {
    echo "Connect failed: %s\n", mysqli_connect_error();
    exit();
}

////card #1
//
//$item_name = mysqli_real_escape_string($link, "Daze");
//$description = mysqli_real_escape_string($link, "You may return an island you control to its owner's hand instead of paying Daze's mana cost.
//Counter target spell unless its controller pays 1.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Rare";
//$isfoil = 0;
//$price = 3.49;
//$colors = json_encode(array('Black' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/Daze.jpg';
//$artist = mysqli_real_escape_string($link, "Matthew D. Wilson");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
////card #2
//
//$item_name = mysqli_real_escape_string($link, "Air Bladder");
//$description = mysqli_real_escape_string($link, "Enchanted creature has flying. Enchanted creature can block only creatures with flying. Counter target spell unless its controller pays 1.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 0;
//$price = 0.15;
//$colors = json_encode(array('Blue' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/AirBladder.jpg';
//$artist = mysqli_real_escape_string($link, "Donato Giancola");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
////card #3
//
//$item_name = mysqli_real_escape_string($link, "Ancient Hydra");
//$description = mysqli_real_escape_string($link, "Fading 5 (This creature comes into play with five fade counters on it. At the beginning of your upkeep, remove a fade counter from it. If you can't, sacrifice it.)");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Uncommon";
//$isfoil = 1;
//$price = 0.25;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/AncientHydra.jpg';
//$artist = mysqli_real_escape_string($link, "Scott M. Fischer");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
////card #4
//
//$item_name = mysqli_real_escape_string($link, "Academy Researchers");
//$description = mysqli_real_escape_string($link, "When Academy Researchers comes into play, you may put an Aura card from your hand into play attached to Academy Researchers.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Uncommon";
//$isfoil = 1;
//$price = 2.49;
//$colors = json_encode(array('Blue' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/10E/en/foil/AcademyResearchers.jpg';
//$artist = mysqli_real_escape_string($link, "Stephen Daniele");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
////card #5
//
//$item_name = mysqli_real_escape_string($link, "Cloudskate");
//$description = mysqli_real_escape_string($link, "Fading 3 (This creature comes into play with three fade counters on it. At the beginning of your upkeep, remove a fade counter from it. If you can't, sacrifice it.) ");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 0;
//$price = 0.15;
//$colors = json_encode(array('Blue' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/Cloudskate.jpg';
//$artist = mysqli_real_escape_string($link, "Carl Critchlow");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
////card #6
//
//$item_name = mysqli_real_escape_string($link, "Bola Warrior");
//$description = mysqli_real_escape_string($link, "R, ocT, Discard a card from your hand: Target creature can't block this turn.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 0;
//$price = 3.49;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/BolaWarrior.jpg';
//$artist = mysqli_real_escape_string($link, "Adam Rex");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
////card #7
//
//$item_name = mysqli_real_escape_string($link, "Death Pit Offering");
//$description = mysqli_real_escape_string($link, "As Death Pit Offering comes into play, sacrifice all creatures you control.
//Creatures you control get +2/+2.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Rare";
//$isfoil = 0;
//$price = 0.49;
//$colors = json_encode(array('Colorless' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/DeathPitOffering.jpg';
//$artist = mysqli_real_escape_string($link, "Pete Venters");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #8
//
//$item_name = mysqli_real_escape_string($link, "Flowstone Strike");
//$description = mysqli_real_escape_string($link, "Target creature gets +1/-1 and gains haste until end of turn. (It may attack and ocT the turn it comes under your control.)");
//$flavor = mysqli_real_escape_string($link, "Aggression exacts its toll");
//$rarity = "Common";
//$isfoil = 0;
//$price = 0.15;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/FlowstoneStrike.jpg';
//$artist = mysqli_real_escape_string($link, "Mike Ploog");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #9
//
//$item_name = mysqli_real_escape_string($link, "Tithe Taker");
//$description = mysqli_real_escape_string($link, "During your turn, spells your opponents cast cost 1 more to cast and abilities your opponents activate cost 1 more to activate unless they're mana abilities.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Rare";
//$isfoil = 0;
//$price = 2.49;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/RNA/en/nonfoil/TitheTaker.jpg';
//$artist = mysqli_real_escape_string($link, "Adam Rex");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #10
//
//$item_name = mysqli_real_escape_string($link, "Mistveil Plains");
//$description = mysqli_real_escape_string($link, "Mistveil Plains comes into play tapped.
//W, Tap: Put target card in your graveyard on the bottom of your library. Play this ability only if you control two or more white permanents.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Uncommon";
//$isfoil = 0;
//$price = 19.49;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/AeronautAdmiral.jpg';
//$artist = mysqli_real_escape_string($link, "Rob Alexander");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #11
//
//$item_name = mysqli_real_escape_string($link, "Aegis Automaton");
//$description = mysqli_real_escape_string($link, "The streets of Ghirapur have become dangerous. It's good to have a dependable companion");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 0;
//$price = 0.25;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/AegisAutomaton.jpg';
//$artist = mysqli_real_escape_string($link, "Kieran Yanner");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
////card #12
//
//$item_name = mysqli_real_escape_string($link, "Baral's Expertise");
//$description = mysqli_real_escape_string($link, "Return up to three target artifacts and/or creatures to their owners' hands.
//You may cast a card with converted mana cost 4 or less from your hand without paying its mana cost.
//");
//$flavor = mysqli_real_escape_string($link, "Get out of my way");
//$rarity = "Rare";
//$isfoil = 1;
//$price = 1.99;
//$colors = json_encode(array('Blue' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/BaralsExpertise.jpgg';
//$artist = mysqli_real_escape_string($link, " Todd Lockwood");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #13
//
//$item_name = mysqli_real_escape_string($link, "Chandra's Revolution");
//$description = mysqli_real_escape_string($link, "The streets of Ghirapur have become dangerous companion");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 1;
//$price = 0.25;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/ChandrasRevolution.jpg';
//$artist = mysqli_real_escape_string($link, "Clint Cearley");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #14
//
//$item_name = mysqli_real_escape_string($link, "Lifecraft Cavalry");
//$description = mysqli_real_escape_string($link, "Revolt — Lifecraft Cavalry enters the battlefield with two +1/+1 counters on it if a permanent you controlled left the battlefield this turn.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Common";
//$isfoil = 0;
//$price = 0.25;
//$colors = json_encode(array('Green' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/LifecraftCavalry.jpg';
//$artist = mysqli_real_escape_string($link, "Svetlin Velinov");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #15
//
//$item_name = mysqli_real_escape_string($link, "Metallic Mimic");
//$description = mysqli_real_escape_string($link, "As Metallic Mimic enters the battlefield, choose a creature type.
//Metallic Mimic is the chosen type in addition to its other types.
//Each other creature you control of the chosen type enters the battlefield with an additional +1/+1 counter on it.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Rare";
//$isfoil = 0;
//$price = 0.25;
//$colors = json_encode(array('Colorless' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/MetallicMimic.jpg';
//$artist = mysqli_real_escape_string($link, "Zack Stella");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #16
//
//$item_name = mysqli_real_escape_string($link, "Narnam Renegade");
//$description = mysqli_real_escape_string($link, "Revolt — Narnam Renegade enters the battlefield with a +1/+1 counter on it if a permanent you controlled left the battlefield this turn.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Uncommon";
//$isfoil = 0;
//$price = 1.25;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/NarnamRenegade.jpg';
//$artist = mysqli_real_escape_string($link, "Greg Opalinski");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #17
//
//$item_name = mysqli_real_escape_string($link, "Aegis Automaton");
//$description = mysqli_real_escape_string($link, "The streets of Ghirapur have become dangerous companion");
//$flavor = mysqli_real_escape_string($link, "It is finished. Now the real work can begin.");
//$rarity = "Mythic Rare";
//$isfoil = 1;
//$price = 27.99;
//$colors = json_encode(array('Colorless' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/PlanarBridge.jpg';
//$artist = mysqli_real_escape_string($link, "Chase Stone");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #18
//
//$item_name = mysqli_real_escape_string($link, "Paradox Engine
//");
//$description = mysqli_real_escape_string($link, "Whenever you cast a spell, untap all nonland permanents you control.");
//$flavor = mysqli_real_escape_string($link, "");
//$rarity = "Mythic Rare";
//$isfoil = 1;
//$price = 59.99;
//$colors = json_encode(array('Colorless' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/ParadoxEngine.jpg';
//$artist = mysqli_real_escape_string($link, "Christine Choi");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #19
//
//$item_name = mysqli_real_escape_string($link, "Planar Bridge");
//$description = mysqli_real_escape_string($link, "The streets of Ghirapur have become dangerous companion");
//$flavor = mysqli_real_escape_string($link, "It is finished. Now the real work can begin.");
//$rarity = "Mythic Rare";
//$isfoil = 0;
//$price = 17.99;
//$colors = json_encode(array('Red' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/PlanarBridge.jpg';
//$artist = mysqli_real_escape_string($link, "Chase Stone");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);
//
//
//
//
////card #20
//
//$item_name = mysqli_real_escape_string($link, "Yahenni's Expertise");
//$description = mysqli_real_escape_string($link, "All creatures get -3/-3 until end of turn.
//You may cast a card with converted mana cost 3 or less from your hand without paying its mana cost.");
//$flavor = mysqli_real_escape_string($link, "The Consulate pushed me to my limit, darling, and this is the result.");
//$rarity = "Rare";
//$isfoil = 0;
//$price = 0.25;
//$colors = json_encode(array('Colorless' => 1));
//$img = 'http://static.starcitygames.com/sales/cardscans/MTG/AER/en/foil/YahennisExpertise.jpg';
//$artist = mysqli_real_escape_string($link, "Daarken");
//
//$query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
//('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
//
//mysqli_query($link, $query);



$passwd = hash('whirlpool', "admin1");
$login = mysqli_real_escape_string($link, "root");
$email = mysqli_real_escape_string($link, "root@mtg.com");

$query = "REPLACE INTO users (user_id, user_name, passwd, email, isactive, isadmin) VALUES
            (1, '$login', '$passwd', '$email', 1, 1)";

mysqli_query($link, $query);