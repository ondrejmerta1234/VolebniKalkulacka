<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['answers'];
    protected $answers = [];
    
    private $parties_answes = [
        "ANO 2011" => [],
        "SPOLU" => [],
        "Piráti a Zelení" => [],
        "STAN" => [],
        "SPD" => [],
        "Přísaha" => [],
        "Stačilo!" => [],
        "Motoristé sobě" => [],
        "Česká republika na 1. místě!" => [],
        "Volt Česko" => []
    ];

    public function __construct($answers = [])
    {
        $this->answers = $answers;
    }

    public function calculateResults()
    {
        // Initialize scores for each party
        $scores = [
            "ANO 2011" => 0,
            "SPOLU" => 0,
            "Piráti a Zelení" => 0,
            "STAN" => 0,
            "SPD" => 0,
            "Přísaha" => 0,
            "Stačilo!" => 0,
            "Motoristé sobě" => 0,
            "Česká republika na 1. místě!" => 0,
            "Volt Česko" => 0
        ];

      

        // Sort parties by score in descending order
        arsort($scores);

        return $scores;
    }
    


}
