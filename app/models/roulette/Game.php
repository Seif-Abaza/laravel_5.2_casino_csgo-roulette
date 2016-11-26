<?php
/**
 * Created by PhpStorm.
 *
 */

namespace app\models\roulette;


class Game extends SimpleRoulette
{
    // Possible Bets
    const BET_RED		= 'bet_red';
    const BET_BLACK		= 'bet_black';
    const BET_GREEN		= 'bet_green';

    const PAYOFF_RED	 = 1;
    const PAYOFF_BLACK	 = 1;
    const PAYOFF_GREEN	 = 1;
    private $money		 = 0;
    private $total_wager = 0;
    private $money_won	 = 0;
    private $money_lost  = 0;
    private $win		 = false;
    private $bets		 = array();

    /**
     * Places a bet to play in the game of roulette.
     * Multiple bets can be placed in a single game.
     *
     * @param string $bet_type - Type of bet, defined as class constant.
     * @param int $wager - The amount of money to bet.
     */
    public function place_bet($bet_type, $wager)
    {
        if (!isset($this->bets[$bet_type]))
        {
            $this->bets[$bet_type] = (int) $wager;
        }
        else
        {
            $this->bets[$bet_type] += (int) $wager;
        }
        $this->increment_money($wager);
        $this->increment_total_wager($wager);
    }
    /**
     * Plays all placed bets and maintains a tally of money won,
     * money lost and total money.
     *
     * @return bool - True if a bet was a winner.
     */
    public function play()
    {
        $this->spin();
        foreach ($this->bets as $bet_type => $wager)
        {
            if (method_exists(Game, $bet_type))
            {
                if ($payoff = $this->$bet_type())
                {
                    $this->win = true;
                    $money_won = ($wager * $payoff);
                    $this->increment_money_won($money_won);
                    $this->increment_money($money_won);
                }
                else
                {
                    $this->increment_money_lost($wager);
                    $this->decrement_money($wager);
                }
            }
        }
        return $this->win;
    }
    /**
     * Red numbers win.
     * @return int - Winning bet payoff.
     */
    private function bet_red()
    {
        if ($this->get_color() == self::COLOR_RED)
        {
            return self::PAYOFF_RED;
        }
        return false;
    }
    /**
     * Black numbers win.
     * @return int - Winning bet payoff.
     */
    private function bet_black()
    {
        if ($this->get_color() == self::COLOR_BLACK)
        {
            return self::PAYOFF_BLACK;
        }
        return false;
    }
    /**
     * Numbers 0.
     * @return int - Winning bet payoff.
     */
    private function bet_green()
    {
        if ( ($this->get_number() >= 1) && ($this->get_number() <= 19) )
        {
            return self::PAYOFF_GREEN;
        }
        return false;
    }

    private function increment_total_wager($amount)
    {
        $this->total_wager += $amount;
    }
    private function increment_money_won($amount)
    {
        $this->money_won += $amount;
    }
    private function increment_money_lost($amount)
    {
        $this->money_lost += $amount;
    }
    private function increment_money($amount)
    {
        $this->money += $amount;
    }
    private function decrement_money($amount)
    {
        $this->money -= $amount;
    }
    public function get_total_wager()
    {
        return $this->total_wager;
    }
    public function get_money()
    {
        return $this->money;
    }
    public function get_money_won()
    {
        return $this->money_won;
    }
    public function get_money_lost()
    {
        return $this->money_lost;
    }
    public function get_win()
    {
        return $this->win;
    }

}