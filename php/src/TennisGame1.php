<?php

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;
    private int $player2Score = 0;
    private string $player1Name = '';
    private string $player2Name = '';
    const SCORES = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint($playerName)
    {
        if ($this->player1Name == $playerName) {
            $this->player1Score++;
        } else {
            $this->player2Score++;
        }
    }

    public function getScore()
    {
        $score = "";
        if ($this->player1Score == $this->player2Score) {
            if ($this->player1Score < 3) {
                $score = self::SCORES[$this->player1Score] . "-All";
            } else {
                $score = "Deuce";
            }
        } elseif ($this->player1Score >= 4 || $this->player2Score >= 4) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult == 1) {
                $score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $score = "Win for player1";
            } else {
                $score = "Win for player2";
            }
        } else {
            $score = self::SCORES[$this->player1Score] . "-" . self::SCORES[$this->player2Score];
        }
        return $score;
    }
}
