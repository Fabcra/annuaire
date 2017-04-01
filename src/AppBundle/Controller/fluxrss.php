<?php
function openXML(){
 
	// Ouverture du fichier
	$file = new DOMDocument();
	$file->load("fluxrss.xml"); 
 
	//On retourne le fichier
	return $file;
}


function createXML(){
 
	// Création du fichier en mémoire 
	$file = new DOMDocument("1.0");
 
	// Création du noeud racine
	$root = $file->createElement("rss"); //On crée l élément racine
	$root->setAttribute("version", "2.0"); //On lui ajoute l attribut version (2.0)
	$root = $file->appendChild($root); //On insère la racine dans le document
 
	// Création du noeud channel 
	$element_channel = $file->createElement("channel");//On crée un élément channel
	$element_channel->setAttribute("id", "news"); //On donne un attribut id à notre channel
	$element_channel = $root->appendChild($element_channel);//On ajoute cet élément à la racine
 
	// Création du noeud description 
	$element_description = $file->createElement("description");//On crée un élément description
	$element_description = $element_channel->appendChild($element_description);//On ajoute cet élément au channel
 
	// Création du texte pour le noeud description 
	$texte_description = $file->createTextNode("Description du channel"); //On crée un texte
	$texte_description = $element_description->appendChild($texte_description); //On insère ce texte dans le noeud description
 
	// Création du noeud link et ajout du texte à l élément 
	$element_link = $file->createElement("link");
	$element_link = $element_channel->appendChild($element_link);
	$texte_link = $file->createTextNode("Lien vers le site");
	$texte_link = $element_link->appendChild($texte_link);
 
	// Création du noeud title et ajout du texte à l élément 
	$element_title = $file->createElement("title");
	$element_title = $element_channel->appendChild($element_title);
	$texte_title = $file->createTextNode("Titre du Channel");
	$texte_title = $element_title->appendChild($texte_title);
 
	//On retourne le fichier XML
	return $file;
}


function addOneNews($file, $test){
 
	//On récupère le channel
	$element_channel = $file->getElementById("news");
 
	// Création du noeud item
	$element_item = $file->createElement("item");
	$element_item = $element_channel->appendChild($element_item);
 
	// Création du noeud title et ajout du texte à l élément 
	$element_title = $file->createElement("title");
	$element_title = $element_item->appendChild($element_title);
	$texte_title = $file->createTextNode($title);
	$texte_title = $element_title->appendChild($texte_title);
 
	
}

function saveXML($file){
 
	//Sauvegarde du fichier
	$file->save("fluxrss.xml");
}

