<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['answers'];
    protected $answers = [];
    
    private $parties_answers = [
        "ANO 2011" => [2, -1, 0, 1, -2, 2, 1, 0, -1, -2],
        "SPOLU" => [1, 0, -1, 2, -2, 1, 0, -1, 2, -2],
        "Piráti a Zelení" => [0, -1, 2, 1, -2, 0, 1, -1, 2, -2],
        "STAN" => [-1, 2, 0, -2, 1, -1, 0, 2, -2, 1],
        "SPD" => [2, 1, -1, 0, -2, 2, -1, 1, 0, -2],
        "Přísaha" => [0, -2, 1, 2, -1, 0, 1, -2, 2, -1],
        "Stačilo!" => [-2, 1, 0, 2, -1, -2, 1, 0, 2, -1],
        "Motoristé sobě" => [1, -1, 2, 0, -2, 1, -1, 2, 0, -2],
        "Česká republika na 1. místě!" => [2, 0, -1, 1, -2, 2, 0, -1, 1, -2],
        "Volt Česko" => [-1, 2, 1, 0, -2, -1, 2, 1, 0, -2]
    ];

    public function __construct($answers = [])
    {
        $this->answers = $answers;
    }

    public function calculateResults() 
    {
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

        foreach($this->parties_answers as $party => $party_answers) {
                $score = 0;
                $answered = 0;
                for($i = 0; $i < count($this->answers); $i++) {
                    if (isset($this->answers[$i]) && isset($party_answers[$i])) {
                        $score += 1 - abs($this->answers[$i] - $party_answers[$i]) / 4;
                        $answered++;
                    }
            }
            if($answered > 0){
            $scores[$party] = $score / $answered * 100;
            }else
            {
                $scores[$party] = 0;
            }
        }

        arsort($scores);

        return $scores;
    }
    


}
