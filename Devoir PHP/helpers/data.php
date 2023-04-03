<?php
    $maleSnakesNames = 
    [
        "Agni", "Arjun", "Bala", "Bhima", "Chandra",
        "Dhruva", "Gagan", "Girish", "Hari", "Jivan",
        "Kavi", "Kiran", "Lalit", "Madhav", "Naveen",
        "Nikhil", "Om", "Pranav", "Raj", "Rakesh",
        "Ravi", "Rishi", "Rohit", "Sahil", "Sanjay",
        "Sarvesh", "Shankar", "Shiva", "Sudhir", "Suraj",
        "Vikram", "Vishal", "Yogi", "Yuvraj", "Zorawar",
        "Ashwin", "Kamal", "Jaswant", "Jatin", "Shailendra"
    ];

    $femaleSnakesNames = 
    [
        "Aarti", "Anjali", "Asha", "Chhaya", "Disha",
        "Gauri", "Geeta", "Indira", "Jyoti", "Kajal",
        "Kavita", "Kirti", "Lata", "Madhu", "Mala",
        "Maya", "Meena", "Nalini", "Neha", "Pooja",
        "Radha", "Rajni", "Reena", "Renu", "Rita",
        "Sakshi", "Sangita", "Savita", "Shalini", "Shanti",
        "Shilpa", "Shweta", "Smita", "Sujata", "Sunita",
        "Supriya", "Swati", "Uma", "Usha", "Vandana"
    ];

    $snakesSpecies = 
    [
        "Cobra", "Anaconda", "Boa", "Black Mamba", "Viper", "Python", 
        "Grass Snake", "Rattlesnake", "Coral Snake", "Green Snake", 
        "Sea Snake", "Spectacled Snake", "Adder", "Bush Viper", "Gaboon Viper",
        "Horned Viper", "Cottonmouth", "Diamondback Rattlesnake", "Eastern Brown Snake",
        "Fer-de-Lance", "Inland Taipan", "King Cobra", "Mojave Rattlesnake", "Rhinoceros Viper",
        "Tiger Snake", "Water Moccasin", "Western Hognose Snake", "Yellow-Bellied Sea Snake",
        "Black Rat Snake", "Green Anaconda", "Japanese Rat Snake"
    ];



    function getMaleSnakesNames() {
        global $maleSnakesNames;
        return $maleSnakesNames;
    }
    
    function getFemaleSnakesNames() {
        global $femaleSnakesNames;
        return $femaleSnakesNames;
    }
    
    function getSnakesSpecies() {
        global $snakesSpecies;
        return $snakesSpecies;
    }
?>